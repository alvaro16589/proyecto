@extends('login.logcontent')
@section('content')
  <div class="card col-12 col-sm-10 col-md-8 col-lg-8 col-xl-6 offset-sm-1 offset-md-2 offset-lg-2 offset-xl-3">
    <div class="card-header">
      <div class="card-title">
        <h1 class="profile-username text-center p-3">{{auth()->user()->name}}</h1>
      </div>
    </div>
    <div class="card-body box-profile">
      <div class="row">
      {{-- lado izquierdo del card --}}
        <div class="col-12 col-sm-12 col-md-6 ">
          <div class="text-center">
            <img  class="img-fluid img-square" src="{{asset('asset/img/userprofile/'.auth()->user()->foto)}}" alt="Foto de perfil de usuario">
          </div>
        </div>
        {{-- lado derecho del card --}}
        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
          
            
            <ul class="list-group list-group-bordered mb-3">
              <li class="list-group-item">
                <b><i class="fas fa-envelope mr-2"></i> Correo electrónico: </b> <a class="float-right">{{auth()->user()->email}}</a>
              </li>
              <li class="list-group-item">
                <b><i class="fas fa-user mr-2"></i> Tipo de cuenta: </b> <a class="float-right">{{auth()->user()->tipo}}</a>
              </li>
              <li class="list-group-item">
                <b><i class="fas fa-file mr-2"></i> Cuenta creada :</b> <a class="float-right">{{auth()->user()->created_at}}</a>
              </li>
            </ul>
          <div class="row">
              <div class=" col-md-6">

              </div>
              <div class="col-sm-12 col-md-6 bg-gray p-4 justify-content-between" >
                <button type="button" data-toggle="modal" data-target="#mod" class="btn btn-sm btn-success"><i class="fas fa-edit mr-2"></i>Editar</button>
                <form action="/usuario/perfil" method="get">{{-- revisar que onda com este campo  por que no me redirecciona a la pagina de reset --}}
                  @csrf
                  <button type="submit" class="btn btn-sm btn-info" >Cambiar contraseña</button>
                </form>
                
              </div>
          </div>    
        </div>

      </div>
    </div>
  </div>
   <!--modal editar usuario-->
   <div class="modal fade " id="mod" >
      <div class="modal-dialog modal-lg modal-secondary ">
      <div class="modal-content bg-secondary">
        <form  method="POST" action="/usuario/perfil/{{ auth()->user()->id }}" enctype="multipart/form-data">
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
              <div class="row justify-content-center">
                  
                  <div class="col-12 col-md-6 ">
                      {{-- contenido de la derecha --}}
                       <div class="form-group">
                          <label for="addnom">Nombre</label>
                          <input id="addnom" name="Nombre" class="form-control input @error('Nombre') is-invalid @enderror" type="text" placeholder="Ingrese su nombre" value="{{ old('Nombre',auth()->user()->name) }}" required autocomplete="name" autofocus maxlength=30 >
                          @error('Nombre')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          <label for="addape">Correo</label>
                          <input id="addape" name="Correo" class="form-control input" type="email" placeholder="Ingrese su Correo" value="{{auth()->user()->email}}" maxlength=70>

                          

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
@endsection