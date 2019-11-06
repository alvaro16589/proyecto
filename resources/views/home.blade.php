@extends('tema.layout')
@section('contenido')
    
    <div class="row justify-content-center bg-info">
        <col-12>
            <h1>Bienvenido...! listo para comenzar.</h1>
        </col-12>
    </div>
    <div class="row justify-content-center ">
        <div class="col-12">
                <div id="carrueselinicio" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carrueselinicio" data-slide-to="0" class=""></li>
                        <li data-target="#carrueselinicio" data-slide-to="1" class="active"></li>
                        <li data-target="#carrueselinicio" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('asset/adminlte/dist/img/photo1.png')}}" alt="First slide">
                            <div class="carousel-caption">
                                <h3>VENTAX</h3>
                                <p>Con nuestro progreso impulsamos a las personas!</p>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('asset/adminlte/dist/img/photo2.png')}}" alt="Second slide">
                            <div class="carousel-caption">
                                <h3>VENTAX</h3>
                                <p>Un nuevo día, un nuevo objetivo.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('asset/adminlte/dist/img/photo3.jpg')}}" alt="Third slide">
                            <div class="carousel-caption">
                                <h3>VENTAX</h3>
                                <p>Una visión amplia del futuro!</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carrueselinicio" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carrueselinicio" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        </div>
            
    </div>
 

    
@endsection