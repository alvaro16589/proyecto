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
        <h1 style="display: block; 
                    justify-content: 
                    center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    padding-left: 6em;
                    text-decoration: underline;">
            <b>Reporte de Usuarios</b>
        </h1>
        <p >
            <h5 class="detalles">Observaciones:{{ $coment ?? ''}}</h5> 
            <h5 class="detalles">Autor : {{auth()->user()->name}} <br> Fecha de realización : {{ now()->format('d/m/Y')}}</h5>
           
        </p>
        <table style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; 
                        font-size: 9pt;
                        padding-left: 4em;">
            <thead class="cabecera"> 
                <tr style="">
                    <th style="padding: 1em; ">ID</th>
                    <th style="padding: 1em; ">Avatar</th>
                    <th style="padding: 1em;">Nombres</th>
                    <th style="padding: 1em; ">Estado</th>
                    <th style="padding: 1em; ">E mail</th>
                    <th style="padding: 1em; ">tipo</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($usuarios as $usuario)
                <tr >
                    <td class="espacios" >{{$usuario->id}}</td>
                    <td class="espacios">
                        <img  class="circulo" src="./asset/img/userprofile/{{$usuario->foto}}"  alt="user image">
                    </td>
                    <td class="espacios">{{$usuario->name}}</td>
                    
                    <td class="espacios">
                        {{$usuario->estado}}
                    </td>
                    <td class="espacios">
                        {{ $usuario->email }}
                    </td>
                    <td class="espacios" >{{ $usuario->tipo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
      
    </body>
</html>
