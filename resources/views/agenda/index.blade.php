

@extends('admin.index')
@section('css')

@endsection
@section('content')


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Daftar Agenda

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Daftar Agenda</li>
    </ol>
  </section>

  <section class="content">
  <!-- Content Header (Page header) -->
  <div class="row">

      <div class="col-lg-12">
        <div class="tombol-nav">
          <a href="agenda/create" class="btn btn-primary">Tambah Agenda</a><br>
            <p align="right"><strong> Jumlah Agenda yang Ditampilkan: {{ $jumlah_muspida }} </strong></p>
      </div>

          <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Konten</th>

                          <th style="min-width:150px;">Action</th>
                      </tr>
                  </thead>

                  <tbody>
                    <?php $i = ($muspida_list->currentPage()-1)*$muspida_list->perPage(); ?>
                    <?php foreach($muspida_list as $row): ?>
                      <tr class="">
                          <td>{{ ++$i }}</td>
                          <td>{{ $row->title }}</td>
                          <td>{{ $row->content }}</td>
                          <td>{{date_format($row->tanggal, 'd M Y')}}</td>

                          <td>
                            <div class="box-button">
                                {{ link_to('agenda/' . $row->id . '/edit', ' edit', ['class' => 'btn btn-warning btn-sm fa fa-edit']) }}
                            </div>

                            <div class="box-button">
                              {!! Form::open(['method' => 'DELETE', 'action' => ['AgendaController@destroy', $row->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                  {{Form::button(' hapus', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm fa fa-remove '))}}
                              {!! Form::close() !!}
                          </div>
                          </td>
                      </tr>
                      <?php endforeach ?>

                  </tbody>
              </table>

              <div class="table-nav">

                <div clas="paging">
                  {{ $muspida_list->links() }}
                </div>


              </div>

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
@endsection
