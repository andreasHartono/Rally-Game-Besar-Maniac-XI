<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            MANIAC XI
        </title>
        <link href="{{ asset('../assets/img/logo.ico') }}" rel="shorcut icon">
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="{{ asset('../assets/css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        

        <!-- Fonts and icons -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

        {{-- Sweet Alert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- CSS Files -->
        {{-- <link href="{{url('/assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" /> --}}

        @yield('style')
      

        <style>

        .card-dash {
        transition: 0.4s;
        }

        .card-dash:hover {
            transform: scale(1.1);
            cursor: pointer; 
        }

        .logo img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
        }
        </style>
    </head>
    <body style="background-color: #eceeca; min-height: 90vh" class="body">
        <div class="">
            @include('layouts.navbar')
            <div class="container" style="margin-top: 100px;">
                @yield('content')
            </div>
        </div>         


        {{-- Core JS Files --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{url('/assets/js/core/jquery.min.js')}}"></script>
        <script src="{{url('/assets/js/core/popper.min.js')}}"></script>
        <script src="{{url('/assets/js/core/bootstrap-material-design.min.js')}}"></script>
        <script src="{{url('/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
        {{-- <script src="{{url('/assets/js/material-dashboard.js?v=2.1.2')}}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        @yield('javascript')

        {{-- No Inspect Element --}}
        <script>
            document.addEventListener('contextmenu', event => event.preventDefault());
            document.onkeydown = function (e) {
                if(e.keyCode == 123) { return false; }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 73){ return false; }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 74) { return false; }
                if(e.ctrlKey && e.keyCode == 85) { return false; }
            }

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
    </body>

</html>