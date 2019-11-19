@extends('tema.layout')
@section('contenido')
    <!--end modal-->
    <!--tabla-->
    <div class="card card-primary mt-5">
        <div class="card-header">
            <h3 class="card-title">Detalle articulos</h3>
            <div class="card-tools">
                 {{-- hacer las busquedas --}}
                <form action="/articulo/{{auth()->user()->id}}" method="get" class="input-group input-group-sm float-right">
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
                    
                    <a class="btn btn-sm btn-info" href="/articulo">
                        Mostrar todo
                    </a>
                </form>
            </div>
              <!--modal-->
            <div class="modal fade" id="formularioAgregar">
                <div class="modal-dialog modal-lg">
                
                    <div class="modal-content bg-secondary">
                        <div class="modal-header">
                        <h4 class="modal-title">Ingresar articulo
                            
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <!--Cuerpo del Modal-->
                        <div class="row">
                            {{-- lado izquierdo del modal --}}
                            <div class="col-md-5 " >
                                <form action="/articulo/dropzone" class="dropzone bg-secondary" id="myAwesomeDropzone" method="post" enctype="multipart/form-data">
                                    @csrf				
                                </form>
                                
                            </div>
                            <form action="/articulo" method="POST" enctype="multipart/form-data" class="col-md-7" >
                                {{ csrf_field() }}
                                {{-- lado derecho del modal --}}
                                <div >
                                    <div class="form-group"><!--'estado','nombre','descripcion','imagen','vencimiento','stok'-->
                                        <label for="addnom">Nombre</label>
                                        <input id="addnom" name="Nombre" class="form-control input" type="text" placeholder="Ingrese su nombre" maxlength=60 >
                                        <label for="addape">Descripción</label>
                                        <textarea id="addape" name="Descripcion" class="form-control input"  placeholder="Ingrese su descripción..." maxlength=100></textarea>
                                        <label for="addcontra">Caducidad</label>
                                        <input id="addcontra" name="Vencimiento" class="form-control input" type="date"  >                                            
                                        <label for="addcontra">Cantidad</label>
                                        <input id="addcontra" name="Cantidad" class="form-control input" type="number" style="width: 50%;" min=0 max=200 value="1">  
                                        <label for="addcontra">Precio(Bs.)</label>
                                        <input id="addcontra" name="Precio" class="form-control input" type="number" style="width: 50%;" min=1.0 max=500000.0 value="1.0">  
                                        <label for="addm">Marca</label>
                                        <select id="addm" name="Marca" class="form-control select2" style="width: 50%;" aria-placeholder="Seleccione una marca...">
                                            @foreach ($marcas as $marca)
                                            <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                            @endforeach
                                            
                                        </select>
                                        <label for="addtipo">Proveedor</label>
                                        <select id="addtipo" name="Proveedor" class="form-control select2" style="width: 50%;" aria-placeholder="Seleccione un proveedor...">
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                            @endforeach
                                        </select>
            
                                        <label for="addco2">Selecionar imagen:</label>
                                        <input id="addco2" accept="image/*" name="Imagen" class="form-control input" type="file" placeholder="Seleccione una imagen..."  >
                                      {{-- comment 
                                        
                                        <div class="dropzone bg-teal"  id="dzId" >
                                            <div class="fallback">
                                                <input  name="file" type="file" multiple />
                                            </div>
                                            
                                        </div>--}}

                                        <div class="card-footer ">
                                            
                                        </div>
                                    </div>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>

                                </div>
                            </form>
                        </div>
                        <!--Fin del cuerpo del modal-->
                        </div>
                        <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>        
        </div>
      
    
        <div class="card-body table-responsive p-0" style="height: 60em;">
          <table class="table table-head-fixed table-hover " >
            <thead><!--'estado','nombre','descripcion','imagen','vencimiento','stok'-->
                <tr>
                    <th>Nº</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <th>Precio (Bs.)</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulos as $articulo)
                    <tr>
                    
                        <td>{{$articulo->id}}</td>
                        <td><form  method="GET" action="/articulo/{{$articulo->id}}/edit" enctype="multipart/form-data">
                            
                            {{ csrf_field() }}
                            
                                @if ($articulo->estado=='activo')
                                    <button type="submit" class="btn btn-block  btn-outline-success btn-sm">ON</button>
                                @elseif ($articulo->estado=='inactivo') 
                                    <button type="submit" class="btn  btn-block  btn-outline-danger btn-sm">OFF</button>
                                @endif
                            
                            </form>
                        </td>
                        <td>
                            {{$articulo->nombre}}
                        </td>
                        <td><img class=" img-fluid img-scuare img-bordered-sm img-md " src="{{asset('asset/img/articulos/'.$articulo->imagen)}}" alt="user image"></td>
                        <td>{{$articulo->stok}}</td>
                        <td>{{$articulo->precio}}</td>
                        <td>
                        <form method="POST" action="/articulo/{{$articulo->id}}">
                                @method('DELETE')
                                {{ csrf_field() }}  <!--genera un token para enviar los datos al controlador-->
                                <button name="btn" type="submit" class="btn btn-danger btn-sm "><i for="btn" class="fa fa-trash"></i>  Borrar</button>
                                
                        </form>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#mod{{$articulo->id}}"><i for="btn" class="fa fa-edit"></i>  Editar</a>
                        </td>
                        
                    </tr>
                    <!--modal           -->
                    <div class="modal fade" id="mod{{$articulo->id}}">
                        <div class="modal-dialog modal-xl">
                            <form  method="POST" action="/articulo/{{$articulo->id}}" enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                <div class="modal-content bg-secondary">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Actualizar artículo
                                        
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <!--Cuerpo del Modal-->
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            
                                            <div class="col-12">
                                                <img src="{{asset('asset/img/articulos/'.$articulo->imagen)}}" class="product-image" alt="Product Image">
                                            </div>
                                            
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group"><!--'estado','nombre','descripcion','imagen','vencimiento','stok'-->
                                                <label for="addnom">Nombre</label>
                                                <input id="addnom" name="Nombre" class="form-control input" type="text" placeholder="Ingrese su nombre" value="{{$articulo->nombre}}" maxlength=60>
                                                <label for="addape">Descripción</label>
                                                <textarea id="addape" name="Descripcion" class="form-control input"  placeholder="Ingrese su descripción..." maxlength=100>{{$articulo->descripcion}}</textarea>
                                                <label for="addcontra">Caducidad</label>
                                                <input id="addcontra" name="Vencimiento" class="form-control input" type="date"  value="{{$articulo->vencimiento}}">                                            
                                                <label for="addcontra">Cantidad</label>
                                                <input id="addcontra" name="Cantidad" class="form-control input" type="number" style="width: 50%;" value="{{$articulo->stok}}" min={{$articulo->stok}} max=200 >      
                                                <label for="addcontra">Precio(Bs.)</label>
                                                <input id="addcontra" name="Precio" class="form-control input" type="number" style="width: 50%;" min=1.0 max=500000.0 value="{{$articulo->precio}}">  
                                                <label for="addm">Marca</label>
                                                <select id="addm" name="Marca" class="form-control select2" style="width: 50%;">
                                                    @foreach ($marcas as $marca)
                                                    @if ($marca->id == $articulo->idmar)
                                                        <option selected="selected" value="{{$marca->id}}">{{$marca->nombre}}</option>
                                                    @else
                                                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                    
                                                </select>
                                                <label for="addtipo">Proveedor</label>
                                                <select id="addtipo" name="Proveedor" class="form-control select2" style="width: 50%;">
                                                    @foreach ($proveedores as $proveedor)
                                                        @if ($proveedor->id == $articulo->idprov)
                                                        <option selected="selected" value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                                        @else
                                                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
            
                                                <label for="addco2">Selecionar imagen:</label>
                                                    <input id="addco2" accept="image/*" name="Imagen" class="form-control input" type="file" placeholder="Seleccione una imagen..."  >
                                                <div class="card-footer ">
                                                    {{-- footer vacio  --}}
                                                    
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
                @endforeach
            </tbody>
          </table>
        </div>
        <!--paginacion de tablas en la pagina -->
        <div class="pagination justify-content-center">
            {{ $articulos->links() }}
        </div>
    </div>
    <!--fin tabla-->
        <!-- /.card -->
    
@endsection