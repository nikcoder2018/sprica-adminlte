<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/plugins/fontawesome/css/all.min.css')}}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/css/adminlte.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    @yield('css-plugins')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
    <style>
        .card-title{
            margin-bottom: 0 !important;
        }
    </style>
</head>
<body class="hold-transition layout-navbar-fixed layout-top-nav">
    <div id="app" class="wrapper">
        @if(Auth::user()->hasRole('admin'))
            @include('components.admin-navbar');
        @else 
            @include('components.staff-navbar');
        @endif
        <main class="py-4">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/zsweet.all.min.js')}}"></script>
    <script src="{{asset('js/adminlte.min.js')}}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        });
    </script>
    @yield('js')
</body>
</html>
