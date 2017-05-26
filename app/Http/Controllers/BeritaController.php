<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use Validator;
use App\Berita;
use App\KategoriBerita;
use Input;
use Carbon\Carbon;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;


class BeritaController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        $post_list = Berita::orderBy('id','desc')->paginate(10);
        $jumlah_post = Berita::count();
        //return $univ_list;

        //return view('berita.index', compact('post_list','jumlah_post'));

        if ($request->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $authors = Berita::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'id', 'title']);
            return Datatables::of($authors)
                ->addColumn('action', function($author){
                    return view('datatable._action', [
                        'model'           => $author,
                        'form_url'        => route('berita.destroy', $author->id),
                        'edit_url' => route('berita.edit', $author->id),
                        'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
                    ]);

                })
                ->addIndexColumn()
                ->make(true);
        }


        $html = $htmlBuilder
                ->addColumn(['data' => 'rownum', 'name'=>'rownum', 'title'=>'No', 'orderable'=>false, 'searchable'=>false])
                ->addColumn(['data' => 'title', 'name'=>'title', 'title'=>'Judul'])
                ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);


      return view('berita.index')->with(compact('html','post_list','jumlah_post'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $list_grup = KategoriBerita::pluck('nama','id');
        return view('berita.create', compact('list_grup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        //dd($input);
        //validasi
        $validator = Validator::make($input,[
          'content' => 'required',
          'title' => 'required',
          'kategori_berita_id' => 'required',
        ]);

        $input['tanggal_post'] = Carbon::now();
        $input['author'] = Auth::user()->name;

        //dd($input);


        if($validator->fails()){
          return redirect('berita/create')->withInput()->withErrors($validator);
        }

        $message = $input['content'];
            //$post->save();
  if(!empty($message)){
    $dom = new \DomDocument();
    libxml_use_internal_errors(true);
    $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $images = $dom->getElementsByTagName('img');



    // foreach <img> in the submited message
    foreach($images as $img){
      $src = $img->getAttribute('src');

      // if the img source is 'data-url'
      if(preg_match('/data:image/', $src)){

        // get the mimetype
        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
        $mimetype = $groups['mime'];

        // Generating a random filename
        $filename = uniqid();
        $filepath = "/images/$filename.$mimetype";

        // @see http://image.intervention.io/api/
        $image = Image::make($src)
          // resize if required
          /* ->resize(300, 200) */
          ->encode($mimetype, 100) 	// encode file to the specified mimetype
          ->save(public_path($filepath));

        $new_src = asset($filepath);
        $img->removeAttribute('src');
        $img->setAttribute('src', $new_src);
      } // <!--endif
    } // <!--endforeach

    $input['content'] = $dom->saveHTML();
  }

        Berita::create($input);
        return redirect('berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Berita::findOrFail($id);
        $list_grup = KategoriBerita::pluck('nama','id');
        return view('berita.edit', compact('post','list_grup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Berita::findOrFail($id);
        //$post->update($request->all());
        $message = $request->input('content');




            $post->title = Input::get('title');
            $post->kategori_berita_id = Input::get('kategori_berita_id');


            //$post->save();
  if(!empty($message)){
    $dom = new \DomDocument();
    libxml_use_internal_errors(true);
    $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $images = $dom->getElementsByTagName('img');



    // foreach <img> in the submited message
    foreach($images as $img){
      $src = $img->getAttribute('src');

      // if the img source is 'data-url'
      if(preg_match('/data:image/', $src)){

        // get the mimetype
        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
        $mimetype = $groups['mime'];

        // Generating a random filename
        $filename = uniqid();
        $filepath = "/images/$filename.$mimetype";

        // @see http://image.intervention.io/api/
        $image = Image::make($src)
          // resize if required
          /* ->resize(300, 200) */
          ->encode($mimetype, 100) 	// encode file to the specified mimetype
          ->save(public_path($filepath));

        $new_src = asset($filepath);
        $img->removeAttribute('src');
        $img->setAttribute('src', $new_src);
      } // <!--endif
    } // <!--endforeach

    $post->content = $dom->saveHTML();
  }
    $post->save();



        return redirect('berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Berita::findOrFail($id);
        $post->delete();
        return redirect('berita');
    }
}
