<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use Validator;
use Carbon\Carbon;

class AgendaController extends Controller
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
    public function index()
    {
        //
        $muspida_list = Agenda::orderBy('id','desc')->paginate(10);
        $jumlah_muspida = Agenda::count();
        //return $univ_list;

        return view('agenda.index', compact('muspida_list','jumlah_muspida'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('agenda.create');
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

          'content'=> 'required',
          'title'=> 'required',
          'tanggal'=> 'required',



        ]);
        
        if($validator->fails()){
          return redirect('agenda/create')->withInput()->withErrors($validator);
        }

        Agenda::create($input);
        return redirect('agenda');
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
        $muspida = Agenda::findOrFail($id);

        return view('agenda.edit', compact('muspida'));
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
        $muspida = Agenda::findOrFail($id);
        $muspida->update($request->all());
        return redirect('agenda');
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
        $muspida = Agenda::findOrFail($id);
        $muspida->delete();
        return redirect('agenda');
    }
}
