<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DinasBadanBagian;
use Validator;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;



class BadanController extends Controller
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
         $muspida_list = DinasBadanBagian::orderBy('id','desc')->where('jenis','=','badan')->paginate(10);
         $jumlah_muspida = DinasBadanBagian::count();
         //return $univ_list;

         //return view('dinas.index', compact('muspida_list','jumlah_muspida'));

         if ($request->ajax()) {
             DB::statement(DB::raw('set @rownum=0'));
             $authors = DinasBadanBagian::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'nama', 'pimpinan','jabatan','alamat','telp','website','email','id'])->where('jenis','=','badan');
             return Datatables::of($authors)
                 ->addColumn('action', function($author){
                     return view('datatable._action', [
                         'model'           => $author,
                         'form_url'        => route('dinas.destroy', $author->id),
                         'edit_url' => route('dinas.edit', $author->id),
                         'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
                     ]);

                 })
                 ->addIndexColumn()
                 ->make(true);
         }


         $html = $htmlBuilder
                 ->addColumn(['data' => 'rownum', 'name'=>'rownum', 'title'=>'No', 'orderable'=>false, 'searchable'=>false])
                 ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama Dinas'])
                 ->addColumn(['data' => 'pimpinan', 'name'=>'pimpinan', 'title'=>'Pimpinan'])
                 ->addColumn(['data' => 'jabatan', 'name'=>'jabatan', 'title'=>'Jabatan'])
                 ->addColumn(['data' => 'alamat', 'name'=>'alamat', 'title'=>'Alamat'])
                 ->addColumn(['data' => 'telp', 'name'=>'telp', 'title'=>'Telp'])
                 ->addColumn(['data' => 'website', 'name'=>'website', 'title'=>'Website'])
                 ->addColumn(['data' => 'email', 'name'=>'email', 'title'=>'Email'])
                 ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

         return view('badan.index')->with(compact('html','muspida_list','jumlah_muspida'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('badan.create');
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
          'jenis' => 'required',
          'nama'=> 'required',
          'pimpinan'=> 'required',
          'jabatan'=> 'required',
          'alamat'=> 'required',
          'telp'=> 'required',
          'website'=> 'required',
          'email'=> 'required',



        ]);

        if($validator->fails()){
          return redirect('badan/create')->withInput()->withErrors($validator);
        }

        DinasBadanBagian::create($input);
        return redirect('badan');
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
        $muspida = DinasBadanBagian::findOrFail($id);

        return view('badan.edit', compact('muspida'));
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
        $muspida = DinasBadanBagian::findOrFail($id);
        $muspida->update($request->all());
        return redirect('badan');
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
        $muspida = DinasBadanBagian::findOrFail($id);
        $muspida->delete();
        return redirect('badan');
    }
}
