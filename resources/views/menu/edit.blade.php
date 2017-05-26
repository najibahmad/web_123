

@extends('admin.index')
@section('css')

@endsection
@section('content')


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Update Kecamatan

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">update Kecamatan</li>
    </ol>
  </section>

  <section class="content">
  <!-- Content Header (Page header) -->
  <div class="row">
    <div class="col-md-12">

    {!! Form::model($muspida, ['method' => 'PATCH', 'action' => ['KecamatanController@update', $muspida->id]]) !!}
            @include('kecamatan.form', ['submitButtonText' => "Update Kecamatan"])
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
@endsection
