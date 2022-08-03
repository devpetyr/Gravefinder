<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
     @include('layouts.links')
      @yield('css')
      <link rel="icon" type="image/x-icon" href="{{asset('assets/images/favicon-image.png')}}">
    <title>{{isset($title)?$title:'Grave Finder At St Stans'}}</title>
  </head>

  <body>
    <!-- BEGIN Header -->
   @include('layouts.header')
    <!-- END Header -->
    <!-- main -->
    @yield('content')
    <!-- end main -->
    <!-- BEGIN Footer Section -->
    @include('layouts.footer')
    <!-- END Footer Section -->
    @include('layouts.scripts')
  </body>
   @yield('js')
</html>

