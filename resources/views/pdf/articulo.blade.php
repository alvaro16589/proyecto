<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{$namepage}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style >
            .circulo{
                width: 50px; 
                height: 50px;
                border-radius:25px;
                border-style: outset;
                border: 2px;
                border-color: gray;
                
            }
            .cabecera{
                
                border-radius: 1em; 
                background-color: cornflowerblue; 
                color: aliceblue;
                
                
            }
            .espacios{
                padding: 0.5em;
            }
            .detalles{
                font-size: 6pt;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                padding-left: 3.5em;
                
            }
        </style>
    
    </head>
    <body  >
        {!!DNS2D::getBarcodeHTML("http://127.0.0.1:8000/reporteart","QRCODE",2,2)!!}
        <h1 style="display: block; 
                    justify-content: 
                    center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    padding-left: 6em;
                    text-decoration: underline;">
            <b>Reporte de Artículos</b>
        </h1>
        <p >
            <h5 class="detalles">Observaciones  : {{ $coment ?? ''}}</h5> 
            <h5 class="detalles">Autor : {{auth()->user()->name}} <br> Fecha de realización : {{ now()->format('d/m/Y')}}</h5>
           
        </p>
        <table style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; 
                        font-size: 9pt;
                        padding-left: 4em;">
            <thead class="cabecera"> 
                <tr style="">
                    <th>Nº</th>
                    <th style="padding: 1em; ">Nº</th>
                    <th style="padding: 1em; ">Estado</th>
                    <th style="padding: 1em; ">Nombre</th>
                    <th style="padding: 1em; ">Imagen</th>
                    <th style="padding: 1em; ">Cantidad</th>
                    <th style="padding: 1em; ">Precio (Bs.)</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($articulos as $articulo)
                    <tr >
                        <td class="espacios" >{{ $loop->iteration }}</td>
                        <td class="espacios" >{{ $articulo->estado }}</td>
                        <td class="espacios" >{{ $articulo->nombre }}</td>
                        <td class="espacios" >
                            <img class="circulo" src=".asset/img/articulos/{{$articulo->imagen}}" alt="user image" >
                        </td>
                        <td class="espacios" >{{ $articulo->stok }}</td>
                        <td class="espacios" >{{ $articulo->precio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      
    </body>
</html>
