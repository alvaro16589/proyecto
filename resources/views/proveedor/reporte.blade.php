@extends('tema.layout')
@section('contenido') 
    <!-- /.row -->
    <div class="row mt-5" >
        <div class="col-12" >
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Detalle de Proveedores</h3>
                </div>
                <div  class="card-comment">
                    <p>Listado de Proveedores registrados sin filtrar</p>
                </div>  
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 60em;">
                    <table class="table table-head-fixed table-hover" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Celular</th>
                            <th>Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->id }}</td>
                            <td>{{ $proveedor->nombre }}</td>
                            <td>{{ $proveedor->estado }}</td>
                            <td>{{ $proveedor->celular }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            
                            
                        </tr>
                        
                        @endforeach
                        
                        
        
                    </tbody>
                    </table>
                    <!--paginacion de tablas en la pagina -->
                    <div class="pagination justify-content-center">
                        {{ $proveedores->links() }}
                    </div>
                </div>
            <!-- /.card-body -->
           
            @if ($pagina=='Reporte de proveedores')
                <div class="card-footer">
                    <a href="{{ route('proveedor.pdf') }}" class="btn btn-sm btn-primary">
                        Descargar proveedores en PDF
                    </a>
                </div>  
            @else
                @if ($pagina=='Reporte de proveedores activos')
                    <div class="card-footer">
                        <a href="{{ route('proveedorac.pdf') }}" class="btn btn-sm btn-primary">
                            Descargar proveedores activos en PDF
                        </a>
                    </div>
                @else  
                    <div class="card-footer">
                        <a href="{{ route('proveedorin.pdf') }}" class="btn btn-sm btn-primary">
                            Descargar proveedores inactivos en PDF
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
