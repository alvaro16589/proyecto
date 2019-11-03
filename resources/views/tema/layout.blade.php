
<!DOCTYPE html>
<html lang="es">
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
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/adminlte.min.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
          <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    </head>
    <body class="hold-transition sidebar-mini layout-boxed" style="background-color: lightgrey;">
        <!-- Content Wrapper. Contains page content -->
        
        <div class="wrapper">
            @include('tema/aside')
            @include('tema/header')
            <div class="content-wrapper">
                <section class="content">
                   @include('welcome')
                  
                </section>
            </div>
            
        
                <!-- Control Sidebar -->
                
            <!-- /.control-sidebar 
            <aside class="control-sidebar control-sidebar-dark">
            
            </aside>-->
        
        </div>
        <!-- ./wrapper -->
            @include("tema/footer")
        <!-- jQuery -->
        <script src="{{asset('asset/adminlte/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('asset/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('asset/adminlte/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('asset/adminlte/dist/js/demo.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('asset/adminlte/dist/js/demo.js')}}"></script>
        <script>
                $(function () {
                  //Initialize Select2 Elements
                  $('.select2bs4').select2({
                    theme: 'bootstrap4'
                  })
              
                  //Initialize Select2 Elements
                  $('.select2').select2()
                  });
        </script>
    </body>
</html>
