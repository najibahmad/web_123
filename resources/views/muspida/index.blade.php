

@extends('admin.index')
@section('css')

@endsection
@section('content')


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Daftar Muspida

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Daftar Muspida</li>
    </ol>
  </section>

  <section class="content">
  <!-- Content Header (Page header) -->
  <div class="row">

      <div class="col-lg-12">
        <div class="tombol-nav">
          <a href="muspida/create" class="btn btn-primary">Tambah Muspida</a><br>
            <p align="right"><strong> Jumlah Muspida yang Ditampilkan: {{ $jumlah_muspida }} </strong></p>
      </div>

      <div class="table-responsive">

        {!! $html->table(['class'=>'table-striped']) !!}

      </div>
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
           $('#content').summernote({
             height:300,
           });
       });
   </script>

   {!! $html->scripts() !!}
@endsection
