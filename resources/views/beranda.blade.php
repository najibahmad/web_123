<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lubuklinggau</title>

    <link rel="stylesheet" href="{{ asset('umum/css/bootstrap.min.css') }} ">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('umum/css/style-2.css')  }} ">
    <link rel="stylesheet" href="{{ asset('umum/css/animate.min.css')  }} ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>
    <div id="header-nav">
      <div class="container container2">
          <div class="jumbotron">
              <img src="{{ asset('umum/images/logo-3.png') }}" alt="">

              @include('nav')
          </div>
      </div>
    </div>

      <div id="header">
        <div class="jumbotron">

          <h1>LUBUKLINGGAU</h1>
          <p>BISA!</p>

        </div>
      </div>



      <div id="content-4">
        <div class="row">
          <div class="container">
            <div class="col-md-6">
              <h3 class="text-uppercase"><b>Berita Terbaru</b></h3>
              <hr>
              <div class="row" style="margin-bottom: 5%;">
                <div id="berita-heading">


                  <?php

                  foreach($post as $row): ?>
                  <?php
                  $doc=new DOMDocument();
                  libxml_use_internal_errors(true);
                  $doc->loadHTML($row->content);
                  $xml=simplexml_import_dom($doc); // just to make xpath more simple
                  $images=$xml->xpath('//img');
                  //echo count($images);
                  ?>

                    <div class="col-md-6">
                      @if(count($images) > 0)
                          <img src="{{$images[0]['src']}}" alt="{{$images[0]['alt']}}" class="img-responsive">
                      @else
                          <img src="{{asset('images/img_not_available.png')}}" alt="No Image Available" class="img-responsive">
                      @endif
                      <a href="{{ url('detilberita/'.$row->id.'/'.$row->title) }}"><h5>{{$row->title}}</h5></a>
                      <p>
                        <?php echo substr(strip_tags($row->content),0,110) . "..."; ?>
                      </p>
                      <a href="{{ url('detilberita/'.$row->id.'/'.$row->title) }}" class="label label-default">Selengkapnya...</a>
                    </div>
                    <?php

                    endforeach ?>
                </div>

              </div>
              <h4 class="text-uppercase"><b>Berita Lain</b></h4>
              <hr style="margin-top: 0px; border-top: 3px solid #eee;">
              <?php foreach($post2 as $row): ?>

                <a href="{{ url('detilberita/'.$row->id.'/'.$row->title) }}"><h4>{{$row->title}}</h4></a>
                <blockquote>
                  <p><?php echo substr(strip_tags($row->content),0,110) . "..."; ?></p>
                  <footer>Kamis, 17 Juni 2017</footer>
                </blockquote>
                <?php endforeach ?>



            </div>

            <div class="col-md-1" style="margin-right:-30px;">
            </div>
            <div class="col-md-5">
              <hr>

              <div class="row">
                  <div class="col-md-12" style="margin-left: 15px; ">
                  	<div class="metro-tile-container">



              			<div class="metro-tile metro-tile-lg">
              				<div class="metro-tile-page active metro-tile-page-danger">
              					<h4>Agenda</h4>
              					<span class="glyphicon glyphicon-bullhorn"></span>
              				</div>
              				<div class="metro-tile-page metro-tile-page-success">
              					<p>Agenda</p>
              					<p>Pemerintah Lubuklinggau</p>
              				</div>
              			</div>


              		</div>
                  </div>
              </div>


              <div class="container">
  <div class="row">
  <div class="[ col-xs-12 col-sm-5 ]">
    <ul class="event-list">

      <?php foreach($agenda as $row): ?>

        <li>
          <time datetime="">
            <span class="day">{{date_format($row->tanggal, 'd')}}</span>
            <span class="month">{{date_format($row->tanggal, 'M')}}</span>

          </time>
          <div class="info">
            <h2 class="title">{{$row->title}}</h2>
            <p class="desc">{{$row->content}}</p>
          </div>
        </li>
        <?php

        endforeach ?>





    </ul>
  </div>
</div>
</div>

<div class="row">
    <div class="col-md-12" style="margin-left: 15px; ">
    	<div class="metro-tile-container">
        <a href="{{ url('eksekutifpublic') }}">
			<div class="metro-tile metro-tile-md" style="background-color">
				<div class="metro-tile-page active metro-tile-page-info" style="background-color: #60b733;">
          <h4>Pemerintahan</h4>
					<img src="https://pbs.twimg.com/profile_images/522909800191901697/FHCGSQg0.png" alt="MetroTiles" />
				</div>
				<div class="metro-tile-page metro-tile-page-primary">
					<p>Melayani Masyarakat</p>
				</div>
			</div>
      </a>

      <a href="{{ url('dokumenlist/6') }}">
    <div class="metro-tile metro-tile-md">
      <div class="metro-tile-page active metro-tile-page-info">
        <h4>Dokumen</h4>

      </div>
      <div class="metro-tile-page metro-tile-page-primary">
        <p>Dokumen Pemerintah</p>
      </div>
    </div>
    </a>
			


		</div>
    </div>
</div>




            </div>
          </div>
        </div>
      </div>

      <div id"content-3">
        <div class="container">
          <h2 class="text-center text-uppercase"><b>Peta Lubuklinggau</b></h2>
          <hr>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d151585.09479853287!2d102.82755275690418!3d-3.2617043496197717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e30e3d792264a93%3A0xf3b774bc72930511!2sLubuklinggau+City%2C+South+Sumatra!5e0!3m2!1sen!2sid!4v1494724189759" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>






      @include('layouts.footer')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('umum/js/bootstrap.min.js') }} "></script>
    <script>
    $(window).resize(function () {

            $.each($('.metro-tile-page:not(.active)'), function () {
                $(this).css('right', ($(this).width() + 30) * -1);
            });
        });
        $(document).ready(function () {
            $.each($(".metro-tile-page"), function (index, tile) {
                $.each($(tile).children('img'), function (ind, img) {
                    $(tile).css('background-image', 'url(' + $(img).attr('src') + ')');
                    $(img).hide();
                });
            });
            $.each($('.metro-tile-page:not(.active)'), function () {
                $(this).css('right', ($(this).width() + 30) * -1);
            });

            $('.metro-tile').hover(function () {
                $(this).children('.active').clearQueue();
                $(this).children(':not(.active)').clearQueue();

                $(this).children('.active').animate({ 'right': $(this).width() + 30 }, 500, 'swing');
                $(this).children(':not(.active)').animate({ 'right': '5px' }, 500, 'swing');
            }, function () {

                $(this).children('.active').clearQueue();
                $(this).children(':not(.active)').clearQueue();

                $(this).children(':not(.active)').animate({ 'right': ($(this).width() + 10) * -1 }, 500, 'swing');
                $(this).children('.active').animate({ 'right': '5px' }, 500, 'swing');
            });
        });
    </script>
    </body>
  </html>
