<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- TITLE BERISI "ULKP" --}}
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        
     </head>
        
        <body>
          {{-- BERISI KONTEN HALAMAN LOGIN ATAU REGISTER --}}
          @yield('content')
          
        
         
          <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

          @yield('script')
        </body>
</html>
