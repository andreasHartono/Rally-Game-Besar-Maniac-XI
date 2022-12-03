@extends('peserta.template')

@section('content')
<div class="content" style="display: flex; align-items: center;">
    <div class="container-fluid">
        <div class="d-flex flex-wrap" style="display: flex; justify-content: center;">
           
          
            {{-- Warehouse --}}
            <div class="p-4 bd-highlight m-0 mb-0" style="flex-basis: 30%; text-align: center">
                <a href="{{ route('warehouse_peserta') }}">
                    <div class="card card-chart pb-4 m-0 card-dash">
                        <img src="{{url('/assets/img/Warehouse.svg')}}" alt="Warehouse" class="w-100">
                        <div class="w-100"><span class="h3 fw-bold">Warehouse</span></div>
                    </div>
                </a>
            </div>

            {{-- Shop --}}
            <div class="p-4 bd-highlight m-0 mb-0" style="flex-basis: 30%; text-align: center">
                <a href="{{ route('shop_peserta') }}">
                    <div class="card card-chart pb-4 m-0 card-dash">
                        <img src="{{url('/assets/img/Shop.svg')}}" alt="Shop" class="w-100">
                        <div class="w-100"><span class="h3 fw-bold">Shop</span></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>          
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('#dashboard').addClass("active");
    });
</script>
@endsection