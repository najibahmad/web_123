<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lubuklinggau</title>
    <link rel="stylesheet" href="{{ asset('umum/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('umum/css/styleindex.css')  }} ">
    <link rel="stylesheet" href="{{ asset('umum/css/animate.min.css')  }} ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


<style>
#vidcontent {
width:100%;
height:450px;
border:2px solid #F00;
object-fit:cover; /* for those who do support it */
}

#myCarousel .nav a small {
    display:block;
}
#myCarousel .nav {
	background:#eee;
}
#myCarousel .nav a {
    border-radius:0px;
}
</style>
  </head>
  <body>

  <!--Bagian Navbar atau Menu --->
  <div id="navbar-awal">
    <nav class="navbar navbar-default">
      <center><img src="{{ asset('umum/images/logo-2.png') }}" class="img-responsive" alt=""></center>
    </nav>
  </div>

  <!--Bagian Slider video dan foto --->



    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!-- Wrapper for slides -->
      <div class="carousel-inner">

        <div class="item active">
          <video id="vidcontent" width="900" height="400" autoplay loop muted>
        <source src="{{ asset('umum/video/Intro.mp4') }}" type="video/mp4">
    </video>
           <div class="carousel-caption">
            <h3>Headline</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. <a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>
          </div>
        </div><!-- End Item -->

         <div class="item">
           <img src="{{ asset('umum/images/wisata.jpg') }}">
           <div class="carousel-caption">
            <h3>Headline</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. <a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>
          </div>
        </div><!-- End Item -->

        <div class="item">
          <img src="{{ asset('umum/images/wisata.jpg') }}">
           <div class="carousel-caption">
            <h3>Headline</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. <a href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank" class="label label-danger">Bootstrap 3 - Carousel Collection</a></p>
          </div>
        </div><!-- End Item -->

        <div class="item">
          <img src="{{ asset('umum/images/wisata.jpg') }}">
           <div class="carousel-caption">
            <h3>Headline</h3>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
          </div>
        </div><!-- End Item -->

      </div><!-- End Carousel Inner -->


    	<ul class="nav nav-pills nav-justified">
          <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">Intro<small>Kota Lubuklinggau</small></a></li>
          <li data-target="#myCarousel" data-slide-to="1"><a href="#">Wisata<small>Kota Lubuklinggau</small></a></li>
          <li data-target="#myCarousel" data-slide-to="2"><a href="#">Penghargaan<small>Kota Lubuklinggau</small></a></li>
          <li data-target="#myCarousel" data-slide-to="3"><a href="#">Alam<small>Kota Lubuklinggau</small></a></li>
        </ul>


    </div><!-- End Carousel -->


  <!--Bagian Menu-Menu --->
  <div id="menu-awal">
    <div class="container">
      <div class="col-md-4">
        <a href="#!">
          <div class="panel panel-default" data-toggle="modal" data-target="#menu-1">
            <center><i class="material-icons">location_on</i></center>
            <hr>
            <h3 class="text-center">Sekilas Lubuklinggau</h3>
          </div>
        </a>
          <div class="modal fade" id="menu-1" tabindex="-1" role="dialog" aria-labelledby="menu-1">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="menu-1">Sekilas Lubuklinggau</h4>
                </div>
                <div class="modal-body">
                  <ul>
                    <?php foreach($sekilas_lb as $row): ?>

                      <a href="{{ url('static/'.$row->id.'/'.$row->title) }}"><li>{{$row->title}}</li></a>
                      <?php endforeach ?>

                  </ul>

                  <div class="icon-modal">
                    <i class="material-icons" style="padding-left: 80%;">location_on</i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <a href="#!">
          <div class="panel panel-default" data-toggle="modal" data-target="#menu-2">
            <center><i class="material-icons">account_balance</i></center>
            <hr>
            <h3 class="text-center">Pajak & Retrisbusi</h3>
          </div>
        </a>

        <div class="modal fade" id="menu-2" tabindex="-1" role="dialog" aria-labelledby="menu-2">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="menu-2">Pajak & Retrisbusi</h4>
              </div>
              <div class="modal-body">
                <ul>
                  <?php foreach($pajak as $row): ?>

                    <a href="{{ url('static/'.$row->id.'/'.$row->title) }}"><li>{{$row->title}}</li></a>
                    <?php endforeach ?>
                </ul>

                <div class="icon-modal">
                  <i class="material-icons">account_balance</i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a href="#!">
          <div class="panel panel-default" data-toggle="modal" data-target="#menu-3">
            <center><i class="material-icons">people</i></center>
            <hr>
            <h3 class="text-center">Pelayanan Publik</h3>
          </div>
        </a>

        <div class="modal fade" id="menu-3" tabindex="-1" role="dialog" aria-labelledby="menu-3">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="menu-3">Pelayanan Publik</h4>
              </div>
              <div class="modal-body">
                <ul>
                  <?php foreach($layanan as $row): ?>

                    <a href="{{ url('static/'.$row->id.'/'.$row->title) }}"><li>{{$row->title}}</li></a>
                    <?php endforeach ?>
                </ul>

                <div class="icon-modal">
                  <i class="material-icons" style="padding-left: 50%;">people</i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <a href="#!">
          <div class="panel panel-default" data-toggle="modal" data-target="#menu-4">
            <center><i class="material-icons">gavel</i></center>
            <hr>
            <h3 class="text-center">Pemerintahan</h3>
          </div>
        </a>

        <div class="modal fade" id="menu-4" tabindex="-1" role="dialog" aria-labelledby="menu-4">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="menu-4">Pemerintahan</h4>
              </div>
              <div class="modal-body">
                <ul>
                  <a href="{{ url('muspidapublic') }}"><li>Muspida</li></a>
                  <a href="{{ url('eksekutifpublic') }}"><li>Eksekutif</li></a>

                  <a href="{{ url('pemerintahan/1') }}"><li>Dinas</li></a>
                  <a href="{{ url('pemerintahan/2') }}"><li>Badan dan Kantor</li></a>
                  <a href="{{ url('pemerintahan/3') }}"><li>Bagian</li></a>
                  <a href="#!"><li>Kecamatan dan Kelurahan</li></a>
                </ul>

                <div class="icon-modal">
                  <i class="material-icons" style="padding-left: 50%;">gavel</i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a href="#!">
          <div class="panel panel-default" data-toggle="modal" data-target="#menu-5">
            <center><i class="material-icons">book</i></center>
            <hr>
            <h3 class="text-center">Dokumen Daerah</h3>
          </div>
        </a>

        <div class="modal fade" id="menu-5" tabindex="-1" role="dialog" aria-labelledby="menu-5">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="menu-5">Dokumen Daerah</h4>
              </div>
              <div class="modal-body">
                <ul>
                  <?php foreach($kategori_list as $row): ?>

                    <a href="{{ url('dokumenlist/'.$row->id) }}"><li>{{$row->nama}}</li></a>
                    <?php endforeach ?>
                </ul>

                <div class="icon-modal">
                  <i class="material-icons" style="padding-left: 50%;">book</i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a href="#!">
          <div class="panel panel-default" data-toggle="modal" data-target="#menu-6">
            <center><i class="material-icons">wb_incandescent</i></center>
            <hr>
            <h3 class="text-center">Potensi Daerah</h3>
          </div>
        </a>

        <div class="modal fade" id="menu-6" tabindex="-1" role="dialog" aria-labelledby="menu-6">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="menu-6">Potensi Daerah</h4>
              </div>
              <div class="modal-body">
                <ul>
                  <?php foreach($potensi as $row): ?>

                    <a href="{{ url('static/'.$row->id.'/'.$row->title) }}"><li>{{$row->title}}</li></a>
                    <?php endforeach ?>
                </ul>

                <div class="icon-modal">
                  <i class="material-icons" style="padding-left: 100%;">wb_incandescent</i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <a href="#!">
          <div class="panel panel-default" data-toggle="modal" data-target="#menu-7">
            <center><i class="material-icons">extension</i></center>
            <hr>
            <h3 class="text-center">Fasilitas Daerah</h3>
          </div>
        </a>

        <div class="modal fade" id="menu-7" tabindex="-1" role="dialog" aria-labelledby="menu-7">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="menu-7">Fasilitas Daerah</h4>
              </div>
              <div class="modal-body">
                <ul>
                  <?php foreach($fasilitas_daerah as $row): ?>

                    <a href="{{ url('static/'.$row->id.'/'.$row->title) }}"><li>{{$row->title}}</li></a>
                    <?php endforeach ?>
                </ul>

                <div class="icon-modal">
                  <i class="material-icons" style="padding-left: 50%;">extension</i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a href="#!">
          <div class="panel panel-default" data-toggle="modal" data-target="#menu-8">
            <center><i class="material-icons">computer</i></center>
            <hr>
            <h3 class="text-center">Aplikasi Daerah</h3>
          </div>
        </a>

        <div class="modal fade" id="menu-8" tabindex="-1" role="dialog" aria-labelledby="menu-8">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="menu-8">Aplikasi Daerah</h4>
              </div>
              <div class="modal-body">
                <ul>
                  <?php foreach($aplikasi as $row): ?>

                    <a href="http://{{ $row->link }}" target="_blank"><li>{{$row->nama}}</li></a>
                    <?php endforeach ?>
                </ul>

                <div class="icon-modal">
                  <i class="material-icons" style="padding-left: 50%;">computer</i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a href="#!">
          <div class="panel panel-default" data-toggle="modal" data-target="#menu-9">
            <center><i class="material-icons">language</i></center>
            <hr>
            <h3 class="text-center">Jaringan Informasi</h3>
          </div>
        </a>

        <div class="modal fade" id="menu-9" tabindex="-1" role="dialog" aria-labelledby="menu-9">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="menu-9">Aplikasi Daerah</h4>
              </div>
              <div class="modal-body">
                <ul>
                  <?php foreach($sosial as $row): ?>

                    <a href="http://{{ $row->link }}" target="_blank"><li>{{$row->nama}}</li></a>
                    <?php endforeach ?>
                </ul>

                <div class="icon-modal">
                  <i class="material-icons" style="padding-left: 50%;">computer</i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tombol">
        <center><a href="{{ url('beranda') }}" class="btn btn-default"><span style="opacity: 0.7;">Beranda > </span></a></center>
      </div>
    </div>
  </div>

  <br><br>

  <div class="footer-bottom">

  	<div class="container">

  		<div class="row">

  			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

  				<div class="copyright">

  					© 2015, Webenlance, All rights reserved

  				</div>

  			</div>

  			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

  				<div class="design">

  					 <a href="#">Franchisee </a> |  <a target="_blank" href="http://www.webenlance.com">Web Design & Development by Webenlance</a>

  				</div>

  			</div>

  		</div>

  	</div>

  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="{{ asset('umum/js/bootstrap.min.js') }} "></script>
  <script>
  $(document).ready( function() {
    $('#myCarousel').carousel({
		interval:   24000
	});

	var clickEvent = false;
	$('#myCarousel').on('click', '.nav a', function() {
			clickEvent = true;
			$('.nav li').removeClass('active');
			$(this).parent().addClass('active');
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.nav').children().length -1;
			var current = $('.nav li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.nav li').first().addClass('active');
			}
		}
		clickEvent = false;
	});
});
  </script>

  </body>
</html>
