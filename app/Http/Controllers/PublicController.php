<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\DokumenDaerah;
use App\KategoriDokumen;
use App\JaringanInformasi;
use App\AplikasiDaerah;
use App\DinasBadanBagian;
use App\Muspida;
use App\GrupMuspida;
use App\Eksekutif;
use App\GrupEksekutif;
use App\Berita;
use App\KategoriBerita;
use App\Agenda;

class PublicController extends Controller
{

  public function publicberita($id){
    if($id=="all"){
        $post = Berita::get();
        $kat = "Semua Kategori";
    }else{
        $post = Berita::where('kategori_berita_id','=',$id)->get();
        $kat_temp = KategoriBerita::findOrFail($id);
        $kat = $kat_temp->nama;
    }

    //$kategori = KategoriBerita::get();
    //dd($post);
    $kategori = DB::table('kategori_berita')
            ->select(DB::raw('count(*) as jumlah_berita,kategori_berita.nama, kategori_berita.id'))
            ->join('berita', 'kategori_berita.id', '=', 'berita.kategori_berita_id')
            ->groupBy('kategori_berita.id')
            ->get();




    return view('beritapublic', compact('post','kategori','kat'));
  }

  public function detilberita($id){
    $post = Berita::findOrFail($id);
    $kategori = KategoriBerita::get();

    $kategori = DB::table('kategori_berita')
            ->select(DB::raw('count(*) as jumlah_berita,kategori_berita.nama, kategori_berita.id'))
            ->join('berita', 'kategori_berita.id', '=', 'berita.kategori_berita_id')
            ->groupBy('kategori_berita.id')
            ->get();


    return view('detilberita', compact('kategori','post'));
  }

  public function beranda(){
    $post = Berita::orderBy('id','desc')->limit(2)->get();
    $post2 = Berita::orderBy('id','desc')->offset(2)->limit(3)->get();

    $agenda = Agenda::orderBy('id','desc')->limit(3)->get();


    return view('beranda', compact('post','post2','agenda'));
  }

  public function staticpage($id){
    $post = Post::findOrFail($id);
    $post_terkait = Post::where('category_id','=',$post->category_id)->get();

    $category = Category::findOrFail($post->category_id);

    return view('staticpage', compact('post_terkait','category','post'));
  }

  public function dokumenlist($id){
    $kategori_list = KategoriDokumen::orderBy('id','desc')->get();
    $dokumen = DokumenDaerah::where('kategori_dokumen_id','=',$id)->get();
    $category = KategoriDokumen::findOrFail($id);

    return view('dokumenlist', compact('kategori_list','dokumen','category'));
  }

  public function index(){

    $sekilas_lb = Post::where('category_id','=',1)->get();
    $fasilitas_daerah = Post::where('category_id','=',2)->get();
    $pajak = Post::where('category_id','=',3)->get();
    $layanan = Post::where('category_id','=',4)->get();
    $potensi = Post::where('category_id','=',5)->get();

    //download
    $kategori_list = KategoriDokumen::orderBy('id','desc')->get();

    //sosial
    $sosial = JaringanInformasi::orderBy('id','desc')->get();

    $aplikasi = AplikasiDaerah::orderBy('id','desc')->get();


    return view('index', compact('aplikasi','sosial','sekilas_lb','fasilitas_daerah','pajak','layanan','potensi','kategori_list'));
  }

  public function pemerintahan($id){
    if($id==1){ //dinas
      $list = DinasBadanBagian::orderBy('id','desc')->where('jenis','=','dinas')->get();
    }
    else if($id==2){ //badan
      $list = DinasBadanBagian::orderBy('id','desc')->where('jenis','=','badan')->get();
    }
    else if($id==3){ //badan
      $list = DinasBadanBagian::orderBy('id','desc')->where('jenis','=','bagian')->get();
    }

    return view('pemerintah', compact('list'));
  }

  public function muspida(){
    $kategori = GrupMuspida::get();
    $list = Muspida::get();

    return view('muspida', compact('kategori','list'));
  }

  public function eksekutif(){
    $kategori = GrupEksekutif::get();
    $list = Eksekutif::get();



    return view('eksekutif', compact('kategori','list'));
  }

}
