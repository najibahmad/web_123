<!--footer-->
<hr>
<footer class="footer1">
<div class="container">

<div class="row"><!-- row -->

                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->

                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->

                                <h1 class="title-widget">Pemerintahan</h1>

                                <ul>
                                  <a href="{{ url('muspidapublic') }}"><li><i class="fa fa-angle-double-right"></i> Muspida</li></a>
                                  <a href="{{ url('eksekutifpublic') }}"><li><i class="fa fa-angle-double-right"></i> Eksekutif</li></a>

                                  <a href="{{ url('pemerintahan/1') }}"><li><i class="fa fa-angle-double-right"></i> Dinas</li></a>
                                  <a href="{{ url('pemerintahan/2') }}"><li><i class="fa fa-angle-double-right"></i> Badan dan Kantor</li></a>
                                  <a href="{{ url('pemerintahan/3') }}"><li><i class="fa fa-angle-double-right"></i> Bagian</li></a>
                                  <a href="#!"><li><i class="fa fa-angle-double-right"></i> Kecamatan dan Kelurahan</li></a>
                                </ul>

							</li>

                        </ul>
                        <div style="height:10px;"></div>

                        <ul class="list-unstyled clear-margins"><!-- widgets -->

                                	<li class="widget-container widget_nav_menu"><!-- widgets list -->

                                        <h1 class="title-widget">Potensi Daerah</h1>

                                        <ul>
                                          <?php foreach($potensi as $row): ?>

                                            <a href="{{ url('static/'.$row->id.'/'.$row->title) }}"><li><i class="fa fa-angle-double-right"></i> {{$row->title}}</li></a>
                                            <?php endforeach ?>

                                        </ul>

        							</li>

                                </ul>


                </div><!-- widgets column left end -->



                <div class="col-lg-3 col-md-3"><!-- widgets column left -->

                <ul class="list-unstyled clear-margins"><!-- widgets -->

                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->

                                <h1 class="title-widget">Fasilitas Daerah</h1>

                                <ul>
                                  <?php foreach($fasilitas_daerah as $row): ?>

                                    <a href="{{ url('static/'.$row->id.'/'.$row->title) }}"><li><i class="fa fa-angle-double-right"></i> {{$row->title}}</li></a>
                                    <?php endforeach ?>


                                </ul>

							</li>

                        </ul>


                </div><!-- widgets column left end -->



                <div class="col-lg-3 col-md-3"><!-- widgets column left -->

                <ul class="list-unstyled clear-margins"><!-- widgets -->

                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->

                                <h1 class="title-widget">Potensi Daerah</h1>

                                <ul>
                                  <?php foreach($potensi as $row): ?>

                                    <a href="{{ url('static/'.$row->id.'/'.$row->title) }}"><li><i class="fa fa-angle-double-right"></i> {{$row->title}}</li></a>
                                    <?php endforeach ?>

                                </ul>

							</li>

                        </ul>


                          <div style="height:10px;"></div>
                                <ul class="list-unstyled clear-margins"><!-- widgets -->

                                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->

                                                <h1 class="title-widget">Dokumen Daerah</h1>

                                                <ul>
                                                  <?php foreach($kategori_list as $row): ?>

                                                    <a href="{{ url('dokumenlist/'.$row->id) }}"><li><i class="fa fa-angle-double-right"></i> {{$row->nama}}</li></a>
                                                    <?php endforeach ?>


                                                </ul>

                							</li>

                                        </ul>


                </div><!-- widgets column left end -->


                <div class="col-lg-3 col-md-3"><!-- widgets column center -->

                  <div style="height:10px;"></div>

                  <ul class="list-unstyled clear-margins"><!-- widgets -->

                            <li class="widget-container widget_nav_menu"><!-- widgets list -->

                                  <h1 class="title-widget">Aplikasi Daerah</h1>

                                  <ul>
                                    <?php foreach($aplikasi as $row): ?>

                                      <a href="http://{{ $row->link }}" target="_blank"><li><i class="fa fa-angle-double-right"></i> {{$row->nama}}</li></a>
                                      <?php endforeach ?>

                                  </ul>

                </li>

                          </ul>

                          <div style="height:30px;"></div>



                        <ul class="list-unstyled clear-margins"><!-- widgets -->

                        	<li class="widget-container widget_recent_news"><!-- widgets list -->

                                <h1 class="title-widget">Contact Detail </h1>

                                <div class="footerp">

                                <h2 class="title-median">Sekretariat Daerah Kota Lubuklinggau</h2>
                                <p><b>Email:</b> setda@lubuklinggaukota.go.id, organisasi@lubuklinggaukota.go.id</p>
                                <p><b>Telepon:</b>

    <b style="color:#ffc106;">(8AM to 10PM):</b>  (+62733) 322 800 , (+62733) 325 666 , (+62733) 322 586  </p>
    <p><b>Fax:</b> (+62733) 324 650</p>
    <p><b>Web:</b> http://www.lubuklinggaukota.go.id </p>


                                </div>

                                <div class="social-icons">

                                	<ul class="nomargin">

                <a href="https://www.facebook.com/lubuklinggau.kota"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
	            <a href="https://twitter.com"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
	            <a href="https://plus.google.com"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
	            <a href="mailto:setda@lubuklinggaukota.go.id"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>

                                    </ul>
                                </div>
                    		</li>
                          </ul>
                       </div>
                </div>
</div>
</footer>
<!--header-->

<div class="footer-bottom">

	<div class="container">

		<div class="row">

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-border">

				<div class="copyright">

					© 2017, Kota Lubuklinggau

				</div>

			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-border">

				<div class="design">

					 SEKRETARIAT DAERAH KOTA LUBUKLINGGAU

				</div>

			</div>

		</div>

	</div>

</div>
