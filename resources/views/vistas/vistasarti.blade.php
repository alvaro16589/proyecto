<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- ESTE ES UN TEMPLATE QUE NO CONTIENE 
        EL ASIDE, SOLO SE MUESTRA EL HEADER COMO MENU PARA USUARIOS CON Y SIN CUENTA  --}}
    

    <title>{{$namepage}}</title>
   <!--axios para http-->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
     
     {{-- Routes --}}
          @routes    
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
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
            let $footer = document.querySelector('#footer');

            //funcion para enviar los valores en la url
           
            function enviar(){
                return axios.post(route('/detalle', carrito).append('_token', "{{ csrf_token() }}" ))
                .then((response) => {console.log('entro',carrito);
                    return response.data;
                    
                });
                
            }          


           
            
            function anyadirCarrito (arti) {
                //crear una cookie
                setCookie('carr', carrito, 1);
                //leer una cookie
                console.log(getCookie('carr'));
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
                var i = 0;
                var verCiclo = 0;
                // Vaciamos todo el html
                $carrito.textContent = '';
                $footer.textContent = '';
                // Quitamos los duplicados
                let carritoSinDuplicados = [...new Set(carrito)];
                // Generamos los Nodos a partir de carrito
                carritoSinDuplicados.forEach(function (item, indice) {
                    // Obtenemos el item que necesitamos de la variable base de datos
                    let miItem = carrito;
                    // Cuenta el número de veces que se repite el producto
                    let numeroUnidadesItem = carrito.reduce(function (total, itemId) {
                        if (itemId === item) {
                            total += 1;
                            
                        }
                        return  total;
                    }, 0);
                    
                    // Creamos el nodo del item del carrito
                    let miNodo = document.createElement('tr');
                    let colNombre = document.createElement('td');
                    let colCantidad = document.createElement('td');
                    let colPrecio = document.createElement('td');
                    let colBoton = document.createElement('td');
                    //obtenemos el indice que el item dentro de la tabla carrito y hacemos que 
                    //este tome el valot de i, para su inserción dentro de el tr
                    const elemento = (element) => element == item;
                    var i = carrito.findIndex(elemento);
                    if ( i !== -1 ) {
                        colNombre.textContent = nombre[i];
                       // colNombre.setAttribute('name','nombre');
                        colCantidad.textContent = numeroUnidadesItem;
                        colPrecio.textContent = precio[i];
                    }
                    // Boton de borrar
                    let miBoton = document.createElement('button');
                    let mifa = document.createElement('i');
                    mifa.classList.add("fas", "fa-times");
                    miBoton.classList.add('btn-sm', 'btn-danger');
                    miBoton.style.marginLeft = '1rem';
                    miBoton.setAttribute('item', item);
                    miBoton.addEventListener('click', borrarItemCarrito);
                    miBoton.appendChild(mifa);
                    colBoton.appendChild(miBoton);
                    // Mezclamos nodos
                    miNodo.appendChild(colNombre);
                    miNodo.appendChild(colCantidad);
                    miNodo.appendChild(colPrecio);
                    miNodo.appendChild(colBoton);
                    $carrito.appendChild(miNodo);

                    
                    //incrementamos la variable de recorrido
                    verCiclo += 1;
                })
                if (verCiclo!= 0) {
                    let miBotonEnviar = document.createElement('button');
                    miBotonEnviar.setAttribute( 'onclick','enviar()');
                    miBotonEnviar.classList.add('btn','btn-sm', 'btn-success');
                    miBotonEnviar.textContent = 'Registrar transacción'
                    miBotonEnviar.setAttribute('type', 'submit');
                    //miBotonEnviar.setAttribute( 'url','/detalle');
                    
                    $footer.appendChild(miBotonEnviar);
                }
                
                
            }
            function borrarItemCarrito () {
                
                // Obtenemos el producto ID que hay en el boton pulsado
                let id = this.getAttribute('item');
                // Borramos todos los productos
                const elemento = (element) => element == id;
                var i = carrito.findIndex(elemento);
              
                if ( i !== -1 ) {
                    carrito.splice( i, 1 );//SPLICE borra un item del array en la posicion "i" y "1" item hacia adelantes
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
            /*
            
             * Genera una cookie
            
             *
            
             * Esta funcion se utiliza en la funcion javascript:showUsr
            
             * Tiene que recibir:
            
             * 	nombre=nombre de la cookie
            
             * 	valor=valor de la cookie
            
             * 	caducidad=caducidad de la cookie en dias (-1 elimina la cookie)
            
             */
            
            function setCookie(nombre, valor, caducidad) {

                //Si no tenemos caducidad para la cookie, la definimos a 31 dias
            
                if(!caducidad)
            
                    caducidad = 31
            
             
            
                var expireDate = new Date() //coge la fecha actual
            
                expireDate.setDate(expireDate.getDate()+caducidad);
            
             
            
                //crea la cookie: incluye el nombre, la caducidad y la ruta donde esta guardada
            
                //cada valor esta separado por ; y un espacio
            
                document.cookie = nombre + "=" + escape(valor) + "; expires=" + expireDate.toGMTString() + "; path=/";
            
            }
            
             
            
            /*
            
             * Lee una cookie
            
             *
            
             * Tiene que recibir:
            
             * 	nombre=nombre de la cookie a leer
            
             */
            
            function getCookie(nombre)
            
            {
            
                /*
            
                 * document.cookie
            
                 * Contiene todas las cookies que estan al alcance de la paginas web en el formato:
            
                 * nombreCookie1=valor1; nombreCookie2=valor2
            
                 *
            
                 * document.cookie.length
            
                 * Contiene la longitud de la suma de todas las cookies
            
                 */
            
                if(document.cookie.length>0)
            
                {
            
                    /*
            
                     * indexOf(caracter,desde) Devuelve la primera posicion que el caracter aparece
            
                     * devuelve -1 si no encuentra el caracter
            
                     */
            
                    start=document.cookie.indexOf(nombre + "=");
            
                    if (start!=-1)
            
                    {
            
                        //El inicio de la cookie, el nombre de la cookie mas les simbolo '='
            
                        start=start + nombre.length+1;
            
                        //Buscamos el final de la cookie (es el simbolo ';')
            
                        end=document.cookie.indexOf(";",start);
            
                        //Si no encontramos el simbolo del final ';', el final sera el final de la cookie.
            
                        if (end==-1)
            
                            end=document.cookie.length;
            
                        //Devolvemos el contenido de la cookie.
            
                        //substring(start,end) devuelve la cadena entre el valor mas bajo y
            
                        //el mas alto, indiferentemente de la posicion.
            
                        return unescape(document.cookie.substring(start,end));
            
                    }
            
                }
            
                //no hemos encontrado la cookie
            
                return "";
            
            }
            
            //-->
            
            </script>
</body>
</html>


