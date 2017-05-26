<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use Validator;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;


class KecamatanController extends Controller
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
         $muspida_list = Kecamatan::orderBy('id','desc')->paginate(10);
         $jumlah_muspida = Kecamatan::count();
         //return $univ_list;

         //return view('dinas.index', compact('muspida_list','jumlah_muspida'));

         if ($request->ajax()) {
             DB::statement(DB::raw('set @rownum=0'));
             $authors = Kecamatan::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'nama_kecamatan','nama_pimpinan','alamat','faks','email','website','id']);
             return Datatables::of($authors)
                 ->addColumn('action', function($author){
                     return view('datatable._action', [
                         'model'           => $author,
                         'form_url'        => route('kecamatan.destroy', $author->id),
                         'edit_url' => route('kecamatan.edit', $author->id),
                         'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
                     ]);

                 })
                 ->addIndexColumn()
                 ->make(true);
         }


         $html = $htmlBuilder
                 ->addColumn(['data' => 'rownum', 'name'=>'rownum', 'title'=>'No', 'orderable'=>false, 'searchable'=>false])
                 ->addColumn(['data' => 'nama_kecamatan', 'name'=>'nama', 'title'=>'Nama Dinas'])
                 ->addColumn(['data' => 'nama_pimpinan', 'name'=>'pimpinan', 'title'=>'Pimpinan'])

                 ->addColumn(['data' => 'alamat', 'name'=>'alamat', 'title'=>'Alamat'])
                 ->addColumn(['data' => 'faks', 'name'=>'faks', 'title'=>'Jabatan'])
                 ->addColumn(['data' => 'website', 'name'=>'website', 'title'=>'Website'])
                 ->addColumn(['data' => 'email', 'name'=>'email', 'title'=>'Email'])
                 ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

         return view('kecamatan.index')->with(compact('html','muspida_list','jumlah_muspida'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('kecamatan.create');
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

          'nama_kecamatan'=> 'required',
          'nama_pimpinan'=> 'required',
          'alamat'=> 'required',
          'faks'=> 'required',

          'email'=> 'required',



        ]);

        if($validator->fails()){
          return redirect('kecamatan/create')->withInput()->withErrors($validator);
        }

        Kecamatan::create($input);
        return redirect('kecamatan');
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
        $muspida = Kecamatan::findOrFail($id);

        return view('kecamatan.edit', compact('muspida'));
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
        $muspida = Kecamatan::findOrFail($id);
        $muspida->update($request->all());
        return redirect('kecamatan');
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
        $muspida = Kecamatan::findOrFail($id);
        $muspida->delete();
        return redirect('kecamatan');
    }
}
