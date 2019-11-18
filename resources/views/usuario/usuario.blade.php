@extends('tema.layout')
@section('contenido') 
    <!-- /.row -->
    <div class="row mt-5" >
        <div class="col-12" >
            <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Detalle de usuarios</h3>
                <div class="card-tools">
                    {{-- hacer las busquedas --}}
                    <form action="/usuario/{{auth()->user()->id}}" method="get" class="input-group input-group-sm float-right">
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
                        
                        <a class="btn btn-sm btn-info" href="/usuario">
                            Mostrar todo
                        </a>
                    </form>
                </div>
                <!--modal agregar usuario-->
                <div class="modal fade" id="formularioAgregar">
                    <div class="modal-dialog modal-lg ">
                        <form action="/usuario" method="POST" enctype="multipart/form-data" >
                        {{ csrf_field() }}<!--creador de tokens-->
                        <div class="modal-content bg-secondary">
                            <div class="modal-header">
                                <h4 class="modal-title">Agregar usuario</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body col-md-8 col-sm-12 offset-md-2">
                                <!--Contenido del modal--> 
                                <div class="form-group">
                                    <label for="addnom">Nombre</label>
                                    <input id="addnom" name="Nombre" class="form-control input" type="text" placeholder="Ingrese su nombre" maxlength=30>
                                    <label for="addape">Correo electrónico</label>
                                    <input id="addape" name="Correo" class="form-control input" type="email" placeholder="Ingrese su Correo" maxlength=70 >
                                    <label for="addcontra">Contraseña</label> 
                                    <input id="addcontra" name="Contraseña" class="form-control input" type="password" placeholder="Ingrese su contraseña" maxlength=30 >
                                    <label for="addcontra2">Repita la contraseña</label>
                                    <input id="addcontra2" name="addcontra2" class="form-control input" type="password" placeholder="Ingrese su contraseña" maxlength=30 >
                                    
                                    <label for="addtipo">Tipo</label>
                                    <select id="addtipo" name="Tipo" class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Administrador</option>
                                    <option>Secretaria</option>
                                    <option>Usuario</option>
                                    
                                    </select>
                                    <label for="addco2">Selecionar imagen:</label>
                                    <input id="addco2" accept="image/*" name="Foto" class="form-control input" type="file" placeholder="Seleccione una imagen..."  >
                                </div>
                                <!--end contenido-->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--fin modal agregar usuario-->
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 60em;">
                <table class="table table-head-fixed table-hover" >
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>E mail</th>
                    <th>tipo</th>
                    <th></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td><img class=" img-fluid img-circle img-bordered-sm img-md " src="{{asset('asset/img/userprofile/'.$usuario->foto)}}" alt="user image"></td>
                        <td>{{$usuario->name}}</td>
                        
                        <td>
                            <form  method="GET" action="/usuario/{{$usuario->id}}/edit" enctype="multipart/form-data">
                        
                            {{ csrf_field() }}
                            
                                @if ($usuario->estado=='activo')
                                    <button type="submit" class="btn btn-block  btn-outline-success btn-sm">ON</button>
                                @else 
                                    <button type="submit" class="btn  btn-block  btn-outline-danger btn-sm">OFF</button>
                                @endif
                            
                            </form>                
                        </td>
                        <td>
                            {{ $usuario->email }}
                        </td>
                        <td>{{ $usuario->tipo }}</td>
                        <td>
                        <form method="POST" action="/usuario/{{$usuario->id}}">
                            @method('DELETE')
                            {{ csrf_field() }}  <!--genera un token para enviar los datos al controlador-->
                            <button type="submit" class="btn btn-danger btn-sm"><i for="btn" class="fa fa-trash"></i> Borrar</button>
                        </form>
                        </td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#mod{{$usuario->id}}">
                                <i for="btn" class="fa fa-edit"></i> 
                                Editar
                            </a>
                        </td>
                    </tr>
                        <!--modal editar usuario-->
                    <div class="modal fade" id="mod{{$usuario->id}}">
                            <div class="modal-dialog modal-lg modal-secondary ">
                            <div class="modal-content bg-secondary">
                                <form  method="POST" action="/usuario/{{$usuario->id}}" enctype="multipart/form-data">
                                    @method('PUT')
                                    {{ csrf_field() }}
                                    
                                    <div class="modal-header">
                                        
                                       
                                    <h4 class="modal-title mt-3" style="text-align: center;">Editar usuario</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body col">
                                    <!--Contenido del modal-->
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            {{-- contenido de la izquierda --}}
                                             <img class=" d-block" style="width: inherit;" src="{{asset('asset/img/userprofile/'.$usuario->foto)}}" alt="user image">

                                        </div>
                                        <div class="col-12 col-md-6">
                                            {{-- contenido de la derecha --}}
                                             <div class="form-group">
                                                <label for="addnom">Nombre</label>
                                                <input id="addnom" name="Nombre" class="form-control input" type="text" placeholder="Ingrese su nombre" value="{{$usuario->name}}" maxlength=30 >
                                                <label for="addape">Correo</label>
                                                <input id="addape" name="Correo" class="form-control input" type="email" placeholder="Ingrese su Correo" value="{{$usuario->email}}" maxlength=70>
                                                <label for="addcontra2">Nueva contraseña</label>
                                                <input id="addcontra2" name="Contraseña" class="form-control input" type="password" placeholder="Ingrese su nueva contraseña"  maxlength=100>
                                                <label for="addtipo">Tipo</label>
                                                <select id="addtipo" name="Tipo" class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Administrador</option>
                                                    <option>Vendedor</option>
                                                    <option>Secretaria</option>
                                                </select>
                                                
            
                                                <label for="addco2">Selecionar imagen:</label>
                                                <input id="addco2" accept="image/*" name="Foto" class="form-control input" type="file" placeholder="Seleccione una imagen..."  >
            
                                                <div class="card-footer ">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                   
                                    <!--end contenido-->
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!--fin modal agregar usuario-->
                    @endforeach
                    
                    
    
                </tbody>
                </table>
                
            </div>
            <!-- /.card-body -->
            <!--paginacion de tablas en la pagina -->
            <div class="pagination justify-content-center">
                {{ $usuarios->links() }}
            </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
            <!-- /.row -->
    
    <!-- /.card -->
    
@endsection