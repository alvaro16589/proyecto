
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
        <!--switch-->
        <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.js')}}">
        <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/adminlte.min.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini layout-boxed" style="background-color: lightgrey;">
        <!-- Content Wrapper. Contains page content -->
        
        <div class="wrapper">
            @include('tema/aside')
            @include('tema/header')
            <div class="content-wrapper">
                <section class="content">
                        
                        
                   @include('proveedor/crearprove')
                  
                </section>
            </div>
            
        
                <!-- Control Sidebar -->
                
            <!-- /.control-sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            
            </aside>
        
        </div>
        <!-- ./wrapper -->
            @include('tema/message')
            @include("tema/footer")
        <!-- jQuery -->
        <script src="{{asset('asset/adminlte/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('asset/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('asset/adminlte/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('asset/adminlte/dist/js/demo.js')}}"></script>
        <!-- InputMask -->
        <script src="{{asset('asset/adminlte/plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('asset/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
        <!-- Bootstrap Switch -->
        <script src="{{asset('asset/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <script src="{{asset('asset/adminlte/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css')}}"></script>
        <!-- Toastr -->
        <script src="{{asset('asset/adminlte/plugins/toastr/toastr.min.js')}}"></script>
        <script>
            //codigo para el toast 
                $(document).ready(function(){
                    $(".toast").toast({delay: 5000});
                    $(".toast").toast("show");
                    
                });
                //codigo mascara para el telefono
                $(":input").inputmask();

                    $("#phone").inputmask({"mask": "99999999"}
                
                );
            
        </script>
        <!--Script para crear el switch-->
        <!--script>
            $(function () {
              
          
              $("input[data-bootstrap-switch]").each(function(){
                if ($('input[data-bootstrap-switch]').is(':checked')){ 
                    //alert('checked'); 
                    $(this).bootstrapSwitch('state', $(this).prop(''));

                } 
                else { 
                    //alert('not checked');
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                }  
                
              });
              
          
            })
        </script-->
    </body>
</html>
