
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{$namepage}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
         <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
       <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        
        
         <!-- Tell the browser to be responsive to screen width -->
         <meta name="viewport" content="width=device-width, initial-scale=1">
               <!-- Theme style -->
         <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/adminlte.min.css')}}">
         <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/adminlte.css')}}">

       
         
         <!-- Google Font: Source Sans Pro -->
         <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini layout-boxed" style="background-color: lightgrey;">
        <!-- Content Wrapper. Contains page content -->
        
        <div class="wrapper">
          
            <div class="content-wrapper">
                <section class="content">
                   @yield('contenido')
                  
                </section>
            </div>
            
        
                <!-- Control Sidebar -->
                
           
        
        </div>
        
        
        
           
           
    </body>
</html>
