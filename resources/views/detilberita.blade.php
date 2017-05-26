@extends('layouts.content')
@section('css')

@endsection
@section('content')

<div class="container" style="background-color: white;">
  <div class="row">
    <div class="col-md-8">

      <h2>{{$post->title}}</h2>
      <i class="fa fa-clock-o" aria-hidden="true"></i> {{$post->tanggal_post}}
      <i class="fa fa-user" aria-hidden="true" style="padding-left: 2%;"></i> {{$post->author}}


      <hr>

      <?php echo $post->content; ?>

    </div>

    <div class="col-md-4">
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
