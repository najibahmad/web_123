

@extends('admin.index')
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


@endsection
@section('content')


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tambah Data Agenda <br><br>

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">update Agenda</li>
    </ol>
  </section>
  <hr>

  <section class="content">
  <!-- Content Header (Page header) -->
  <div class="row">
    <div class="col-md-10">

      {!! Form::open(['url' => 'agenda']) !!}
                @include('agenda.form', ['submitButtonText' => 'Tambah Agenda'])
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $( function() {
      $('#tanggal').datepicker({
        dateFormat: 'yy-mm-dd',
        startDate: '-3d'
      });
    } );
   </script>
@endsection
