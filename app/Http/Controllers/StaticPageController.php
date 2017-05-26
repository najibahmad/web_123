<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Input;
use Image;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;

class StaticPageController extends Controller
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
    public function index2()
    {
        //
        $post_list = Post::orderBy('id','desc')->paginate(10);
        $jumlah_post = Post::count();
        //return $univ_list;

        return view('staticpage.index', compact('post_list','jumlah_post'));

    }

    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        $post_list = Post::orderBy('id','desc')->paginate(10);
        $jumlah_post = Post::count();
        //return $univ_list;

        //return view('eksekutif.index', compact('muspida_list','jumlah_muspida'));
        if ($request->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $authors = Post::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'title', 'tanggal_post','content','category_id','id']);
            return Datatables::of($authors)
                ->addColumn('kategori', function($authors) {
                    return $authors->category->nama;
                })
                ->addColumn('action', function($author){
                    return view('datatable._action', [
                        'model'           => $author,
                        'form_url'        => route('staticpage.destroy', $author->id),
                        'edit_url' => route('staticpage.edit', $author->id),
                        'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
                    ]);

                })
                ->addIndexColumn()
                ->make(true);
        }


        $html = $htmlBuilder
                ->addColumn(['data' => 'rownum', 'name'=>'rownum', 'title'=>'No', 'orderable'=>false, 'searchable'=>false])
                ->addColumn(['data' => 'title', 'name'=>'title', 'title'=>'Judul'])
                

                ->addColumn(['data' => 'kategori', 'name'=>'category_id', 'title'=>'Kategori'])
                ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

        return view('staticpage.index')->with(compact('html','post_list','jumlah_post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $post = Post::findOrFail($id);
        $list_grup = Category::pluck('nama','id');
        return view('staticpage.edit', compact('post','list_grup'));
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
        $post = Post::findOrFail($id);
        //$post->update($request->all());
        $message = Input::get('content');

        $post->title = Input::get('title');
        $post->category_id = Input::get('category_id');

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



        return redirect('staticpage/'.$id.'/edit/'.$post->category_id);
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
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('staticpage');
    }
}
