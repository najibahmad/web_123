<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Muspida;
use App\GrupMuspida;
use App\Eksekutif;
use App\GrupEksekutif;
use Validator;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;

class EksekutifController extends Controller
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
        $muspida_list = Eksekutif::orderBy('id','desc')->paginate(10);
        $jumlah_muspida = Eksekutif::count();
        //return $univ_list;

        //return view('eksekutif.index', compact('muspida_list','jumlah_muspida'));
        if ($request->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $authors = Eksekutif::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'nama', 'alamat','jabatan','grup_eksekutif_id','id']);
            return Datatables::of($authors)
                ->addColumn('grup', function($authors) {
                    return $authors->grup_eksekutif->nama_grup;
                })
                ->addColumn('action', function($author){
                    return view('datatable._action', [
                        'model'           => $author,
                        'form_url'        => route('eksekutif.destroy', $author->id),
                        'edit_url' => route('eksekutif.edit', $author->id),
                        'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
                    ]);

                })
                ->addIndexColumn()
                ->make(true);
        }


        $html = $htmlBuilder
                ->addColumn(['data' => 'rownum', 'name'=>'rownum', 'title'=>'No', 'orderable'=>false, 'searchable'=>false])
                ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama'])
                ->addColumn(['data' => 'alamat', 'name'=>'alamat', 'title'=>'Alamat'])
                ->addColumn(['data' => 'jabatan', 'name'=>'jabatan', 'title'=>'Jabatan'])
                ->addColumn(['data' => 'grup', 'name'=>'grup_eksekutif_id', 'title'=>'Grup'])
                ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

        return view('eksekutif.index')->with(compact('html','muspida_list','jumlah_muspida'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $list_grup = GrupEksekutif::pluck('nama_grup','id');
        return view('eksekutif.create', compact('list_grup'));
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
          'nama'  => 'required',
          'alamat' => 'required',
          'jabatan'  => 'required',
          'grup_eksekutif_id'  => 'required',

        ]);

        if($validator->fails()){
          return redirect('eksekutif/create')->withInput()->withErrors($validator);
        }

        Eksekutif::create($input);
        return redirect('eksekutif');
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
        $muspida = Eksekutif::findOrFail($id);
        $list_grup = GrupEksekutif::pluck('nama_grup','id');
        return view('eksekutif.edit', compact('muspida','list_grup'));
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
        $muspida = Eksekutif::findOrFail($id);
        $muspida->update($request->all());
        return redirect('eksekutif');
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
        $muspida = Eksekutif::findOrFail($id);
        $muspida->delete();
        return redirect('eksekutif');
    }
}
