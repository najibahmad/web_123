

@extends('admin.index')
@section('css')

@endsection
@section('content')


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Manajemen Berita Kota Lubuklinggau

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">berita</li>
    </ol>
  </section>

  <section class="content">
  <!-- Content Header (Page header) -->
  <div class="row">

      <div class="col-lg-8 ">
        <div class="tombol-nav">
          <a href="berita/create" class="btn btn-primary">Tambah Berita</a><br>
            <p align="right"><strong> Jumlah Berita yang Ditampilkan: {{ $jumlah_post }} </strong></p>
      </div>
      <br>



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
