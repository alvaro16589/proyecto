
        <aside class="sidebar-dark-primary elevation-4">
            <div class="card">
                <div class="card-header">
                    <h2>
                        <i class="fas fa-cart-arrow-down fa-lg mr-2"></i>
                        Carrito
                    </h2> 
                </div>
                <form action="/detalle" method="GET">
                    <div class="card-body ">
                        <!-- Elementos del carrito -->
                        <table  class="table table-head table-hover " >
                            <thead><!--'estado','cantidad','precio'-->
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cant.</th>
                                    <th>P. U.</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="carrito">
                    
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer" >
                        <!-- Precio total -->
                        <p ><h3 class="text-center">Total: <span id="total"></span> Bs.</h3></p>
                        {{-- Este div es para agregar un boton de enviar por java script --}}
                        
                            <div  id="footer">
                            </div>
                        
                    </div>
                </form>
            </div>
        </aside>

