<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @foreach ($pelanggaranEdit as $item)
    <form action="/admin/pelanggaran/update" method="post">
        @csrf
        <label>ID: </label>
        <input type="text" value="{{$item->idpelanggarans}}" name="txtId" readonly><br>
        <label>Nama: </label><br>
        <input type="text" value="{{$item->nama}}" name="txtNama"><br>
        <label>Minus : </label><br>
        <input type="number" value="{{$item->minus_poin}}" name="txtMinusPoin"><br><br>

        <button type="submit" onclick="parent.closeEdit();" class="btn btn-primary">Update</button>
        <a href='/admin/pelanggaran/delete/{{$item->idpelanggarans}}' onclick="parent.closeEdit();" class="btn btn-danger">Delete</a>
    </form>
    @endforeach
</body>
</body>
</html>