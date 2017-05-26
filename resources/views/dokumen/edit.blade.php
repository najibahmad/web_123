

@extends('admin.index')
@section('css')

@endsection
@section('content')


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Update Muspida

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">update Muspida</li>
    </ol>
  </section>

  <section class="content">
  <!-- Content Header (Page header) -->
  <div class="row">
    <div class="col-md-12">

    {!! Form::model($dokumen, ['method' => 'PATCH', 'action' => ['DokumenDaerahController@update', $dokumen->id]]) !!}
            @include('dokumen.form', ['submitButtonText' => "Update Muspida"])
        {!! Form::close() !!}

      </div>


  </div>
</section>
  <!-- Main content -->

  <!-- /.content -->
</div>

<!-- Creates the bootstrap modal where the image will appear -->

@endsection

<script type="text/javascript">
       $(document).ready(function() {
         var text = '<?php Print(substr($dokumen->konten,0,strlen($dokumen->konten)-1)); ?>';

         $('#konten').summernote('code', text);
           $('#konten').summernote({
             height:500,
             codemirror: { // codemirror options
                theme: 'monokai'
              }

           });
       });




   </script>
@section('script')
@endsection
