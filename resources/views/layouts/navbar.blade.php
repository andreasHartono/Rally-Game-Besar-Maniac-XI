<nav class="navbar navbar-expand-lg navbar-light myNavbar fixed-top" id="navbar" style="transition: all .5s ease-in-out">
    <div class="container">
      <a class="navbar-brand" href="{{ route('warehouse_peserta') }}">
        <div class="brand-img">
            <img src="{{ asset('../assets/img/logo-ubaya.png') }}" alt="Logo Ubaya">
        </div>
        <div class="brand-img">
            <img src="{{ asset('../assets/img/logo-maniac.png') }}" alt="Logo MANIAC">
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link{{ request()->is('peserta/warehouse') ? ' active' : '' }}" href="{{ route('warehouse_peserta') }}">Warehouse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('peserta/map') ? ' active' : '' }}" href="{{ route('map_peserta') }}">Map</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('peserta/shop') ? ' active' : '' }}" href="{{ route('shop_peserta') }}">Shop</a>
          </li>
          <li class="nav-item dropdown">
            @auth
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hello, {{ auth()->user()->username }}</a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li>
                     <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item" type="submit">Log Out</button>
                     </form>
                  </li>
               </ul>
            @endauth
          </li>
        </ul>
      </div>
    </div>
  </nav>