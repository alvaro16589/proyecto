@extends('tema.layout')
@section('contenido') 
    <!-- /.row -->
    <div class="row mt-5" >
        <div class="col-12" >
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Detalle de artículos</h3>
                    
                    
                </div>
                <div  class="card-comment">
                    {!! QrCode::size(150)->generate( 'http://127.0.0.1:8000/reporteart'); !!} 
                    Listado de artículos registrados sin filtrar.
                </div>  
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 60em;">
                    <table class="table table-head-fixed table-hover" >
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Estado</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Cantidad</th>
                            <th>Precio (Bs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articulos as $articulo)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $articulo->estado }}</td>
                            <td>{{$articulo->nombre}}</td>
                            <td><img class=" img-fluid img-scuare img-bordered-sm img-md " src="{{asset('asset/img/articulos/'.$articulo->imagen)}}" alt="user image"></td>
                            <td>{{$articulo->stok}}</td>
                            <td>{{$articulo->precio}}</td>
                            
                        </tr>
                        
                        @endforeach
                        
                        
        
                    </tbody>
                    </table>
                    <!--paginacion de tablas en la pagina -->
                    <div class="pagination justify-content-center">
                        {{ $articulos->links() }}
                    </div>
            </div>
                </div>
            <!-- /.card-body -->
           
            @if ($pagina=='Reporte de artículos')
                <div class="card-footer">
                    <a href="{{ route('articulo.pdf') }}" class="btn btn-sm btn-primary">
                        Descargar artículos en PDF
                    </a>
                </div>  
            @else
                @if ($pagina=='Reporte de artículos activos')
                    <div class="card-footer">
                        <a href="{{ route('articuloac.pdf') }}" class="btn btn-sm btn-primary">
                            Descargar artículos activos en PDF
                        </a>
                    </div>
                @else  
                    <div class="card-footer">
                        <a href="{{ route('articuloin.pdf') }}" class="btn btn-sm btn-primary">
                            Descargar artículos inactivos en PDF
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
