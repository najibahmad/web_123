@extends('layouts.content')
@section('css')
<style>
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");
.panel-title > a:before {
    float: right !important;
    font-family: FontAwesome;
    content:"\f055";
    padding-right: 5px;
}
.panel-title > a.collapsed:before {
    float: right !important;
    content:"\f056";
}
.panel-title > a:hover,
.panel-title > a:active,
.panel-title > a:focus  {
    text-decoration:none;
}

table, table tr, table tr td, table tr th {
    border-color: #e5e5e5;
}

tr th, tr td {
    padding: 10px;
    border-right: 1px solid;
}
</style>
@endsection
@section('content')
<div class="container" style="background-color: white;">
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default" style="margin-top: 5%;">
        <div class="panel-header" style="background-color: #03a9f4;">
          <div class="container">
            <h4 style="color: white;"><strong>Pemerintahan</strong></h4>
          </div>
        </div>
        <div class="panel-body">

            <i class="fa fa-arrow-right" aria-hidden="true" style="padding-left: 3%;"></i>
            <a href="{{ url('pemerintahan/2') }}" style="padding-left: 3%;">Badan dan Kantor</a>
            <hr>

            <i class="fa fa-arrow-right" aria-hidden="true" style="padding-left: 3%;"></i>
            <a href="{{ url('pemerintahan/3') }}" style="padding-left: 3%;">Bagian</a>
            <hr>

            <i class="fa fa-arrow-right" aria-hidden="true" style="padding-left: 3%;"></i>
            <a href="{{ url('eksekutifpublic') }}" style="padding-left: 3%;">Daftar Eksekutif</a>
            <hr>

            <i class="fa fa-arrow-right" aria-hidden="true" style="padding-left: 3%;"></i>
            <a href="{{ url('muspidapublic') }}" style="padding-left: 3%;">Daftar Muspida</a>
            <hr>

            <i class="fa fa-arrow-right" aria-hidden="true" style="padding-left: 3%;"></i>
            <a href="{{ url('pemerintahan/1') }}" style="padding-left: 3%;">Dinas</a>
            <hr>

            <i class="fa fa-arrow-right" aria-hidden="true" style="padding-left: 3%;"></i>
            <a href="{{ url('kecamatan') }}" style="padding-left: 3%;">Kecamatan dan Kelurahan</a>
            <hr>




        </div>
      </div>
    </div>



        <div class="col-md-8">



          <?php foreach($kategori as $ro): ?>
                  <h3><b>{{$ro->nama_grup}}</b></h3>

                    <table style="width: 628px; margin-left:10px;" border="1" cellpadding="0">
                    <tbody>
                    <tr style="background-color:#ccc;">
                    <td width="199">
                    <p align="center"><b>NAMA</b></p>
                    </td>
                    <td width="234">
                    <p align="center"><b>ALAMAT RUMAH</b></p>
                    </td>
                    <td width="186">
                    <p align="center"><b>ALAMAT KANTOR</b></p>
                    </td>
                    </tr>
                    <?php foreach($list as $row): ?>
                      @if($row->grup_muspida_id == $ro->id)
                    <tr>
                    <td width="199"><b>{{$row->nama}}</b></td>
                    <td width="234">{{$row->alamat_rumah}}</td>
                    <td width="186">{{$row->alamat_kantor}}</td>
                    </tr>
                      @endif
                    <?php endforeach ?>

                    </tbody>
                    </table>


            <?php endforeach ?>


        </div>




  </div>
</div>


<!-- Creates the bootstrap modal where the image will appear -->

@endsection

@section('script')

@endsection
