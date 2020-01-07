@extends('tema.layout')
@section('contenido')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Nota:</h5>
                Esta página ha sido elaborada para impresion. Ha click en el botón imprimir para ver la factura.
                
            </div> 


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                        <i class="fas fa-globe" id="title"></i> {{ $namepage }}
                        <small class="float-right">Fecha: {{ now()->format('d/m/Y')}}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        De
                        <address>
                        <strong>{{ $namepage }}</strong><br>
                        777 Avenida los olmos<br>
                        Oruro, Bolivia<br>
                        Teléfono: (591) 77777777<br>
                        Correo: ventax@gmail.com
                        </address>
                    </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Para
                    <address>
                    <strong>{{ auth()->user()-> name }}</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Correo: {{ auth()->user()->email }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Factura:  #{{time()}}</b><br>
                    <br>
                    <b>Orden ID:</b> 4F3S8J<br>
                    <b>Fecha de pago:</b> {{ now()->format('d/m/Y') }}<br>
                    <b>Cuenta :</b> 968-34567
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cant.</th>
                            <th>ID Prod.</th>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Precio U.</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $detalle)
                            <tr>
                                <td>{{ $detalle->cantidad}}</td>
                                <td>{{ $detalle->id }}</td>
                                <td>{{ $detalle->nombre }}</td>
                                <td>{{ $detalle->descripcion }}</td>
                                <td>Bs {{ $detalle->precio }}</td>
                                <td>Bs {{ $detalle->cantidad * $detalle->precio }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Métodos de pago:</p>
                    <img src="{{asset('asset/adminlte/dist/img/credit/visa.png')}}" alt="Visa">
                    <img src="{{asset('asset/adminlte/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                    <img src="{{asset('asset/adminlte/dist/img/credit/american-express.png')}}" alt="American Express">
                    <img src="{{asset('asset/adminlte/dist/img/credit/paypal2.png')}}" alt="Paypal">

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Para su comodidad se han empleado, los siguientes métodos de pago, por favor 
                    haga uso responsable de los mismos, y siempre veifique sus datos.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    

                    <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>Bs {{ $subtotal }}</td>
                        </tr>
                        <tr>
                            <th>Impuesto (9.3%)</th>
                            <td id="impuesto"> </td>
                        </tr>
                        <tr>
                            <th>Cargos extra:</th>
                            <td>Bs 5.80</td>
                        </tr>
                        <tr>
                            <th >Total:</th>
                            <td id="total"> </td>
                        </tr>
                    </table>
                    </div>
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                <div class="col-12">
                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                    </button>
                    <a href="{{ route('invoice.pdf') }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generar PDF
                    </a>
                </div>
                </div>
            </div>
            <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
      <!-- /.content -->
    <script>
         let $impu = document.querySelector('#impuesto');
         $impu.textContent = 'Bs ' + String((@json($subtotal) * 0.093).toFixed(1));
         let $tot = document.querySelector('#total');
         $tot.textContent = 'Bs ' + String((@json($subtotal) + (@json($subtotal) * 0.093) + 5.8).toFixed(1));
    </script>   
   
@endsection