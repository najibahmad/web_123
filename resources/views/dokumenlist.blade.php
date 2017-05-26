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
            <h4 style="color: white;"><strong>Jenis Dokumen</strong></h4>
          </div>
        </div>
        <div class="panel-body">
          <?php foreach($kategori_list as $row): ?>
            <i class="fa fa-arrow-right" aria-hidden="true" style="padding-left: 3%;"></i> <a href="{{ url('dokumenlist/'.$row->id) }}" style="padding-left: 3%;">{{$row->nama}}</a>
            <hr>
            <?php endforeach ?>


        </div>
      </div>
    </div>

    <div class="col-md-8">
      <h2>{{$category->nama}}</h2>
      <hr>
      <table class="table table-hover">
      <tbody>
        <?php foreach($dokumen as $row): ?>
          <tr>
            <td>
              <span class="fa fa-file"></span>
              {{$row->judul}}
            </td>
            <td class="text-right text-nowrap">
              <button class="btn btn-xs btn-info">{{$row->format}}</button>
              <button class="btn btn-xs btn-warning">
                <a href="{{ url('download-file/'.$row->id) }}"><i class="fa fa-download" aria-hidden="true"></i></a>
              </button>
            </td>
          </tr>
          <?php endforeach ?>


      </tbody>
    </table>
    </div>



  </div>
</div>


<!-- Creates the bootstrap modal where the image will appear -->

@endsection

@section('script')

@endsection
