@extends('tema.layout')
@section('contenido') 
    <!-- /.row -->
    <div class="row" >
        <div class="col-12" >
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Detalle de Marcas</h3>
                </div>
                <div  class="card-comment">
                    {!! QrCode::size(150)->generate( 'http://127.0.0.1:8000/reportemc'); !!} 
                    Listado de marcas registradas
                </div>  
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 60em;">
                    <table class="table table-head-fixed table-hover" >
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marcas as $marca)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $marca->id }}</td>
                            <td>{{ $marca->nombre }}</td>
                            <td>{{ $marca->ciudad }}</td>
                            
                           
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                        
                    <!--paginacion de tablas en la pagina -->
                    <div class="pagination justify-content-center">
                        {{ $marcas->links() }}
                    </div>
                </div>
            <!-- /.card-body -->
           
            @if ($pagina=='Reporte de marcas')
                <div class="card-footer">
                    <a href="{{ route('marca.pdf') }}" class="btn btn-sm btn-primary">
                        Descargar marcas en PDF
                    </a>
                </div>  
            @else
                @if ($pagina=='Reporte de marcas por ciudad')
                    <div class="card-footer">
                        <a href="{{ route('marcaac.pdf') }}" class="btn btn-sm btn-primary">
                            Descargar marcas en PDF
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
