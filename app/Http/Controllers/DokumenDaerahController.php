<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DokumenDaerah;
use App\KategoriDokumen;
use Validator;
use Input;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;


class DokumenDaerahController extends Controller
{
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
        $dokumen_list = DokumenDaerah::orderBy('id','desc')->paginate(10);
        $jumlah_dokumen = DokumenDaerah::count();
        //return $univ_list;

        return view('dokumen.index', compact('dokumen_list','jumlah_dokumen'));
    }

    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        $dokumen_list = DokumenDaerah::orderBy('id','desc')->paginate(10);
        $jumlah_dokumen = DokumenDaerah::count();
        //return $univ_list;

        //return view('eksekutif.index', compact('muspida_list','jumlah_muspida'));
        if ($request->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $authors = DokumenDaerah::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'judul', 'konten','link_download','format','kategori_dokumen_id','id']);
            return Datatables::of($authors)
                ->addColumn('kategori', function($authors) {
                    return $authors->kategori_dokumen->nama;
                })
                ->addColumn('link', function($authors) {
                    return $authors->link_download.'[<a href="'.url('download-file/'.$authors->id).'"><i class="fa fa-download" aria-hidden="true"></i></a>]';
                })

                ->addColumn('action', function($author){
                    return view('datatable._action_noedit', [
                        'model'           => $author,
                        'form_url'        => route('dokumen.destroy', $author->id),
                        'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
                    ]);

                })
                ->addIndexColumn()
                ->make(true);
        }


        $html = $htmlBuilder
                ->addColumn(['data' => 'rownum', 'name'=>'rownum', 'title'=>'No', 'orderable'=>false, 'searchable'=>false])
                ->addColumn(['data' => 'judul', 'name'=>'judul', 'title'=>'Judul'])
                ->addColumn(['data' => 'kategori', 'name'=>'kategori_dokumen_id', 'title'=>'Kategori'])
                ->addColumn(['data' => 'link', 'name'=>'link_download', 'title'=>'Link Download'])
                ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

        return view('dokumen.index')->with(compact('html','jumlah_dokumen','dokumen_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $list_grup = KategoriDokumen::pluck('nama','id');
        return view('dokumen.create', compact('list_grup'));
    }

    public function downloadFile($id)
    {

      $dokumen = DokumenDaerah::findOrFail($id);
      //dd($dokumen);
    	$myFile = public_path($dokumen->link_download);
    	//$headers = ['Content-Type: application/pdf'];


    	return response()->download($myFile);
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

        $extension = Input::file('link_download')->getClientOriginalExtension();
        $filename = rand(11111111, 99999999).$input['judul']. '.' . $extension;
        Input::file('link_download')->move(
          base_path().'/public/files/uploads/', $filename
        );

        $fullPath = '/files/uploads/' . $filename;
        $upload = array(
            'format' => $extension,
            'path' => $fullPath,

        );
        $input['link_download'] = $fullPath;
        $input['format'] = $extension;

        //dd($input);
        //$upload->save();
        //$uploads = Uploads::orderBy('approved')->get();
        //dd($upload);
        //return view('uploadspanel.index', compact('uploads'));



        //validasi
        $validator = Validator::make($input,[
          'judul'  => 'required',
          'konten' => 'required',
          'link_download'  => 'required',
          'kategori_dokumen_id'  => 'required',


        ]);

        if($validator->fails()){
          return redirect('dokumen/create')->withInput()->withErrors($validator);
        }

        DokumenDaerah::create($input);
        return redirect('dokumen');
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
        $dokumen = DokumenDaerah::findOrFail($id);
        $list_grup = KategoriDokumen::pluck('nama','id');

        return view('dokumen.edit', compact('dokumen','list_grup'));
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
        $dokumen = DokumenDaerah::findOrFail($id);
        $dokumen->update($request->all());
        return redirect('dokumen');
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
        $dokumen = DokumenDaerah::findOrFail($id);
        $dokumen->delete();
        return redirect('dokumen');
    }
}
