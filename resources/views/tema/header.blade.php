<div id="app">
  <div  style="text-align: center; ">
    <div class="row "  style=" background-image: url('{{asset('asset/adminlte/dist/img/Egzon_Bytyqi.jpeg')}}') ; color: ivory; height: 7em; ">
      <div class="@guest
                  col-sm-12
                  @else
                  col col-md-10 offset-md-2
                  @endguest " 
            >
        <h1 class="p-4"><b>{{$namepage}}</b></h1>
      </div>
    </div>
  </div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-orange navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#">
            <i class="fas fa-bars"></i>
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a class="navbar-brand" href="@guest{{ url('/') }} @else {{ url('/home') }}@endguest">
            {{ $namepage }}
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          @if($pagina ?? '')
            <h3 style="color: aliceblue;">/ {{$pagina ?? ''}}</h3>
          @endif
        </li>
      </ul>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        {{-- ver perfil --}}
                          <a class="dropdown-item"  href="/usuario/perfil/{{ Auth::user()->id }}"onclick="event.preventDefault();
                            document.getElementById('perfil-form').submit();">
                              {{ __('Ver Perfil') }}
                          </a>
                        {{-- cerrar sesión --}}
                          <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                              {{ __('Cerrar sesión') }}
                          </a>
                          
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                          <form id="perfil-form" action="/usuario/perfil/{{ Auth::user()->id }}" method="GET" style="display: none;">
                            @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        @guest
        @else
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">
                15
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-user mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider">

              </div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
        @endguest
      </ul>
  </nav>
</div>