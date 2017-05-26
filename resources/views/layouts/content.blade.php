<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lubuklinggau</title>
    <link rel="stylesheet" href="{{ asset('umum/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('umum/css/style-5.css')  }} ">
    <link rel="stylesheet" href="{{ asset('umum/css/animate.min.css')  }} ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/ea51bc5393.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      @yield('css')
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

    <div id="header-profile">
      <div class="jumbotron">
        @if(isset($category))
        <h1 class="text-center text-uppercase"><b>{{$category->nama}}</b></h1>
        @endif
      </div>
    </div>



    @yield('content')

  @include('layouts.footer')

    @yield('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('umum/js/bootstrap.min.js') }} "></script>
  </body>
</html>
