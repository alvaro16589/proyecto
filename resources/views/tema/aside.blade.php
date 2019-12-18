<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-orange">
      <img src="{{asset('asset/adminlte/dist/img/AdminLTELogo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-1"
           style="opacity: .8">
      <span class="brand-text font-weight-light ">VENTAX</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('asset/img/userprofile/'.auth()->user()->foto)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/usuario/perfil/{{auth()->user()->id}}" class="d-block">{{auth()->user()->name}}<br> ({{auth()->user()->tipo}})</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Ventas
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open @if (auth()->user()->tipo == "Secretaria")
              d-none
          @endif">
            <a href="#" class="nav-link  active">
              <i class="nav-icon fas fa-copy "></i>
              <p>
                Módulos : 
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/usuario" class="nav-link @if($pagina == 'usuario') {{'active'}} @endif">
                  <i class="far fa-circle nav-icon"></i>
                 <p>Usuario </p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="/proveedor" class="nav-link @if($pagina == 'proveedor') {{'active'}} @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/marca" class="nav-link @if($pagina == 'marca') {{'active'}} @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marca</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/articulo" class="nav-link @if($pagina == 'articulo') {{'active'}} @endif ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Artículo</p>
                </a>
              </li>
              <!--finalizacion del dropdawn-->
            </ul>
          </li>
          <li class="nav-header">Reportes</li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              {{-- Reporte proveedores --}}
              <li class="nav-item has-treeview ">{{-- menu-open --}}              
                <a href="#" class="nav-link  active">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Reportes usuarios: 
                    
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/reporte" class="nav-link @if($pagina == 'Reporte de usuarios') {{'active'}} @endif">
                      <i class="far fa-circle nav-icon"></i>
                     <p>Todos los usuarios </p>
                    </a>
                  </li>              
                  <li class="nav-item">
                    <a href="/reporteac" class="nav-link @if($pagina == 'Reporte de usuarios activos') {{'active'}} @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Usuarios activos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/reportein" class="nav-link @if($pagina == 'Reporte de usuarios inactivos') {{'active'}} @endif ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Usuarios inactivos</p>
                    </a>
                  </li>
                  <!--finalizacion del dropdawn-->
                </ul>
              </li>
              {{-- Reporte proveedores --}}
              <li class="nav-item has-treeview ">{{-- menu-open --}}              
                <a href="#" class="nav-link  active">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Reportes proveedores: 
                    
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/reportepr" class="nav-link @if($pagina == 'Reporte de proveedores') {{'active'}} @endif">
                      <i class="far fa-circle nav-icon"></i>
                     <p>Todos los proveedores </p>
                    </a>
                  </li>              
                  <li class="nav-item">
                    <a href="/reporteacpr" class="nav-link @if($pagina == 'Reporte de proveedores activos') {{'active'}} @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Proveedores activos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/reporteinpr" class="nav-link @if($pagina == 'Reporte de proveedores inactivos') {{'active'}} @endif ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Proveedores inactivos</p>
                    </a>
                  </li>
                  <!--finalizacion del dropdawn-->
                </ul>
              </li>
               {{-- Reporte marca --}}
               <li class="nav-item has-treeview ">{{-- menu-open --}}              
                <a href="#" class="nav-link  active">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Reportes Marca: 
                    
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/reportemc" class="nav-link @if($pagina == 'Reporte de proveedores') {{'active'}} @endif">
                      <i class="far fa-circle nav-icon"></i>
                     <p>Todos las marcas </p>
                    </a>
                  </li>              
                  <li class="nav-item">
                    <a href="/reporteacmc" class="nav-link @if($pagina == 'Reporte de proveedores activos') {{'active'}} @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>marcas agrupadas por ciudad</p>
                    </a>
                  </li>
                  
                  <!--finalizacion del dropdawn-->
                </ul>
              </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>