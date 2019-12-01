@extends('tema.layout')
@section('contenido') 
    <!-- /.row -->
    <div class="row mt-5" >
        <div class="col-12" >
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Detalle de usuarios</h3>
                    
                    
                </div>
                <div  class="card-comment">
                    <p>Listado de usuarios registrados sin filtrar</p>
                    
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td><img class=" img-fluid img-circle img-bordered-sm img-md " src="{{asset('asset/img/userprofile/'.$usuario->foto)}}" alt="user image"></td>
                            <td>{{$usuario->name}}</td>
                            
                            <td>
                                {{$usuario->estado}}
                            </td>
                            <td>
                                {{ $usuario->email }}
                            </td>
                            <td>{{ $usuario->tipo }}</td>
                            <td>
                            
                        </tr>
                        
                        @endforeach
                        
                        
        
                    </tbody>
                    </table>
                    
                </div>
            <!-- /.card-body -->
           
            @if ($pagina=='Reporte de usuarios')
                <div class="card-footer">
                    <a href="{{ route('usuarios.pdf') }}" class="btn btn-sm btn-primary">
                        Descargar usuarios en PDF
                    </a>
                </div>  
            @else
                @if ($pagina=='Reporte de usuarios activos')
                    <div class="card-footer">
                        <a href="{{ route('usuariosac.pdf') }}" class="btn btn-sm btn-primary">
                            Descargar usuarios activos en PDF
                        </a>
                    </div>
                @else  
                    <div class="card-footer">
                        <a href="{{ route('usuariosin.pdf') }}" class="btn btn-sm btn-primary">
                            Descargar usuarios inactivos en PDF
                        </a>
                    </div>
                @endif
            @endif
            
                 
            
            </div>
            <!-- /.card -->
        </div>
    </div>
            <!-- /.row -->
    
    <!-- /.card -->
    
@endsection
