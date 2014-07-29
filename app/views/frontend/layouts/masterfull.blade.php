<!DOCTYPE html>
<html lang="en" class="full">
  <head>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
      @section('title')
      DudeDB
      @show
    </title>

    @include ('frontend.includes.header')

    @section ('meta')
    @show

    @section ('head-script')
    @show

<!-- fav icon -->
  </head>

  <body>


  <!-- Content  -->
  @yield('content')

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
  <script src="{{ asset('assets/vendor/jquery.infinitescroll.js') }}"></script>
  
  <script src="{{ asset('assets/js/app.js') }}"></script>

  @section('footer-script')
  @show

  </body>
</html>