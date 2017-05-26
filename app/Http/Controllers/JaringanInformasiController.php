<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\JaringanInformasi;

class JaringanInformasiController extends Controller
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
        $muspida_list = JaringanInformasi::orderBy('id','desc')->paginate(10);
        $jumlah_muspida = JaringanInformasi::count();
        //return $univ_list;

        return view('jaringan_informasi.index', compact('muspida_list','jumlah_muspida'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('jaringan_informasi.create');
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
          return redirect('jaringan_informasi/create')->withInput()->withErrors($validator);
        }

        JaringanInformasi::create($input);
        return redirect('jaringan_informasi');
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
        $muspida = JaringanInformasi::findOrFail($id);

        return view('jaringan_informasi.edit', compact('muspida'));
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
        $muspida = JaringanInformasi::findOrFail($id);
        $muspida->update($request->all());
        return redirect('jaringan_informasi');
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
        $muspida = JaringanInformasi::findOrFail($id);
        $muspida->delete();
        return redirect('jaringan_informasi');
    }
}
