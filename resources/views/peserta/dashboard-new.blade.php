@extends('peserta.template')

@section('title')
    Dashboard
@endsection

@section('style')
    <link rel="stylesheet" href="asset('../assets/css/dashboard.css')">
@endsection

@section('content')
    <section id="dashboard" style="width: 90%; margin: 0 auto;">
        <div class="container dashboard-container">
            <div class="row">
                <h3>Selamat Datang, Tim {{ auth()->user()->username }}</h3>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 text-center mb-3">
                    <h3>Anggota</h3>
                </div>
            </div>
            <div>
                @if(session()->has("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get("success") }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has("error"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get("error") }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            </div>
            
            <div class="row mt-2 justify-content-evenly">
                @foreach ($team->teamDetail as $item)
                <input type="hidden" name="{{ 'idAnggota'.$loop->index }}" value="{{ $item->id }}">
                <div class="col-lg-4 mb-3 daftar-anggota">
                    <div class="row justify-content-between">
                        <div class="col-5">Nama</div>
                        <div class="col-7">{{ $item->name }}</div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-5">No HP</div>
                        <div class="col-7">{{ $item->phone_number }}</div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-5">Email</div>
                        <div class="col-7">{{ $item->email }}</div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </section>
@endsection