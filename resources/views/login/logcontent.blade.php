<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$namepage}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/adminlte.min.css')}}">
  <!-- rtoast-->
  <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/toastr/toastr.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class=" layout-top-nav" style="background-image: url({{asset('asset/img/background/hd-wallpaper-all-5.jpg')}})">
      @include('tema.header') 
      <div id="app"  class="wrapper">
        <main class="py-4 col w-auto">
          @yield('content')    
        </main>
      </div> 
      @include('tema.message')
<!-- jQuery -->
<script src="{{asset('asset/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('asset/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('asset/adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('asset/adminlte/plugins/toastr/toastr.min.js')}}"></script>
            
<script>
       //codigo para el toast 
           $(document).ready(function(){
               $(".toast").toast({delay: 5000});
               $(".toast").toast("show");
               
           });
</script>

</body>
</html>