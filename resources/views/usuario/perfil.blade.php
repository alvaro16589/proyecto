@extends('tema.layout')
@section('contenido')
    <div class="card-body box-profile">
      <div class="row">
      {{-- lado izquierdo del card --}}
        <div class="col-12 col-sm-8 col-md-6">
          <div class="text-center">
            <img  class="img-fluid img-square" src="{{asset('asset/img/userprofile/'.auth()->user()->foto)}}" alt="Foto de perfil de usuario">
          </div>
        </div>
        {{-- lado derecho del card --}}
        <div class="col-12 col-sm-8 col-md-6">
          <h1 class="profile-username text-center p-3">{{auth()->user()->name}}</h1>
            
            <ul class="list-group list-group-bordered mb-3">
              <li class="list-group-item">
                <b>Correo electrónico: </b> <a class="float-right">{{auth()->user()->email}}</a>
              </li>
              <li class="list-group-item">
                <b>Tipo de cuenta: </b> <a class="float-right">{{auth()->user()->tipo}}</a>
              </li>
              <li class="list-group-item">
                <b>Cuenta creada :</b> <a class="float-right">{{auth()->user()->created_at}}</a>
              </li>
            </ul>
            
        </div>
      </div>
    </div>
@endsection