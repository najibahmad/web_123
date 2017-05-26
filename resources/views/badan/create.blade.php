Badan dan Kantor

@extends('admin.index')
@section('css')

@endsection
@section('content')


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tambah Data Badan dan Kantor <br><br>

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">update Badan dan Kantor</li>
    </ol>
  </section>
  <hr>

  <section class="content">
  <!-- Content Header (Page header) -->
  <div class="row">
    <div class="col-md-10">

      {!! Form::open(['url' => 'badan']) !!}
                @include('badan.form', ['submitButtonText' => 'Tambah Badan dan Kantor'])
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
           $('#post').summernote({
             height:200,

           });
       });
   </script>
@endsection
