@extends('layouts.content')
@section('css')

@endsection
@section('content')

<div class="container" style="background-color: white;">
  <div class="row">

    <div class="col-md-9">
      <h2>Kategori: {{$kat}}</h2><br><br>

      <?php foreach($post as $row): ?>

        <?php
        $doc=new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($row->content);
        $xml=simplexml_import_dom($doc); // just to make xpath more simple
        $images=$xml->xpath('//img');
        //echo count($images);
        ?>

        <div class="row">
          <div class="col-md-3" style="margin-top:30px;">
            @if(count($images) > 0)
                <img src="{{$images[0]['src']}}" alt="{{$images[0]['alt']}}" class="img-responsive">
            @else
                <img src="{{asset('images/img_not_available.png')}}" alt="No Image Available" class="img-responsive">
            @endif

          </div>
          <div class="col-md-9">
            <a href="{{ url('detilberita/'.$row->id.'/'.$row->title) }}"><h3>{{$row->title}}</h3></a>
            <hr style="margin-top: 0px; margin-bottom: 10px;">
            <p style="font-size: 0.9em; color: gray;"><em>{{$row->tanggal_post}} - {{$row->author}}</em></p>
            <p>
              <?php echo substr(strip_tags($row->content),0,210) . "..."; ?>
            </p>
            <a href="{{ url('detilberita/'.$row->id.'/'.$row->title) }}" class="label label-default">Selengkapnya...</a>
          </div>
        </div>
        <?php

        endforeach ?>



      <hr>



    </div>

    <div class="col-md-3">
      <h3>Kategori Berita</h3>
      <hr style="margin-top: 0px; margin-bottom: 10px;">
      <div class="list-group">
        <?php foreach($kategori as $row): ?>
          <a href="{{url('beritapublic/'.$row->id)}}" class="list-group-item">
            <span class="badge">{{$row->jumlah_berita}}</span>
            {{$row->nama}}
          </a>
        <?php endforeach ?>


      </div>
    </div>
  </div>


</div>


<!-- Creates the bootstrap modal where the image will appear -->

@endsection

@section('script')

@endsection
