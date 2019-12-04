<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- ESTE ES UN TEMPLATE QUE NO CONTIENE 
        EL ASIDE, SOLO SE MUESTRA EL HEADER COMO MENU PARA USUARIOS CON Y SIN CUENTA  --}}
    

    <title>{{$namepage}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('asset/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Styles -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/adminlte/dist/css/adminlte.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-top-nav" style="background-color: lightgrey;">
    
    <div class="wrapper">
        @include('tema.header')
        <div >
            <div class="row">
                {{-- columna izquierda --}}
                <div class="col-sm-7 col-md-8">
                    @yield('contenido')
                </div>
                {{-- columna derecha --}}
                <div class="col">   
                    @include('vistas.carrito')
                </div>
            </div>
        </div>
        

        
    </div>
     @include('tema.footer')  
    <!-- jQuery -->
    <script src="{{asset('asset/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('asset/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('asset/adminlte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('asset/adminlte/dist/js/demo.js')}}"></script>
    <script >
            
            let carrito = [];
            let total = 0;
            let nombre = [];
            let precio = [];
            let stok =[];
            let $carrito = document.querySelector('#carrito');
            let $total = document.querySelector('#total');
            
            function anyadirCarrito (arti) {
                /*/ Creamos el nodo del item del carrito
                let miNodo = document.createElement('li');
                    miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
                    miNodo.textContent = arti.nombre + ' x ' + arti.stok + ' - ' + arti.precio + ' Bs.';
                // Boton de borrar
                let miBoton = document.createElement('button');
                miBoton.classList.add('btn', 'btn-danger', 'mx-5');
                miBoton.textContent = 'X';
                miBoton.style.marginLeft = '1rem';
                miBoton.setAttribute('item', arti.id);
                miBoton.addEventListener('click', borrarItemCarrito);
                // Mezclamos nodos
                miNodo.appendChild(miBoton);
                $carrito.appendChild(miNodo);
                //agregando datos a los array+*/
                carrito.push(arti.id)
                precio.push(arti.precio)
                nombre.push(arti.nombre)
                stok.push(arti.stok);
                //caculamos el total
                renderizarCarrito();
                calcularTotal (); 
               
            }
            function renderizarCarrito () {
                //inicializamos una variable de recorrido
                var i=0;
                // Vaciamos todo el html
                $carrito.textContent = '';
                // Quitamos los duplicados
                let carritoSinDuplicados = [...new Set(carrito)];
                // Generamos los Nodos a partir de carrito
                carritoSinDuplicados.forEach(function (item, indice) {
                    // Obtenemos el item que necesitamos de la variable base de datos
                    let miItem = carrito;
                    // Cuenta el número de veces que se repite el producto
                    let numeroUnidadesItem = carrito.reduce(function (total, itemId) {
                        return itemId === item ? total += 1 : total;
                    }, 0);
                    // Creamos el nodo del item del carrito
                    let miNodo = document.createElement('li');
                    miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
                    miNodo.textContent = numeroUnidadesItem + ' X ' + nombre[i] + '-' + precio[i] + 'Bs.';
                    // Boton de borrar
                    let miBoton = document.createElement('button');
                    miBoton.classList.add('btn', 'btn-danger', 'mx-5');
                    miBoton.textContent = 'X';
                    miBoton.style.marginLeft = '1rem';
                    miBoton.setAttribute('item', item);
                    miBoton.addEventListener('click', borrarItemCarrito);
                    // Mezclamos nodos
                    miNodo.appendChild(miBoton);
                    $carrito.appendChild(miNodo);
                    //incrementamos la variable de recorrido
                    i = i + 1;
                })
            }
            function borrarItemCarrito () {
                
                // Obtenemos el producto ID que hay en el boton pulsado
                let id = this.getAttribute('item');
                // Borramos todos los productos
                const elemento = (element) => element == id;
                var i = carrito.findIndex(elemento);
              
                if ( i !== -1 ) {
                    carrito.splice( i, 1 );
                    nombre.splice( i, 1 );
                    precio.splice( i, 1 );
                    stok .splice( i, 1 );
                }
                
                // volvemos a renderizar
                renderizarCarrito();
                // Calculamos de nuevo el precio
                calcularTotal();
            }

            function calcularTotal () {
                // Limpiamos precio anterior
                total = 0;
                // Recorremos el array del carrito
                for (let item of precio) {
                    total = total + item;
                }    
                // Renderizamos el precio en el HTML
                $total.textContent = total.toFixed(2);
                
            }
            // Eventos

          
        </script>
</body>
</html>


