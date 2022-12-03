@extends('peserta.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('../assets/css/shop.css') }}">
	
@endsection

@section('content')
    <div class="content">
        {{-- Tabel Items --}}
        <div class="row my-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3 class="card-title ">Team Items</h3>
                    </div>
                    <div class="card-body" >
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary" style='display: table; table-layout: fixed; width: 100%; text-align: center'>
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Amount</th>
                                </thead>
                                <tbody id="tbody-item">
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
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon shadow" style="background: #a0583a">
                            <img src="{{url('assets/img/monyx.png')}}" alt="Logo Maniac" width="50px">
                        </div>
                        {{-- <p class="card-category">Monyx</p> --}}
                        <h3 class="card-title pt-3" id="monyx">
                            {{$peserta_view[0]->monyx}} Monyx
                        </h3>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        {{-- End Of Tabel Items --}}
        <div class="container-fluid d-flex justify-content-center">
            <div class="bd-highlight m-0 mb-0" style="flex-basis: 100%;">
                <div class="row gap-2">
                    <div class="col-lg-4 col-md-6 col-sm-12 card mb-3">
                        <div class="card-body">
                            <img src="{{ url('assets/img/shop-shovel.png') }}" alt="Shovel" class="mt-2 mb-2">
                            <h3 class="card-title fw-bolder text-start" id="item1">Shovel</h3>
                            <p class="h4 text-start"><span class="monyx"><img src="{{ url('assets/img/monyx.png') }}"
                                        alt=""></span> 50</p>
                            <br>
                            <p class="text-start">Menggali tanah yang ada di posisi player</p>
                        </div>
                        <div class="card-footer mb-3 d-flex justify-content-around">
                            <input style="font-size: 20px; display:inline-block;" type="number" name="txtJumlah" id="qt1" value="1"
                                min="1" class="form-control txt-jumlah">
                            <button class="btn btn-buy" onclick="showInfo(1)" href="#modalCek" data-toggle="modal" type="button"
                                style="display:block;" >
                                <span class="h4 fw-bold">Buy</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 card mb-3">
                        <div class="card-body">
                            <img src="{{ url('assets/img/shop-scanner.png') }}" alt="Scanner" class="mt-2 mb-2">
                            <h3 class="card-title fw-bolder text-start" id="item2">Scanner</h3>
                            <p class="h4 text-start"><span class="monyx"><img src="{{ url('assets/img/monyx.png') }}"
                                        alt=""></span> 75</p>
                            <br>
                            <p class="text-start">Scan emas 5 kotak player (atas, bawah, kanan, kiri, tengah)</p>
                            <p class="text-start">Keterangan: Apabila ada emas yang terpindai, maka sistem akan menampilkan
                                pesan saja tanpa memberitahukan letak sebenarnya</p>
                        </div>
                        <div class="card-footer mb-3 d-flex justify-content-around">
                            <input style="font-size: 20px; display:inline-block;" type="number" name="txtJumlah" id="qt2" value="1"
                                min="1" class="form-control txt-jumlah">
                            <button class="btn btn-buy" onclick="showInfo(2)" href="#modalCek" data-toggle="modal" type="button"
                                style="display:block;">
                                <span class="h4 fw-bold">Buy</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 card mb-3">
                        <div class="card-body">
                            <img src="{{ url('assets/img/shop-mini-scanner.png') }}" alt="Mini Scanner" class="mt-2 mb-2">
                            <h3 class="card-title fw-bolder text-start" id="item3">Mini Scanner</h3>
                            <p class="h4 text-start"><span class="monyx"><img src="{{ url('assets/img/monyx.png') }}"
                                        alt=""></span> 25</p>
                            <br>
                            <p class="text-start">Scan emas hanya 1 kotak tepat pada posisi player</p>
                        </div>
                        <div class="card-footer mb-3 d-flex justify-content-around">
                            <input style="font-size: 20px; display:inline-block;" type="number" name="txtJumlah" id="qt3" value="1"
                                min="1" class="form-control txt-jumlah">
                            <button class="btn btn-buy" onclick="showInfo(3)" href="#modalCek" data-toggle="modal" type="button"
                                style="display:block;">
                                <span class="h4 fw-bold">Buy</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 card mb-3">
                        <div class="card-body">
                            <img src="{{ url('assets/img/shop-pickaxe.png') }}" alt="Pickaxe" class="mt-2 mb-2">
                            <h3 class="card-title fw-bolder text-start" id="item4">Pickaxe</h3>
                            <p class="h4 text-start"><span class="monyx"><img src="{{ url('assets/img/monyx.png') }}"
                                        alt=""></span> 25</p>
                            <br>
                            <p class="text-start">Menghancurkan batu di posisi player</p>
                        </div>
                        <div class="card-footer mb-3 d-flex justify-content-around">
                            <input style="font-size: 20px; display:inline-block;" type="number" name="txtJumlah" id="qt4" value="1"
                                min="1" class="form-control txt-jumlah">
                            <button class="btn btn-buy" onclick="showInfo(4)" href="#modalCek" data-toggle="modal" type="button"
                                style="display:block;">
                                <span class="h4 fw-bold">Buy</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 card mb-3">
                        <div class="card-body">
                            <img src="{{ url('assets/img/shop-thief-bag.png') }}" alt="Thief bag" class="mt-2 mb-2">
                            <h3 class="card-title fw-bolder text-start" id="item5">Thief Bag</h3>
                            <p class="h4 text-start"><span class="monyx"><img src="{{ url('assets/img/monyx.png') }}"
                                        alt=""></span> 200</p>
                            <br>
                            <p class="text-start">Mengambil 25% emas lawan jika digunakan di tempat yang sama dengan lawan</p>
                            <p class="text-start">Keterangan: Harus dalam kotak yang sama</p>
                        </div>
                        <div class="card-footer mb-3 d-flex justify-content-around">
                            <input style="font-size: 20px; display: inline-block;" type="number" name="txtJumlah" id="qt5" value="1"
                                min="1" class="form-control txt-jumlah">
                            <button class="btn btn-buy" onclick="showInfo(5)" href="#modalCek" data-toggle="modal" type="button"
                                style="display:block;">
                                <span class="h4 fw-bold">Buy</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Notification --}}
        <div class="alert alert-success fw-bold" id="success-note" style="display:none; letter-spacing: 0.5px;"></div>

        {{-- Modal Lama --}}
        {{-- Modal Submit --}}
        <div class="modal fade" id="modalCek" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fw-bold">Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                        <div><span id="informasi">INFO</span></div>
                        <p><input type="hidden" id="item-name" value=""></p>
                        <p><input type="hidden" id="item-amount" value=""></p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger fw-bold text-light" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary fw-bold text-light" data-dismiss="modal"
                            onclick="buyItem()">Buy</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Of Modal Submit --}}
    </div>

    
@endsection

@section('javascript')
    {{-- Ini JS dari Tahun Kemarin --}}
    <script>
        $(document).ready(function() {
            $('#shop').addClass("active");
        });

        const showInfo = (index) =>{
            let item = null
            let amount = null
            if(index == 1){
                item = $(`#item1`).text()
                amount = $(`#qt1`).val()
            }
            else if(index == 2){
                item = $(`#item2`).text()
                amount = $(`#qt2`).val()
            }
            else if(index == 3){
                item = $(`#item3`).text()
                amount = $(`#qt3`).val()
            }
            else if(index == 4){
                item = $(`#item4`).text()
                amount = $(`#qt4`).val()
            }
            else if(index == 5){
                item = $(`#item5`).text()
                amount = $(`#qt5`).val()
            }
            $(`#informasi`).text(amount +  " x - " +  item)
            $(`#item-name`).val(item)
            $(`#item-amount`).val(amount)
        }

        const buyItem = () => {
            let name = $(`#item-name`).val()
            let amount = $(`#item-amount`).val()

            $.ajax({
                type: 'POST',
                url: '{{ route("buy-item") }}',
                data: {
                    '_token': '<?php echo csrf_token() ?>',
                    'name': name,
                    'amount': amount
                },
                success: function(data) {
                    // alert(data.message)
                    if (data.status === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: data.message
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: data.message
                        });
                    }
                    
                    amount = $(`#qt1`).val(1)
                    amount = $(`#qt2`).val(1)
                    amount = $(`#qt3`).val(1)
                    amount = $(`#qt4`).val(1)
                    amount = $(`#qt5`).val(1)
                    monyx = $(`#monyx`).text(data.monyx + " Monyx")

                    //update table team items
                    let counter = 1;
                    $(`#tbody-item`).empty()
                    data.item_name.forEach((item,index) => {
                        $(`#tbody-item`).append(`
                                <tr style="display: table; table-layout: fixed; width: 100%; text-align: center">
                                    <td class="border-0 text-center align-middle">${ counter++ }</td>
                                    <td class="border-0 text-center align-middle">${ item }
                                    </td>
                                    <td class="border-0 text-center align-middle">
                                        ${ data.item_amount[index]}</td>
                                </tr>
                        `)
                    })

                },
                error: function(error) {
                    // alert(error.message)
                    Swal.fire({
                        icon: 'error',
                        title: error.message
                    });
                }
            })
        }
    </script>
@endsection
