<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{$namepage}} Detalle </title>
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
        {!!DNS2D::getBarcodeHTML("http://127.0.0.1:8000/descargar-invoice","QRCODE",2,2)!!}
        <h1 style=" 
                    
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    padding-left: 2em;
                    text-decoration: underline;">
            <b>{{$namepage}}</b>
        </h1>
        <p >
            <h5 class="detalles">Observaciones  : {{ $coment ?? ''}}</h5> 
            <h5 class="detalles">Fecha de realización : {{ now()->format('d/m/Y')}}</h5>
           
        </p>
        <table style="padding-left: 2em;">
           
            <tbody>
                <td style="padding: 10px;">
                    De <br>
                    <strong>{{ $namepage }}</strong><br>
                    777 Avenida los olmos<br>
                    Oruro, Bolivia<br>
                    Teléfono: (591) 77777777<br>
                    Correo: ventax@gmail.com
                </td>
                <td style="padding: 10px;">
                    Para <br>
                    <strong>{{ auth()->user()-> name }}</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Correo: {{ auth()->user()->email }}
                </td>
                <td style="padding: 10px;">
                    <br>
                    <b>Factura:  #{{time()}}</b><br>
                    <br>
                    <b>Orden ID:</b> 4F3S8J<br>
                    <b>Fecha de pago:</b> {{ now()->format('d/m/Y') }}<br>
                    <b>Cuenta :</b> 968-34567
                </td>
            </tbody>
        </table>
        <br>
        <table  style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; 
                        font-size: 9pt;
                        padding-left: 4em;
                        margin:none;">
            <thead class="cabecera"> 
                <tr style="">
                    <th style="padding: 1em; ">Nº</th>
                    <th style="padding: 1em; ">Cant.</th>
                    <th style="padding: 1em; ">ID Prod.</th>
                    <th style="padding: 1em; ">Producto</th>
                    <th style="padding: 1em; ">Descripción</th>
                    <th style="padding: 1em; ">P. U. </th>
                    <th style="padding: 1em; ">Subtotal</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($detalles as $detalle)
                    <tr>
                        <td style="padding-left: 15px;">{{ $loop->iteration}}</td>
                        <td style="padding-left: 25px;">{{ $detalle->cantidad}}</td>
                        <td style="padding-left: 25px;">{{ $detalle->id }}</td>
                        <td>{{ $detalle->nombre }}</td>
                        <td>{{ $detalle->descripcion }}</td>
                        <td>Bs {{ $detalle->precio }}</td>
                        <td>Bs {{ $detalle->cantidad * $detalle->precio }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <table>
            <tbody>
                <tr>
                    <td style="width: 400px;" >
                        <p class="lead">Métodos de pago:</p>
                        
                        <img src="./asset/adminlte/dist/img/credit/visa.png" alt="Visa"> 
                        <img src="./asset/adminlte/dist/img/credit/mastercard.png" alt="Mastercard"> 
                        <img src="./asset/adminlte/dist/img/credit/american-express.png" alt="American Express"> 
                        <img src="./asset/adminlte/dist/img/credit/paypal2.png" alt="Paypal">
    
                    </td>
                    <td >
                        <br>
                        <br>
                        <table style="background: lightgray; margin: none; padding: 50px;">
                            <tr>
                                <th >Subtotal:</th>
                                <td>Bs {{ $subtotal }}</td>
                            </tr>
                            <tr>
                                <th>Impuesto (9.3%)</th>
                                <td >Bs {{$impuesto}}</td>
                            </tr>
                            <tr>
                                <th>Cargos extra:</th>
                                <td>Bs 5.80</td>
                            </tr>
                            <tr>
                                <th >Total:</th>
                                <td >Bs {{$total}}</td>
                            </tr>
                        </table>
                        
                          
                    </td>
                </tr>
            </tbody>
        </table>
       
    </body>
</html>
