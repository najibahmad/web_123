

@extends('admin.index')
@section('css')

@endsection
@section('content')


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Update Badan dan Kantor

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">update Badan dan Kantor</li>
    </ol>
  </section>

  <section class="content">
  <!-- Content Header (Page header) -->
  <div class="row">
    <div class="col-md-12">

    {!! Form::model($muspida, ['method' => 'PATCH', 'action' => ['BadanController@update', $muspida->id]]) !!}
            @include('badan.form', ['submitButtonText' => "Update Badan dan Kantor"])
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

         var text = '<?php Print(substr($muspida->post,0,strlen($muspida->post)-1)); ?>';
         if(text==""){
           text = "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
         }

         $('#post').summernote('code', text);
           $('#post').summernote({
             height:500,
             codemirror: { // codemirror options
                theme: 'monokai'
              }

           });
       });




   </script>
@endsection
