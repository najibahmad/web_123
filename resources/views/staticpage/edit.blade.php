

@extends('admin.index')
@section('css')

@endsection
@section('content')


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Update Halaman Statis

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">update halaman statis</li>
    </ol>
  </section>

  <section class="content">
  <!-- Content Header (Page header) -->
  <div class="row">
    <div class="col-md-12">

      <a href="{{url('static/'.$post->id.'/'.$post->title)}}"><i class="fa fa-eye" aria-hidden="true"></i> Lihat Tampilan</a>
      <br><br>

    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['StaticPageController@update', $post->id]]) !!}
            @include('staticpage.form', ['submitButtonText' => "Update Halaman ".$post->title])
        {!! Form::close() !!}

      </div>


  </div>
</section>
  <!-- Main content -->

  <!-- /.content -->
</div>

<!-- Creates the bootstrap modal where the image will appear -->

@endsection

@section('script')

<script type="text/javascript">
       $(document).ready(function() {

         <?php
          $post->content = str_replace("'", "\'", $post->content);
          $post->content = str_replace('"', '\"', $post->content);
          $post->content = preg_replace( "/\r|\n/", "<br>", $post->content);
         ?>

         var text = '<?php Print($post->content); ?>';
         if(text==""){
           text = "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
         }

         $('#content').summernote('code', text);
           $('#content').summernote({
             height:500,
             codemirror: { // codemirror options
                theme: 'monokai'
              }

           });
       });




   </script>
@endsection
