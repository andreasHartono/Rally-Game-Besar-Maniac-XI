<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page - @yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- cdn bootsrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- cdn ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="{{ asset('../assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">

    @yield('style')
    <link href="{{ asset('../assets/img/logo.ico') }}" rel="shorcut icon">
</head>

<body style="background-color: #eceeca" class="body">

    <nav class="navbar navbar-expand-lg navbar-light bg-light myNavbar fixed-top" id="navbar" style="transition: all .5s ease-in-out;">
        <div class="container">
            <a class="navbar-brand" href="/admin">
                <div class="brand-img">
                    <img src="{{ asset('../assets/img/logo-ubaya.png') }}" alt="Logo Ubaya">
                </div>
                <div class="brand-img">
                    <img src="{{ asset('../assets/img/logo-maniac.png') }}" alt="Logo MANIAC">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    {{-- @can('penpos')
                        <li class="nav-item">
                              <a class="nav-link{{ request()->is('admin') ? ' active' : '' }}" href="/admin">Points</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link{{ request()->is('admin/map_control/auth()->user()->id - 1') ? ' active' : '' }}" href="/admin/map_control/{{ auth()->user()->id - 1}}">Pos</a>
                        </li>
                    @endcan
                    @can('admin')
                        <li class="nav-item">
                              <a class="nav-link{{ request()->is('admin') ? ' active' : '' }}" href="{{ route('index_admin') }}">Points</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link{{ request()->is('admin/map_control') ? ' active' : '' }}" href="/admin/map_control">Pos</a>
                        </li>
                        <li class="nav-item">
                              <a class="nav-link{{ request()->is('treasure-hunt') ? ' active' : '' }}" href="/treasure-hunt">Game Besar</a>
                        </li>
                    @endcan --}}

                    @auth
                     @if (Auth::user()->status == 2) 
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin') ? ' active' : '' }}" href="/admin">Points</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin/map_control/auth()->user()->id - 1') ? ' active' : '' }}" href="/admin/map_control/{{ auth()->user()->id - 1}}">Pos</a>
                        </li>
                     @elseif (Auth::user()->status == 3)
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin') ? ' active' : '' }}" href="{{ route('index_admin') }}">Points</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('admin/map_control') ? ' active' : '' }}" href="/admin/map_control">Pos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link{{ request()->is('treasure-hunt') ? ' active' : '' }}" href="/treasure-hunt">Game Besar</a>
                        </li>
                     @endif
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Welcome, {{ auth()->user()->username }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           <li>
                              <form action="{{ url('/logout') }}" method="POST">
                                 @csrf
                                 <button class="dropdown-item" type="submit">Log Out</button>
                              </form>
                           </li>
                        </ul>
                     </li>                        
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
<script src="{{ url('/assets/js/core/jquery.min.js') }}"></script>
<script src="{{ url('/assets/js/core/popper.min.js') }}"></script>
<script src="{{ url('/assets/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ url('/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
{{-- <script src="{{ url('/assets/js/material-dashboard.js?v=2.1.2') }}"></script> --}}

@yield('javascript')

{{-- No Inspect Element --}}
{{-- <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
        if (e.keyCode == 123) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 85) {
            return false;
        }
    }
</script> --}}

<script>
    let prevScrollpos = window.pageYOffset;
    $(window).scroll(function(){
        let currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            $('#navbar').css('top', "0");
        } else {
            $('#navbar').css('top', "-80px");
        }
        prevScrollpos = currentScrollPos;
    })
</script>

</html>
