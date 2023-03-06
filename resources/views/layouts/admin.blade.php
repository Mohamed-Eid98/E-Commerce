<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="admin/css/nucleo-icons.css" rel="stylesheet" />
  <link href="admin/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Styles -->


    <link href="{{ asset('admin/css/material-dashboard.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">




</head>
<body  class="g-sidenav-show  bg-gray-200">
  
    @include('layouts.inc.sidebar')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('layouts.inc.adminNav')
    @yield('content')

    
</main>

    @include('layouts.inc.adminFooter')





    
    
    <!-- Scripts -->

 {{-- js core --}}


    <script src="{{ asset('admin/js/core/popper.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (Session('status'))
        <script>
            swal("{{ Session('status') }}");
        </script>
        
    @endif
    @yield('scripts')


</body>
</html>
