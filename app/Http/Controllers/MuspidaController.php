<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Muspida;
use App\GrupMuspida;
use Validator;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;


class MuspidaController extends Controller
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
        $muspida_list = Muspida::orderBy('id','desc')->paginate(10);
        $jumlah_muspida = Muspida::count();
        //return $univ_list;

        //return view('muspida.index', compact('muspida_list','jumlah_muspida'));

        if ($request->ajax()) {
            DB::statement(DB::raw('set @rownum=0'));
            $authors = Muspida::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'nama', 'alamat_rumah','alamat_kantor','grup_muspida_id','id']);
            return Datatables::of($authors)
                ->addColumn('grup', function($authors) {
                    return $authors->grup_muspida->nama_grup;
                })
                ->addColumn('action', function($author){
                    return view('datatable._action', [
                        'model'           => $author,
                        'form_url'        => route('muspida.destroy', $author->id),
                        'edit_url' => route('muspida.edit', $author->id),
                        'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
                    ]);

                })
                ->addIndexColumn()
                ->make(true);
        }


        $html = $htmlBuilder
                ->addColumn(['data' => 'rownum', 'name'=>'rownum', 'title'=>'No', 'orderable'=>false, 'searchable'=>false])
                ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama'])
                ->addColumn(['data' => 'alamat_rumah', 'name'=>'alamat_rumah', 'title'=>'Alamat Rumah'])
                ->addColumn(['data' => 'alamat_kantor', 'name'=>'alamat_kantor', 'title'=>'Alamat Kantor'])
                ->addColumn(['data' => 'grup', 'name'=>'grup_muspida_id', 'title'=>'Grup'])
                ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

        return view('muspida.index')->with(compact('html','muspida_list','jumlah_muspida'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $list_grup = GrupMuspida::pluck('nama_grup','id');
        return view('muspida.create', compact('list_grup'));
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
          'alamat_rumah' => 'required',
          'alamat_kantor'  => 'required',
          'grup_muspida_id'  => 'required',

        ]);

        if($validator->fails()){
          return redirect('muspida/create')->withInput()->withErrors($validator);
        }

        Muspida::create($input);
        return redirect('muspida');
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
        $muspida = Muspida::findOrFail($id);
        $list_grup = GrupMuspida::pluck('nama_grup','id');
        return view('muspida.edit', compact('muspida','list_grup'));
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
        $muspida = Muspida::findOrFail($id);
        $muspida->update($request->all());
        return redirect('muspida');
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
        $muspida = Muspida::findOrFail($id);
        $muspida->delete();
        return redirect('muspida');
    }
}
