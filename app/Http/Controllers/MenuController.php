<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Validator;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;

class MenuController extends Controller
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
         $muspida_list = Menu::orderBy('id','desc')->paginate(10);
         $jumlah_muspida = Menu::count();
         //return $univ_list;

         //return view('dinas.index', compact('muspida_list','jumlah_muspida'));

         if ($request->ajax()) {
             DB::statement(DB::raw('set @rownum=0'));
             $authors = Menu::select([DB::raw('@rownum  := @rownum  + 1 AS rownum'),'nama','level','id_parent','type','id_post','route','id']);
             return Datatables::of($authors)
                 ->addColumn('action', function($author){
                     return view('datatable._action', [
                         'model'           => $author,
                         'form_url'        => route('menu.destroy', $author->id),
                         'edit_url' => route('menu.edit', $author->id),
                         'confirm_message' => 'Yakin mau menghapus ' . $author->name . '?'
                     ]);

                 })
                 ->addIndexColumn()
                 ->make(true);
         }


         $html = $htmlBuilder
                 ->addColumn(['data' => 'rownum', 'name'=>'rownum', 'title'=>'No', 'orderable'=>false, 'searchable'=>false])
                 ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama Menu'])
                 ->addColumn(['data' => 'level', 'name'=>'level', 'title'=>'Level'])

                 ->addColumn(['data' => 'id_parent', 'name'=>'id_parent', 'title'=>'Parent Menu'])
                 ->addColumn(['data' => 'type', 'name'=>'type', 'title'=>'Tipe'])
                 ->addColumn(['data' => 'route', 'name'=>'route', 'title'=>'Route'])
                 ->addColumn(['data' => 'id_post', 'name'=>'id_post', 'title'=>'Halaman'])
                 ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

         return view('menu.index')->with(compact('html','muspida_list','jumlah_muspida'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('menu.create');
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

          'nama_menu'=> 'required',
          'nama_pimpinan'=> 'required',
          'alamat'=> 'required',
          'faks'=> 'required',

          'email'=> 'required',



        ]);

        if($validator->fails()){
          return redirect('menu/create')->withInput()->withErrors($validator);
        }

        Menu::create($input);
        return redirect('menu');
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
        $muspida = Menu::findOrFail($id);

        return view('menu.edit', compact('muspida'));
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
        $muspida = Menu::findOrFail($id);
        $muspida->update($request->all());
        return redirect('menu');
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
        $muspida = Menu::findOrFail($id);
        $muspida->delete();
        return redirect('menu');
    }
}
