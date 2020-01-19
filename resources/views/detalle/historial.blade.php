@extends('tema.layout')
@section('contenido')
    <div class="card">
        <div class="card-header">
            Detalle de historial
        </div>
        <div class="card-content">
            <table class="table  table-hover card-xl" >
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
                        <tr class=" card-header">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->estado}}</td>
                            <td><button type="button" class="btn" data-toggle="modal" data-target="#mod{{$item->id}}"><i class="fas fa-eye"></i></button> </td>
                            
                        </tr>  
                        <!--modal editar usuario-->
                                <div class="modal fade" id="mod{{$item->id}}">
                                    <div class="modal-dialog modal-lg modal-secondary ">
                                        <div class="modal-content bg-secondary">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Contenido</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body col-md-8 col-sm-12 offset-md-2">
                                            <!--Contenido del modal--> 
                                               
                                                    <thead>
                                                        <tr>
                                                            <th>Nº</th>
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
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$detalle->id}}</td>
                                                                    <td>{{$detalle->nombre}}</td>
                                                                    <td>{{$detalle->descripcion}}</td>
                                                                    <td>{{$detalle->cantidad}}</td>
                                                                    <td>{{$detalle->precio}}</td>
                                                                @endif
                                                            </tr> 
                                                        @endforeach
                                                    
                                                    </tbody>
                                                            
                                            
                                            <!--end contenido-->
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            <!--fin modal -->
                    @endforeach
                    
                </tbody>
                  
              </table>
        </div>
    </div>
@endsection