<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit M-Key</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-2-sm"></div>
            <div class="col-6-sm text-center"><form action="/admin/updatekey" method="POST">
                @csrf
                <label>ID Player : {{$player->idplayers}}</label><input name="txtIdPlayer" type="hidden" value="{{$player->idplayers}}" readonly><br>
                <label>Nama : {{$player->nama}}</label><br>
                <label>M-Keys : </label><br><input name="txtNewKey" type="number" value="{{$player->keys}}"><br>
                <button type="submit">Submit</button>
            </form></div>
            <div class="col-2-sm"></div>

        </div>
    </div>
</body>
</html>