
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inicio') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/adminlte.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-boxed" style="background-color: lightgrey;">
    <div id="app"  class="wrapper">
        @include('tema.header')
        @include('tema.aside')
        <main class="py-4">
            @yield('content')

        </main>
    </div>
        @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Aplicación</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        @include('welcome')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
    <!-- jQuery -->
    <script src="{{asset('asset/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('asset/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('asset/adminlte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('asset/adminlte/dist/js/demo.js')}}"></script>
</body>
</html>


