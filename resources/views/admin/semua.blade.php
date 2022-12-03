@extends('admin.templates.template')

@section('title')
    All Players
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <style>
        .clickable-td {
            color: blue; 
            text-decoration:underline; 
            cursor: pointer;
            transition: all .5s ease-in-out;
        }
        .clickable-td:hover {
            color: rgb(5, 5, 145);
        }

        td {
            font-weight: 500;
        }
    </style>
@endsection

@section('content')
    <div class="table-responsive" style="margin: 100px 0 100px 0; border-radius: 8px;">
        <h3 class="card-title fw-bolder text-center" id="item4">{{ $nama }}</h3>
        
        <table class="table table-striped table-bordered table-hover" id="tablePoin" style="text-align: center; vertical-align: middle;">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Tim</th>
                <th>Monyx</th>
                <th>Poin Rally</th>
                <th>Poin Gambes</th>
                @if (auth()->user()->status == 3)
                    <th onclick="sortByTotalPoin()" class="clickable-td">
                        Total
                    </th>
                @elseif (auth()->user()->status == 2)
                    <th>Total</th>
                @endif
                
                @if (auth()->user()->status == 2)
                    <th >Opsi 1</th>
                @endif
                {{-- <th>Opsi 2</th> --}}
            </tr>
            </thead>
            <tbody>
                @foreach ($players as $index=>$p)
                    <tr>
                        <td >{{$p->id-16}}</td>
                        <td>
                            <div>{{$p->nama_tim}}</div>
                        </td>
                        <td>
                            <div><span id="tim-monyx-{{$p->id}}">{{$p->monyx}}</span></div>
                        </td>
                        <td>
                            
                            <div><span id="tim-poin-{{$p->id}}">{{$p->pos->sum('pivot.poin')}}</span></div>
                        </td>
                        <td>
                            
                            <div><span id="tim-gambes-{{$p->id}}">{{$gamebes[$index]->poin}}</span></div>
                        </td>
                        <td>
                            @php
                                $poinRally = $p->pos->sum('pivot.poin');
                                $poinGamebes = $gamebes[$index]->poin;
                                $poinTotal = ($poinRally * 0.4) + ($poinGamebes * 0.6);
                            @endphp
                            <div><span id="tim-total-{{$p->id}}">{{ $poinTotal }}</span></div>
                        </td>
                        @if (auth()->user()->status == 2)
                            <td>
                                <div>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalTambah"
                                    onclick="showInput({{ $p->id }})" class="myBtn"> Tambah Monyx</button>
                                </div>
                            </td>
                        @endif
                        {{-- <td><a href="{{ url('/admin/pelanggaran/'.$p->id) }}" class="btn btn-danger">Pelanggaran</a></td> --}}
                    </tr>
                @endforeach
            <tbody>
        </table>
                    
        <!-- Modal Tambah Monyx -->
        <div class="modal fade" id="modalTambah" aria-hidden="true" aria-labelledby="modalTambahMonyx"
        tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="tim-mon">TAMBAH MONYX</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="monyx" class="col-sm-2 col-form-label">Monyx</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="monyx">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-success"id="btnTambahMonyx" onclick = "addMonyx()">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        //tambah monyx
        const addMonyx = () => {
            let team_id = $(`#tim-mon`).val()
            let monyx = $(`#monyx`).val()

            Swal.fire({
                title: "Yakin tambah " + monyx + " Monyx?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Tambah',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("tambah-monyx") }}',
                        data: {
                            '_token': '<?php echo csrf_token() ?>',
                            'team_id': team_id,
                            'monyx': monyx
                        },
                        success: function(data) {
                            if (data.status == 'success') Swal.fire(data.message, '', 'success');
                            else Swal.fire(data.message, '', 'error');
                            $(`#monyx`).val(null);
                            $(`#tim-poin-${team_id}`).text(data.new_poin);
                            $(`#tim-monyx-${team_id}`).text(data.new_monyx);
                            $(`#modalTambah`).modal('hide');
                        },
                        error: function(error) {
                            Swal.fire(error.message, '', 'error');
                        }
                    })
                }
            })
        }
        
        const showInput = (id) =>{
            let team_id = id-16
            $(`#tim-mon`).text("TAMBAH MONYX TIM " + team_id)
            $(`#tim-mon`).val(id)
        }

        function sortByTotalPoin() {
            let table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById('tablePoin');
            switching = true;
            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i< (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[5];
                    y = rows[i + 1].getElementsByTagName("TD")[5];
                    if (Number(x.children[0].children[0].innerHTML) < Number(y.children[0].children[0].innerHTML)) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>
@endsection