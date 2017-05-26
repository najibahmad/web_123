<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Input;
use Image;
use Session;
use Redirect;

class PostController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function insertPost(){


        $post = new Post;

        $message = Input::get('content');

            $post->title = Input::get('title');
            //$post->content = Input::get('content');
            $post->category_id = 1;

            //$post->save();

    $dom = new \DomDocument();
		$dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

		$images = $dom->getElementsByTagName('img');



		// foreach <img> in the submited message
		foreach($images as $img){
			$src = $img->getAttribute('src');

			// if the img source is 'data-url'
			if(preg_match('/data:image/', $src)){

				// get the mimetype
				preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
				$mimetype = $groups['mime'];

				// Generating a random filename
				$filename = uniqid();
				$filepath = "/images/$filename.$mimetype";

				// @see http://image.intervention.io/api/
				$image = Image::make($src)
				  // resize if required
				  /* ->resize(300, 200) */
				  ->encode($mimetype, 100) 	// encode file to the specified mimetype
				  ->save(public_path($filepath));

				$new_src = asset($filepath);
				$img->removeAttribute('src');
				$img->setAttribute('src', $new_src);
			} // <!--endif
		} // <!--endforeach

		$post->content = $dom->saveHTML();
		$post->save();

		Session::flash('message','Post updated!');
		return Redirect::back();

  }

  public function uploadImage(){
    dd("masuk");
  }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($judul)
    {
        //
        return view('admin.post', compact('judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
