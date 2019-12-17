
        <aside class="sidebar-dark-primary elevation-4">
            <div class="card">
                <div class="card-header">
                    <h2>Carrito</h2> 
                </div>
              
                    <div class="card-body">
                    <!-- Elementos del carrito -->
                    <table  class="table table-head-fixed table-hover " >
                        <thead><!--'estado','cantidad','precio'-->
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="carrito">
                
                        </tbody>
                    </table>
                    </div>
                    <div class="card-footer" >
                        <!-- Precio total -->
                        <p class="text-center">Total: <span id="total"></span> Bs.</p>
                        {{-- Este div es para agregar un boton de enviar por java script --}}
                        <div id="footer">

                        </div>
                    </div>
               
            </div>
        </aside>

