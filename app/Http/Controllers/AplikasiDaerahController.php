<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AplikasiDaerah;
use Validator;

class AplikasiDaerahController extends Controller
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
        $muspida_list = AplikasiDaerah::orderBy('id','desc')->paginate(10);
        $jumlah_muspida = AplikasiDaerah::count();
        //return $univ_list;

        return view('aplikasi_daerah.index', compact('muspida_list','jumlah_muspida'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('aplikasi_daerah.create');
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
          
          'nama'=> 'required',
          'link'=> 'required',




        ]);

        if($validator->fails()){
          return redirect('aplikasi_daerah/create')->withInput()->withErrors($validator);
        }

        AplikasiDaerah::create($input);
        return redirect('aplikasi_daerah');
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
        $muspida = AplikasiDaerah::findOrFail($id);

        return view('aplikasi_daerah.edit', compact('muspida'));
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
        $muspida = AplikasiDaerah::findOrFail($id);
        $muspida->update($request->all());
        return redirect('aplikasi_daerah');
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
        $muspida = AplikasiDaerah::findOrFail($id);
        $muspida->delete();
        return redirect('aplikasi_daerah');
    }
}
