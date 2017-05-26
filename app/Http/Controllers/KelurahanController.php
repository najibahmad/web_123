<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use App\Kecamatan;
use Validator;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;



class KelurahanController extends Controller
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
     public function index(Request $request, Builder $htmlBuilder)
     {
         //
         $muspida_list = Kelurahan::orderBy('id','desc')->paginate(10);
         $jumlah_muspida = Kelurahan::count();
         //return $univ_list;

         //return view('dinas.index', compact('muspida_list','jumlah_muspida'));

         if ($request->ajax()) {
             DB::statement(DB::raw('set @rownum=0'));
             $authors = Kelurahan::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'nama_kelurahan','nama_pimpinan','alamat','email','id','kecamatan_id']);
             return Datatables::of($authors)
                 ->addColumn('kecamatan', function($authors) {
                     return $authors->kecamatan->nama_kecamatan;
                 })
                 ->addColumn('action', function($author){
                     return view('datatable._action', [
                         'model'           => $author,
                         'form_url'        => route('kelurahan.destroy', $author->id),
                         'edit_url' => route('kelurahan.edit', $author->id),
                         'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
                     ]);

                 })
                 ->addIndexColumn()
                 ->make(true);
         }


         $html = $htmlBuilder
                 ->addColumn(['data' => 'rownum', 'name'=>'rownum', 'title'=>'No', 'orderable'=>false, 'searchable'=>false])
                 ->addColumn(['data' => 'nama_kelurahan', 'name'=>'nama', 'title'=>'Nama Kelurahan'])
                 ->addColumn(['data' => 'nama_pimpinan', 'name'=>'pimpinan', 'title'=>'Pimpinan'])
                 ->addColumn(['data' => 'alamat', 'name'=>'alamat', 'title'=>'Alamat'])
                 ->addColumn(['data' => 'email', 'name'=>'email', 'title'=>'Email'])
                 ->addColumn(['data' => 'kecamatan', 'name'=>'kecamatan_id', 'title'=>'Kecamatan'])
                 ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

         return view('kelurahan.index')->with(compact('html','muspida_list','jumlah_muspida'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $list_kec = Kecamatan::pluck('nama_kecamatan','id');
        return view('kelurahan.create', compact('list_kec'));
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

        //validasi
        $validator = Validator::make($input,[

          'nama_kelurahan'=> 'required',
          'nama_pimpinan'=> 'required',
          'alamat'=> 'required',
          'email'=> 'required',
          'kecamatan_id'=> 'required',

        ]);

        if($validator->fails()){
          return redirect('kelurahan/create')->withInput()->withErrors($validator);
        }

        Kelurahan::create($input);
        return redirect('kelurahan');
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
        $muspida = Kelurahan::findOrFail($id);
        $list_kec = kecamatan::pluck('nama_kecamatan','id');
        return view('kelurahan.edit', compact('muspida','list_kec'));
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
        $muspida = Kelurahan::findOrFail($id);
        $muspida->update($request->all());
        return redirect('kelurahan');
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
        $muspida = Kelurahan::findOrFail($id);
        $muspida->delete();
        return redirect('kelurahan');
    }
}
