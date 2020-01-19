@extends('tema.layout')
@section('contenido')
    <!--card proveedores-->
    <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">PROVEEDORES</h3>
                <div class="card-tools">
                    {{-- hacer las busquedas --}}
                    <form action="/proveedor/{{auth()->user()->id}}" method="get" class="input-group input-group-sm float-right">
                        {{-- boton para hacer busquedas --}}
                        <input type="text" name="Buscar" class="form-control " placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                        {{-- fin del formulario de busqueda --}}
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#formularioAgregar" >
                            <i class="fas fa-plus"></i> 
                                Agregar
                        </button>
                        
                        <a class="btn btn-sm btn-info" href="/proveedor">
                            Mostrar todo
                        </a>
                    </form>
                </div>
                
            </div>
        <!--modal-->
            <div class="modal fade" id="formularioAgregar">
                <div class="modal-dialog modal-lg">
                <form action="/proveedor" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-content bg-secondary">
                        <div class="modal-header">
                        <h4 class="modal-title">Ingresar Proveedor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <!--Cuerpo del Modal-->
                        <div class="row">
                            <div class="col-md-8 offset-2 ">
                            <div class="form-group">
                                <label for="insnom">Nombre</label>
                                <input id="insnom" name="Nombre" class="form-control input" type="text" placeholder="Ingrese su nombre" maxlength=100>
                                <!-- phone mask -->
                            
                                <label for="instelf">Teléfono:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input id="instelf" name="Telefono" type="text" class="form-control"  data-inputmask="'mask': '99999999'" placeholder="99999999" />
                                </div>
                            
                                <label for="insdir">Direccion</label>
                                <input id="insdir" name="Direccion" type="text" class="form-control" placeholder="Ingrese una dirección Ej: Los arboles #3443 Ave. El manjar."  maxlength=150>
                                <div class="card-footer ">
                                    
                                </div>
                            </div>
                            
                            </div>
                        </div>
                        <!--Fin del cuerpo del modal-->
                        </div>
                        <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </form>
                <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        
            <div class="card-body table-responsive p-0" style="height: 60em;">
            <table class="table table-head-fixed table-hover " >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Celular</th>
                    <th>Dirección</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                    
                        <td>{{$proveedor->id}}</td>
                        <td>{{$proveedor->nombre}}</td>
                        <td>
                            <form  method="GET" action="/proveedor/{{$proveedor->id}}/edit" enctype="multipart/form-data">
                            
                            {{ csrf_field() }}
                            
                                @if ($proveedor->estado=='activo')
                                    <button type="submit" class="btn btn-block  btn-outline-success btn-sm">ON</button>
                                @elseif ($proveedor->estado=='inactivo') 
                                    <button type="submit" class="btn  btn-block  btn-outline-danger btn-sm">OFF</button>
                                @endif
                            
                            </form>
                        </td>
                        <td>{{$proveedor->celular}}</td>
                        <td>{{$proveedor->direccion}}</td>
                        <td>
                        <form method="POST" action="/proveedor/{{$proveedor->id}}">
                                @method('DELETE')
                                {{ csrf_field() }}  <!--genera un token para enviar los datos al controlador-->
                                <button type="submit" class="btn btn-danger btn-sm"><i for="btn" class="fa fa-trash"></i> Borrar</button>
                        </form>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#mod{{$proveedor->id}}"><i for="btn" class="fa fa-edit"></i> Editar</a>
                        </td>
                        
                    </tr>
                        <!--modal           -->
                        <div class="modal fade" id="mod{{$proveedor->id}}">
                            <div class="modal-dialog modal-lg">
                            <form  method="POST" action="/proveedor/{{$proveedor->id}}" enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                <div class="modal-content bg-secondary">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Actualizar Proveedor</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <!--Cuerpo del Modal-->
                                    <div class="row">
                                        <div class="col-md-8 offset-2 ">
                                        <div class="form-group">
                                            <label for="agrenom">Nombre</label>
                                            <input id="agrenom" name="Nombre" class="form-control input" type="text"  value = "{{$proveedor->nombre}}">
                                            <!-- phone mask -->
                                        
                                            <label for="agretel">Teléfono:</label>
                            
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input id="agretel" name="Telefono" type="text" class="form-control" data-inputmask="'mask': '99999999'" placeholder="99999999" value="{{$proveedor->celular}}">
                                                </div>
                                            
                                            <label for="agredir">Direccion</label>
                                            <input id="agredir"  name="Direccion" type="text" class="form-control" value="{{$proveedor->direccion}}" placeholder="Ingrese una dirección Ej: Los arboles #3443 Ave. El manjar." >
                                        </div>
                                        </div>
                                    </div>
                                    <!--Fin del cuerpo del modal-->
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </form>
                            <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                @endforeach
                </tbody>
        
            </table>
            <!--paginacion de tablas en la pagina -->
            <div class="pagination justify-content-center">
                {{ $proveedores->links() }}
                </div>
            </div>
        </div>
        <!--fin tabla-->
            <!-- /.card -->
@endsection
    