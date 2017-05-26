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


<div class="container" style="margin-top:20px;">
<div class="row">
<div class="col-md-8">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php
  $i=0;
  foreach($list as $row): ?>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
             <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#{{$i}}" aria-expanded="true" aria-controls="collapseOne">
          {{$row->nama}}
        </a>
      </h4>

        </div>
        <div id="{{$i}}" class="panel-collapse collapse {!! $i==0 ? 'in' : '' !!}" role="tabpanel" aria-labelledby="headingOne">
          <div align="justify">

        <table style="height: 154px;margin-left:20px; margin-bottom:20px;" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
        <tr style="height: 48px;">
        <td style="height: 48px;" width="59"><strong>Pimpinan</strong></td>
        <td style="height: 48px;" width="12">
        <div align="center"><strong>:</strong></div>
        </td>
        <td style="height: 48px;" width="262"><strong>{{$row->pimpinan}}</strong></td>
        </tr>

        <tr style="height: 48px;">
        <td style="height: 48px;"><strong>Jabatan</strong></td>
        <td style="height: 48px;">
        <div align="center"><strong>:</strong></div>
        </td>
        <td style="height: 48px;"><strong>{{$row->jabatan}}</strong></td>
        </tr>
        <tr style="height: 48px;">
        <td style="height: 48px;"><strong>Alamat </strong></td>
        <td style="height: 48px;">
        <div align="center"><strong>:</strong></div>
        </td>
        <td style="height: 48px;"><strong>{{$row->alamat}}</strong></td>
        </tr>
        <tr style="height: 24px;">
        <td style="height: 24px;"><strong>Telp.</strong></td>
        <td style="height: 24px;">
        <div align="center"><strong>:</strong></div>
        </td>
        <td style="height: 24px;"><strong>{{$row->tlp}}<br />
        </strong></td>
        </tr>
        <tr style="height: 24px;">
        <td style="height: 24px;" width="59"><strong>Website</strong></td>
        <td style="height: 24px;" width="12">
        <div align="center"><strong>:</strong></div>
        </td>
        <td style="height: 24px;" width="262"><a href="http://{{$row->website}}"> <strong>{{$row->website}}</strong></a></td>
        </tr>
        <tr style="height: 24px;">
        <td style="height: 24px;"><strong>E-mail </strong></td>
        <td style="height: 24px;">
        <div align="center"><strong>:</strong></div>
        </td>
        <td style="height: 24px;"><strong>{{$row->email}}</strong></td>
        </tr>
        </tbody>
        </table>

          <div class="row" style="padding-right:15px; padding-left:15px">
          <div class="col-md-12">
        <?php echo $row->post; ?>
      </div></div>




      </div>

        </div>



    </div>

    <?php
    $i++;
    endforeach ?>






</div>
</div>
</div>
</div>



  </div>
</div>


<!-- Creates the bootstrap modal where the image will appear -->

@endsection

@section('script')

@endsection
