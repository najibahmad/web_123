<ul class="nav navbar-nav">
  <li class="active"><a href="{{ url('beranda') }}"><b>BERANDA</b></a></li>

  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <strong>SEKILAS LUBUKLINGGAU</strong> <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <?php foreach($sekilas_lb as $row): ?>

        <li><a href="{{ url('static/'.$row->id.'/'.$row->title) }}">{{$row->title}}</a></li>
        <?php endforeach ?>
    </ul>
  </li>
  <li class="active"><a href="{{ url('beritapublic/all') }}"><b>BERITA</b></a></li>
  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <strong>LAYANAN PUBLIK</strong> <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <?php foreach($layanan as $row): ?>

        <li><a href="{{ url('static/'.$row->id.'/'.$row->title) }}">{{$row->title}}</a></li>
        <?php endforeach ?>

    </ul>
  </li>



</ul>
