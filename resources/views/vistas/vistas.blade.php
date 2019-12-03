@extends('vistas.vistasarti')
@section('contenido')
    <section class="contentainer m-4 card card-solid">
        <div class="row card-body pb-0" id="items">
            @foreach ($articulos as $articulo)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                    <div class="card bg-ligth ">
                        <h5 class="card-header">{{$articulo->nombre}}</h5>
                        <img style="height: 100%; width: 100%; display: block;" src="{{asset('asset/img/articulos/'.$articulo->imagen)}}" alt="Card image">
                            
                        <ul class="list-group list-group-flush">
                                <div class="bg-gray py-2 px-3 mt-4">
                                    <h2 class="mb-0">
                                    {{$articulo->precio}} Bs.
                                    </h2>
                                    
                                </div>
                        </ul>
                               
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#mod{{$articulo->id}}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <div class="row card-footer position-bottom ">
                        </div>         
                    </div>
                </div>
                <!--modal           -->
                <div class="modal fade" id="mod{{$articulo->id}}">
                        <div class="modal-dialog modal-xl" style="height:80%;">
                         
                            <div class="modal-content bg-ligth">
                                <div class="modal-header">
                                  <h4 class="modal-title">
                                    {{$namepage}}
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
                                        <!--        carrusel             -->
                                        <div id="s{{$articulo->id}}IDcar" class="carousel slide" data-ride="carousel">
                                          {{-- imagenes para loscontroles --}}
                                          <ol class="carousel-indicators carousel  bg-gray">
                                            {{-- for para los controles del carrusel --}}
                                              <li data-target="#s{{$articulo->id}}IDcar" data-slide-to="0" class="active">
                                                <img class="d-block w-100" src="{{asset('asset/img/articulos/'.$articulo->imagen)}}" alt="First slide">
                                              </li>
                                              <!--{{ $valor = 0}}-->
                                            @foreach ($imagenes as $imagen)
                                              @if ($imagen->idarti == $articulo->id)
                                                <li data-target="#s{{$articulo->id}}IDcar" data-slide-to="{{$valor = $valor + 1 }}" >
                                                  <img class="d-block w-100" src="{{asset('asset/img/articulos/'.$imagen->imagen)}}" alt="First slide">
                                                </li>
                                              @endif
                                            @endforeach
                                            
                                          </ol>
                                          {{-- inicia el carrusel de imagenes --}}                                            
                                          <div class="carousel-inner">
                                            <div class="carousel-item active">
                                              <img class="d-block w-100" src="{{asset('asset/img/articulos/'.$articulo->imagen)}}" alt="First slide">
                                            </div>
                                            {{-- for para las imagenes de carrusel --}}
                                            @foreach ($imagenes as $imagen)
                                              @if ($imagen->idarti == $articulo->id)
                                                <div class="carousel-item">
                                                  <img class="d-block w-100" src="{{asset('asset/img/articulos/'.$imagen->imagen)}}" alt="Second slide">
                                                </div>
                                              @endif                                                
                                            @endforeach
                                          </div>
                                          <a class="carousel-control-prev" href="#s{{$articulo->id}}IDcar" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                          </a>
                                          <a class="carousel-control-next" href="#s{{$articulo->id}}IDcar" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                          </a>
                                        </div>
                                    <!--        carrusel             -->
                                
                                      </div>
                                      
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group"><!--'estado','nombre','descripcion','imagen','vencimiento','stok'-->
                                          <h3 class="my-3">
                                              {{$articulo->nombre}}
                                          </h3>
                                          <p>
                                              {{$articulo->descripcion}}
                                          </p>
                                          <div class="bg-gray py-2 px-3 mt-4">
                                              <h1>Precio : </h1>
                                                  <h2 class="mb-0">
                                                    {{$articulo->precio}} Bs.
                                                  </h2>
                                                  
                                          </div>
                                          
                                          <div class="card-footer ">
                                              <div class="mt-4">
                                                  <button type="button" class="btn btn-primary btn-lg btn-flat" id="marcador"  
                                                      onclick="anyadirCarrito({{$articulo->precio}},{{$articulo->id}},{{$articulo->stok}},{{$articulo->nombre}})" >
                                                      <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                                                      Subir a carro
                                                  </button>
                                  
                                                  <div class="btn btn-default btn-lg btn-flat">
                                                      <i class="fas fa-heart fa-lg mr-2"></i> 
                                                      Agregar a deseados
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                        
                                    </div>
                                  </div>
                                  <!--Fin del cuerpo del modal-->
                                </div>
                                <!--<div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>-->
                            </div>
                            <!-- /.modal-content -->
                          
                        <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
            @endforeach
            
            
        </div>
        <!--paginacion de tablas en la pagina -->
                <div class="pagination justify-content-center">
                    {{ $articulos->links() }}
                </div>
    </section>    
      
@endsection
        
