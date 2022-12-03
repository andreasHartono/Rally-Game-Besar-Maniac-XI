@extends('peserta.template')

@section('style')
    <link href="{{url('/assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('../assets/css/navbar.css') }}">

    <style>
        .table {
            color: transparent !important;
        }
    </style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        {{-- Info Pemain --}}
        {{-- @php($denda=0)
        @foreach ($pelanggaran_view as $item)
            @php
                $denda += $item->minus_poin;
            @endphp  
        @endforeach --}}
        @foreach ($peserta_view as $item)
            
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon shadow" style="background: #a0583a">
                            <img src="{{url('assets/img/monyx.png')}}" alt="Logo Maniac" width="50px" height="50px">
                        </div>
                        <p class="card-category">Monyx</p>
                        <h3 class="card-title">
                            {{$item->monyx}} <small>Monyx</small>
                        </h3>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon shadow" style="background: #a0583a">
                            <img src="{{url('assets/img/gold-bar.png')}}" alt="Logo Maniac" width="50px">
                        </div>
                        <p class="card-category">Gold</p>
                        <h3 class="card-title">{{ $gold }} <small>Gold</small>
                        </h3>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        @endforeach
        {{-- End Of Info Pemain --}}
        

        {{-- Tabel Items --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Team Items</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary" style='display: table; table-layout: fixed; width: 100%; text-align: center'>
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Amount</th>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1
                                    @endphp
                                    @foreach ($item_name as $index=> $item)
                                    <tr style="display: table; table-layout: fixed; width: 100%; text-align: center">
                                        <td class="border-0 text-center align-middle">{{ $i++ }}</td>
                                        <td class="border-0 text-center align-middle">{{ $item }}
                                        </td>
                                        <td class="border-0 text-center align-middle">
                                            {{ $item_amount[$index]}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        {{-- End Of Tabel Items --}}


        {{-- Tabel Poin --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Pos Table</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary" style='display: table; table-layout: fixed; width: 100%; text-align: center'>
                                    <th>No</th>
                                    <th>Pos</th>
                                    <th>Monyx</th>
                                    <th>Artefak</th>
                                </thead>
                                <tbody>
                                    @php($nomor=1)
                                    @foreach ($poin_view as $index=>$item)
                                        @if ($item->pos_id <= 12)
                                            <tr style='display: table; table-layout: fixed; width: 100%; text-align: center'>
                                                <td>{{$nomor}}</td>
                                                @foreach ($pos as $p)
                                                    @if ($item->pos_id == $p->id)
                                                        <td>{{$p->nama}}</td>
                                                    @endif
                                                @endforeach
                                                <td class="text-primary">{{$item->poin}}</td>

                                                @foreach ($artifacts as $a)
                                                    @if ($artefak[$index]->artifact_id == $a->id)
                                                        <td class="text-primary">
                                                            <img src="{{asset('artefak/'.$a->gambar)}}" alt="" width="100" height="100">
                                                        </td>   
                                                    @endif
                                                @endforeach                                                 
                                            </tr>
                                            @php($nomor++)
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        {{-- End Of Tabel Poin --}}

        {{-- Tabel M-Keys --}}
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Dungeon</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary" style='display: table; table-layout: fixed; width: 100%; text-align: center;'>
                                    <th>No</th>
                                    <th>Pos</th>
                                    <th>Monyx</th>
                                    <th>Selesai</th>
                                </thead>
                                <tbody>
                                    @php($nomor=1)
                                    @foreach ($poin_view as $item)
                                        @if ($item->pos_id > 12)
                                            <tr style='display: table; table-layout: fixed; width: 100%; text-align: center;'>
                                                <td>{{$nomor}}</td>
                                                @foreach ($pos as $p)
                                                    @if ($item->pos_id == $p->id)
                                                        <td>{{$p->nama}}</td>
                                                        <td class="text-primary">{{$item->poin}}</td>
                                                        <td>
                                                            <input type="checkbox" class="form-check-input" style="margin-top:-5px" checked disabled>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            @php($nomor++)
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        {{-- End Of Tabel M-Key --}}

        {{-- Tabel Pelanggaran --}}
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Tabel Pelanggaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if($pelanggaran_view->count()==0)
                                <div class="py-2" style="text-align: center">
                                    <h3>Kamu belum melakukan pelanggaran.</h3>
                                </div>
                            @else
                            <table class="table">
                                <thead class=" text-primary" style='display: table; table-layout: fixed; width: 100%; text-align: center'>
                                    <th>No</th>
                                    <th>Pelanggaran</th>
                                   
                                </thead>
                                <tbody>
                                    @php($nomor=1)
                                    @foreach ($pelanggaran_view as $item)
                                        <tr style='display: table; table-layout: fixed; width: 100%; text-align: center'>
                                            <td>{{$nomor}}</td>
                                            <td>{{$item->nama}}</td>
                                            
                                        </tr>
                                        @php($nomor++)
                                    @endforeach
                                </tbody>
                            </table>                     
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- End Of Tabel Pelanggaran --}}
    </div>     
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('#warehouse').addClass("active");
    });
</script>    
@endsection