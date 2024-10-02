<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="d-flex flex-column h-100">

    @include('layouts.header')

    <!-- Begin page content -->
    <main class="flex-shrink-0 py-5">
        @yield('content')
    </main>

    @include('layouts.footer')

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>


  </body>
</html>
