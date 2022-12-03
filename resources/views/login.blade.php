<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANIAC X</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Material Kit CSS -->
    <link href="{{url('/assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
    <style>
       @font-face{
    		font-family:"ttrounds-black--_";
    		src:url("assets/font/TTRounds/TTRounds-Black.ttf") format("woff"),
    		url("assets/font/TTRounds/TTRounds-Black.ttf") format("opentype"),
    		url("assets/font/TTRounds/TTRounds-Black.ttf") format("truetype");

            font-family:"ttrounds-regular--_";
    		src:url("assets/font/TTRounds/TTRounds-Regular.ttf") format("woff"),
    		url("assets/font/TTRounds/TTRounds-Regular.ttf") format("opentype"),
    		url("assets/font/TTRounds/TTRounds-Regular.ttf") format("truetype");
		}
        *
        {
            font-family: 'ttrounds-regular--_';
        }
    </style>
</head>
<body style="background: #210E40">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div id="app">
        
        <main class="py-4 pt-5">
            
            <div class="container">
                
                <div class="row justify-content-center text-center"><br>
                    <div class="logo">
                        <img src="{{url('assets/img/maniac.png')}}" alt="Logo Maniac" style="max-height: 150px">
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title h3 fw-bold m-0">Login Now, Travellers!</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="/playerlogin">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right"><h4 class="card-title h4 fw-bold m-0">Email :</h4></label>

                                        <div class="col-md-6">
                                            <input id="email" style="padding-left:10px" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="margin-bottom:10px;">
                                        <label for="password" class="col-md-4 col-form-label text-md-right"><h4 class="card-title h4 fw-bold m-0">Password :</h4></label>

                                        <div class="col-md-6">
                                            <input id="password" style="padding-left:10px" type="password" class="form-control" name="password" required autocomplete="current-password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success" style="display:block; margin:auto; width:200px; font-weight:bold; font-size:14px;">
                                        LOGIN
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>