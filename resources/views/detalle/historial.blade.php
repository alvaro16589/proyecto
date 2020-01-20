@extends('tema.layout')
@section('contenido')
    <div class="card">
        <div class="card-header">
            Detalle de historial
        </div>
        <div class="card-content">
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buys as $item)
                        <tr>
                            
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->estado}}</td>
                                        <td>
                                            <div class="card card-default collapsed-card">
                                                <div class="card-header">
                                                        {{-- caveceras --}}
                                                        <div class="card-title">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button> 
                                                        </div>
                                                           
                                                </div>
                                                <div class="card-body">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Producto</th>
                                                                <th>Detalle</th>
                                                                <th>Cant.</th>
                                                                <th>P.U.</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($detalles as $detalle)
                                                                <tr>
                                                                    @if ($detalle->iddet == $item->id)
                                                                        <td>{{$detalle->id}}</td>
                                                                        <td>{{$detalle->nombre}}</td>
                                                                        <td>{{$detalle->descripcion}}</td>
                                                                        <td>{{$detalle->cantidad}}</td>
                                                                        <td>{{$detalle->precio}}</td>
                                                                    @endif
                                                                </tr> 
                                                            @endforeach
                                                        </tbody> 
                                                    </table>
                                                </div>
                                            </div>            
                                        </td>
                                
                        </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection