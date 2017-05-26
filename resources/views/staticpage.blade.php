@extends('layouts.content')
@section('css')

@endsection
@section('content')
<div class="container" style="background-color: white;">
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default" style="margin-top: 5%;">
        <div class="panel-header" style="background-color: #03a9f4;">
          <div class="container">
            <h4 style="color: white;"><strong>{{$category->nama}}</strong></h4>
          </div>
        </div>
        <div class="panel-body">
          <?php foreach($post_terkait as $row): ?>
            <i class="fa fa-arrow-right" aria-hidden="true" style="padding-left: 3%;"></i> <a href="{{ url('static/'.$row->id).'/'.$row->title }}" style="padding-left: 3%;">{{$row->title}}</a>

            <hr>
            <?php endforeach ?>


        </div>
      </div>
    </div>

    <div class="col-md-9">
      <h2>{{$post->title}}
      </h2>

      <hr>
      <?php echo $post->content; ?>
      <h5>@if (Auth::check())
        <a href="{{url('staticpage/'.$post->id.'/edit/'.$post->category_id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit</a>
      @endif</h5>
    </div>



  </div>
</div>


<!-- Creates the bootstrap modal where the image will appear -->

@endsection

@section('script')

@endsection
