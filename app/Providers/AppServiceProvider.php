<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Post;
use App\Menu;
use App\AplikasiDaerah;
use App\KategoriDokumen;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $fasilitas_daerah = Post::where('category_id','=',2)->get();
        View::share('fasilitas_daerah', $fasilitas_daerah);
        $potensi = Post::where('category_id','=',5)->get();
        View::share('potensi', $potensi);
        $aplikasi = AplikasiDaerah::orderBy('id','desc')->get();
        View::share('aplikasi', $aplikasi);
        $kategori_list = KategoriDokumen::orderBy('id','desc')->get();
        View::share('kategori_list', $kategori_list);
        $pajak = Post::where('category_id','=',3)->get();
        View::share('pajak', $pajak);

        $layanan = Post::where('category_id','=',4)->get();
        View::share('layanan', $layanan);

        $sekilas_lb = Post::where('category_id','=',1)->get();
        View::share('sekilas_lb', $sekilas_lb);


        //dd($sekilas_lb);
        $menu_1 = Menu::where('level','=',1)->get();
        View::share('menu_1', $menu_1);
        $menu_2 = Menu::where('level','=',2)->get();
        View::share('menu_2', $menu_2);

        //dd($menu_2);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
