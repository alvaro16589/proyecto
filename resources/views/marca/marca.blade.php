@extends('tema.layout')
@section('contenido')
    <!-- /.row -->      
    <div class="row" >
        <div class="col-12" >
          <div class="card">
            <div class="card-header bg-primary">
              <h3 class="card-title">Detalle de Marcas</h3>
              <div class="card-tools">
                {{-- hacer las busquedas --}}
                <form action="/marca/{{auth()->user()->id}}" method="get" class="input-group input-group-sm float-right">
                  {{-- boton para hacer busquedas --}}
                  <input type="text" name="Buscar" class="form-control " placeholder="Search">
                  <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                  {{-- fin del formulario de busqueda --}}
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#agremarca" >
                      <i class="fas fa-plus"></i> 
                          Agregar
                  </button>
                  
                  <a class="btn btn-sm btn-info" href="/marca">
                      Mostrar todo
                  </a>
                </form>
              </div>
               <!--modal agregar usuario-->
              <div class="modal fade" id="agremarca">
                <div class="modal-dialog modal-lg ">
                  <form action="/marca" method="POST">
                    <!--generador de token para envio de datos seguros-->
                    {{ csrf_field() }}
                    <div class="modal-content bg-secondary">
                      <div class="modal-header">
                        <h4 class="modal-title">Agregar Marca</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body col-md-8 col-sm-12 offset-md-2">
                        <!--Contenido del modal--> 
                        <div class="form-group">
                            <label for="addnom">Nombre</label>
                            <input id="addnom" name="Nombre" class="form-control input" type="text" placeholder="Ingrese un nombre" maxlength=60>
                            <label for="addape">Ciudad</label>
                            <input id="addape" name="Ciudad" class="form-control input" type="text" placeholder="Ingrese una ciudad" maxlength=30>
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
              <table class="table table-head-fixed table-hover " >
                <thead>
                  <tr>
                    <th>Nº</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($marcas as $marca)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$marca->id}}</td>
                      <td>{{$marca->nombre}}</td>
                      <td>{{$marca->ciudad}}</td>
                      <td>
                        <form method="POST" action="/marca/{{$marca->id}}">
                          @method('DELETE')
                          {{ csrf_field() }}  <!--genera un token para enviar los datos al controlador-->
                          <button type="submit" class="btn btn-danger btn-sm"><i for="btn" class="fa fa-trash"></i> Borrar</button>
                        </form>
                      </td>
                      <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#mod{{$marca->id}}"><i for="btn" class="fa fa-edit"></i> Editar</a></td>
                    </tr>  
                    <!--modal editar usuario-->
                    <div class="modal fade" id="mod{{$marca->id}}">
                        <div class="modal-dialog modal-lg modal-secondary ">
    
                          <form method="POST" action="/marca/{{$marca->id}}" enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}  
                              <div class="modal-content bg-secondary">
                                <div class="modal-header">
                                  <h4 class="modal-title">Editar Marca</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body col-md-8 col-sm-12 offset-md-2">
                                  <!--Contenido del modal--> 
                                                            
                                    <div class="form-group">
                                        <label for="agrenom">Nombre</label>
                                        <input id="agrenom" value="{{$marca->nombre}}" name="Nombre" class="form-control input" type="text" placeholder="Ingrese un nombre" maxlength=60>
                                        <label for="agreape">Ciudad</label>
                                        <input id="agreape" value="{{$marca->ciudad}}" name="Ciudad" class="form-control input" type="text" placeholder="Ingrese una ciudad" maxlength=30>
                                        <div class="card-footer ">
                                        </div>
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
                  @endforeach
                  
    
                </tbody>
              </table>
      
            </div>
            <!-- /.card-body -->
            <!--paginacion de tablas en la pagina -->
            <div class="pagination justify-content-center">
              {{ $marcas->links() }}
            </div>
          </div>
          <!-- /.card -->
        </div>
    </div>
            <!-- /.row -->
    
    <!-- /.card -->
    
@endsection