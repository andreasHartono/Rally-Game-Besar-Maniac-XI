<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Poin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background: #f9f9f9;">
    <div style="background: white; border-radius: 12px; margin: 20px; padding: 5px; box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
        0 32px 64px -48px rgba(0,0,0,0.5);">

        {{-- header --}}
        <div style="margin-top: 5px">
            <h1 style="text-align: center">M-Gold</h1>
        </div>
        
        <div style="margin: 10px;">
            <a class="btn btn-danger" href="../" role="button">Kembali</a>
        </div>

        {{-- tabel --}}
        <div class="table-responsive" style="margin: 10px; border-radius: 8px;">
            <table class="table table-striped table-bordered table-sm" style="text-align: center; vertical-align: middle;">
                <thead class="table-dark">
                    <tr>
                        <th class="col-1">ID Pos</th>
                        <th class="col-3">Nama Pos</th>
                        <th class="col-4">Nama Tim</th>
                        <th class="col-1">M-Gold</th>
                        <th class="col-3">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($poins as $poin)
                    <form action="/admin/updatepoin" method="POST">
                        @csrf
                        <tr>
                            @foreach ($pos as $p)
                                @if ($poin->idpos == $p->idpos)
                                    <td>{{$p->idpos}}</td>
                                    <input type="hidden" name="inputIdPos" value="{{$p->idpos}}"/> 
                                    <td>{{$p->nama}}</td>
                                    @foreach ($player as $pl)
                                        <td>{{$pl->nama}}</td>
                                    @endforeach

                                    <input type="hidden" name="inputIdPlayer" value="{{$poin->idplayers}}"/>

                                    @if (strstr($p->nama,"Fotografi") == true)
                                        @if ($poin->poin!=null)
                                            <td>
                                                Sudah
                                                {{-- <input type="text" style="width: 100px;" name="txtPoinAwal" value="{{$poin->poin}}" readonly> --}}
                                            </td>
                                        @else
                                            <td>
                                                Belum
                                                {{-- <input type="text" style="width: 100px;" name="txtPoinAwal" value="{{$poin->poin}}" readonly> --}}
                                            </td>
                                        @endif
                                        <td>
                                            @if ($poin->poin!=null)
                                                {{-- masukif --}}
                                                <input type="radio" id="sudah" name="txtInputPoin" value="0" checked>
                                                <label for="sudah">Sudah</label>
                                                <input type="radio" id="belum" name="txtInputPoin" value="">
                                                <label for="belum">Belum</label>
                                            @else
                                                {{-- masuk else --}}
                                                <input type="radio" id="sudah" name="txtInputPoin" value="0">
                                                <label for="sudah">Sudah</label>
                                                <input type="radio" id="belum" name="txtInputPoin" value="" checked>
                                                <label for="belum">Belum</label>
                                            @endif
                                            <button class="btn btn-outline-success" type="submit" onclick="return confirm('Pastikan nama pos, nama tim, dan jumlah poin benar')">Update poin</button>
                                        </td>
                                    @else
                                        <td>
                                            {{-- <input type="text" style="width: 100px;" name="txtPoinAwal" value="{{$poin->poin}}" readonly> --}}
                                            {{$poin->poin}}
                                            <input type="hidden" name="txtPoinAwal" value="{{$poin->poin}}"/>
                                        </td>
                                        <td>
                                            <div class="input-group mb-3" style="height: 20px;">
                                                <input type="number" class="form-control" style="width: 25px;" placeholder="Masukan poin" name="txtInputPoin">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-success" type="submit" onclick="return confirm('Pastikan nama pos, nama tim, dan jumlah poin benar')">Update poin</button>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                @endif
                            @endforeach
                        </tr>
                    </form>     
                    @endforeach
                <tbody>
            </table>
        </div>
    </div>
</body>
</html>