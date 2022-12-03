<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pelanggaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1>Pelanggaran</h1>

    <a href="{{$idplayer}}/tambah">+ Tambah pelanggaran</a>

    <table class="table">
        <tr>
            <th>ID Pelanggaran</th>
            <th>Nama</th>
            <th>Minus</th>
            <th>ID Player</th>
            <th>Opsi</th>
        </tr>
        @foreach ($pelanggarans as $plg)
            <tr>
                <td>{{$plg->idpelanggarans}}</td>
                <td>{{$plg->nama}}</td>
                <td>{{$plg->minus_poin}}</td>
                <td>{{$plg->idplayers}}</td>
                <td><a id="link_edit" onclick="openEdit({{$plg->idpelanggarans}})"  style="cursor: pointer; color:blue; text-decoration:underline;">Edit</a></td>
                
            </tr>
            <div id="edit{{$plg->idpelanggarans}}" style="background-color: rgba(150, 150, 150, 0.5); overflow: hidden; position: fixed; left: 0px; top: 0px; bottom: 0px; right: 0px; z-index: 1000; display:none;">
                <div style="background-color: rgb(255, 255, 255); width: 400px; height:400px; position: static; margin: 20px auto; padding: 20px 30px 0px; top: 110px; overflow: hidden; z-index: 1001; box-shadow: 0px 3px 8px rgba(34, 25, 25, 0.4); display:flex; flex-direction:column; align-items:center; justify-content:center;">
                    <iframe src="/admin/pelanggaran/edit/{{$plg->idpelanggarans}}" width="200" height="300">></iframe>
                    <button onclick="closeEdit({{$plg->idpelanggarans}})" style="margin-top:50;" class="btn btn-secondary">Close</button>
                </div>
                
            </div>
        @endforeach
    </table>
</body>
<script>
    function openEdit(id)
    {
        document.getElementById(`edit${id}`).style.display = 'block';
    }

    function closeEdit(id)
    {
        document.getElementById(`edit${id}`).style.display = 'none';
        setTimeout(reload, 500);
    }

    function reload() 
    {
        document.location.reload();
    }
</script>
</html>