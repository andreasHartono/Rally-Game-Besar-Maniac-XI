@extends('admin.templates.template')

@section('title')
    All Players
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
@endsection

@section('content')
    <div class="table-responsive" style="margin: 110px 0; border-radius: 8px;">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pos</th>
                    <th>Status</th>
                    <th>Link Zoom</th>
                    <th>ID Zoom</th>
                    <th>Pass Zoom</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($data as $key => $dataPos)
                  <tr>
                     <td>{{ $dataPos->nama }}</td>
                     <td id="status">{{ $dataPos->status }}</td>
                     <td>{{ $dataPos->linkZoom }}</td>
                     <td>
                        <input type="hidden" name="id" value="">
                        <button class="btn btn-warning" id="bukabtn">Buka Pos</button>
                        <button class="btn btn-danger" id="tutupbtn">Tutup Pos</button>
                        <button class="btn btn-info">Update Link Zoom</button>
                     </td>
                  </tr>
               @endforeach --}}
               @php $count = 1; @endphp
                @foreach ($data as $item)
                <tr>
                    <td class="text-center">{{ $count }}</td>
                    <td>{{ $item['nama'] }} 
                        @if ($item['zoom2'] == 1) 
                            - 1
                        @endif
                    </td>
                    <td id="status_{{ $item['id'] }}">
                        @if ($item['status'] == 'Open')
                            <span class="badge rounded-pill bg-success">{{ $item['status'] }}</span>
                        @elseif($item['status'] == 'Close')
                            <span class="badge rounded-pill bg-danger">{{ $item['status'] }}</span>
                        @else 
                            <span class="badge rounded-pill bg-warning">{{ $item['status'] }}</span>
                        @endif
                    </td>
                    <td id="td_linkZoom_{{ $item['id'] }}">
                        <a href="{{ $item['linkZoom'] }}" target="_blank">{{ $item['linkZoom'] }}</a>
                    </td>
                    <td id="td_idZoom_{{ $item['id'] }}">
                        {{ $item['idZoom'] }} <!-- Tambahin clipboard dan animasi centang kalo sudah di copy ya-->
                    </td>
                    <td id="td_passZoom_{{ $item['id'] }}">
                        {{ $item['passZoom'] }}  <!-- Tambahin clipboard dan animasi centang kalo sudah di copy ya-->
                    </td>
                    <td class="d-flex justify-content-between flex-wrap">
                        @if ($item['id'] <= 3)
                            <button class="btn btn-success" onclick="openMap({{ $item['id'] }}, 1)" style="flex-basis: 30%">Buka Pos</button>
                            <button class="btn btn-warning" onclick="mapWaiting({{ $item['id'] }}, 1)" style="flex-basis: 30%">Menunggu</button>  
                            <button class="btn btn-danger" onclick="closeMap({{ $item['id'] }}, 1)" style="flex-basis: 30%">Tutup Pos</button>                   
                        @else 
                            <button class="btn btn-success" onclick="openMap({{ $item['id'] }}, 1)" style="flex-basis: 48%">Buka Pos</button>
                            <button class="btn btn-danger" onclick="closeMap({{ $item['id'] }}, 1)" style="flex-basis: 48%">Tutup Pos</button>
                        @endif
                        <a class="btn myBtn mt-1" href="#modalUpdate" data-toggle='modal'
                            onclick="getEditLink({{ $item['id'] }}, 1)" style="flex-basis: 100%">Update Link Zoom</a>
                    </td>
                    @php $count++; @endphp
                </tr>
                @if ($item['zoom2'] == 1) 
                <tr>
                    <td class="text-center">{{ $count }}</td>
                    <td>{{ $item['nama'] }} - 2</td>
                    <td id="status_{{ $item['id'] }}_2">
                        @if ($item['status2'] == 'Open')
                            <span class="badge rounded-pill bg-success">{{ $item['status2'] }}</span>
                        @elseif($item['status2'] == 'Close')
                            <span class="badge rounded-pill bg-danger">{{ $item['status2'] }}</span>
                        @else
                            <span class="badge rounded-pill bg-warning">{{ $item['status2'] }}</span>
                        @endif
                    </td>
                    <td id="td_linkZoom_{{ $item['id'] }}_2">
                        <a href="{{ $item['linkZoom'] }}" target="_blank">{{ $item['linkZoom2'] }}</a>
                    </td>
                    <td id="td_idZoom_{{ $item['id'] }}_2">
                        {{ $item['idZoom2'] }} <!-- Tambahin clipboard dan animasi centang kalo sudah di copy ya-->
                    </td>
                    <td id="td_passZoom_{{ $item['id'] }}_2">
                        {{ $item['passZoom2'] }}  <!-- Tambahin clipboard dan animasi centang kalo sudah di copy ya-->
                    </td>
                    <td class="d-flex justify-content-between flex-wrap">
                        @if ($item['id'] <= 3)
                            <button class="btn btn-success" onclick="openMap({{ $item['id'] }}, 2)" style="flex-basis: 30%">Buka Pos</button>
                            <button class="btn btn-warning" onclick="mapWaiting({{ $item['id'] }}, 2)" style="flex-basis: 30%">Menunggu</button>  
                            <button class="btn btn-danger" onclick="closeMap({{ $item['id'] }}, 2)" style="flex-basis: 30%">Tutup Pos</button>                   
                        @else 
                            <button class="btn btn-success" onclick="openMap({{ $item['id'] }}, 2)" style="flex-basis: 48%">Buka Pos</button>
                            <button class="btn btn-danger" onclick="closeMap({{ $item['id'] }}, 2)" style="flex-basis: 48%">Tutup Pos</button>
                        @endif
                        
                        <a class="btn myBtn mt-1" href="#modalUpdate" data-toggle='modal'
                            onclick="getEditLink({{ $item['id'] }}, 2)" style="flex-basis: 100%">Update Link Zoom</a>
                    </td>
                    @php $count++; @endphp
                </tr>
                @endif

                @endforeach
            </tbody>
        </table>

        {{-- Modal Update Link Zoom --}}
        <div class="modal fade" id="modalUpdate" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" id="modalContent">
                </div>
            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.23/dist/sweetalert2.all.min.js"></script>
    <script>
        function openMap(id, pos) {
            $.ajax({
                type: 'POST',
                url: '{{ route('map_admin_update') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'hasil': "Open",
                    'pos': pos
                },
                success: function(data) {
                  if(data.status == 'ok') {
                     if (pos == 1) $("#status_"+id).html(`<span class="badge rounded-pill bg-success">` + data.msg + `</span>`);
                     if (pos == 2) $("#status_"+id+"_2").html(`<span class="badge rounded-pill bg-success">` + data.msg + `</span>`);
                     Swal.fire({
                           position: 'top-center',
                           icon: 'success',
                           title: 'Success Open Pos '+ id,
                           text: 'Pos ' + id + ' berhasil di Buka kembali'
                     });
                  }
                    
                }
            });
        }

        function mapWaiting(id, pos) {
            $.ajax({
                type: 'POST',
                url: '{{ route('map_admin_update') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'hasil': "Waiting",
                    'pos': pos
                },
                success: function(data) {
                  if(data.status == 'ok') {
                     console.log(data.msg);
                     if (pos == 1) $("#status_"+id).html(`<span class="badge rounded-pill bg-warning">` + data.msg + `</span>`);
                     if (pos == 2) $("#status_"+id+"_2").html(`<span class="badge rounded-pill bg-warning">` + data.msg + `</span>`);
                     Swal.fire({
                           position: 'center',
                           icon: 'success',
                           title: 'Success Ubah Status "Waiting" Pos '+ id,
                           text: 'Pos ' + id + ' sedang menunggu lawan'
                     });
                  }
                    
                }
            });
        }

        function closeMap(id, pos) {
            $.ajax({
                type: 'POST',
                url: '{{ route('map_admin_update') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'hasil': "Close",
                    'pos': pos
                },
                success: function(data) {
                  if(data.status == 'ok') {
                     console.log(data.msg);
                     if (pos == 1) $("#status_"+id).html(`<span class="badge rounded-pill bg-danger">` + data.msg + `</span>`);
                     if (pos == 2) $("#status_"+id+"_2").html(`<span class="badge rounded-pill bg-danger">` + data.msg + `</span>`);
                     Swal.fire({
                           position: 'center',
                           icon: 'success',
                           title: 'Success Close Pos '+ id,
                           text: 'Pos ' + id + ' telah berhasil di Tutup'
                     });
                  }
                    
                }
            });
        }

        function getEditLink(id, pos) {
            $.ajax({
                type: 'POST',
                url: '{{ route('penpos.getLinkZoom') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'pos': pos
                },
                success: function(data) {
                    $('#modalContent').html(data.msg);
                    console.log(data);
                }
            })
        }

        function updateLinkZoom(id, pos) {
            var eLink = $('#elinkZoom').val();
            var eId = $('#eidZoom').val();
            var ePass = $('#epassZoom').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('penpos.updateLinkZoom') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'linkZoom': eLink,
                    'idZoom':eId,
                    'passZoom':ePass,
                    'pos':pos
                },
                success: function(data) {
                     if (data.status == 'ok') {
                        console.log(data.msg)
                        if (pos == 1) {
                            $('#td_linkZoom_' + id).html(`<a href="`+ eLink + `" target="_blank">` + eLink +`</a>`);
                            $('#td_idZoom_' + id).html(eId);
                            $('#td_passZoom_' + id).html(ePass);
                        } else if (pos == 2) {
                            $('#td_linkZoom_' + id + '_2').html(`<a href="`+ eLink + `" target="_blank">` + eLink +`</a>`);
                            $('#td_idZoom_' + id + '_2').html(eId);
                            $('#td_passZoom_' + id + '_2').html(ePass);
                        }
                        
                        Swal.fire({
                           position: 'top-center',
                           icon: 'success',
                           title: 'Success Update Link Zoom Pos '+id,
                           text: 'Link Zoom Pos ' + id + ' berhasil di update. Pastikan kembali link zoom anda tidak mengalami kendala kembali'
                        });
                     }
                     else 
                     {
                        Swal.fire({
                           position: 'top-center',
                           icon: 'danger',
                           title: 'Gagal Update Link Zoom Pos '+id,
                           text: 'Pastikan kembali bahwa anda telah mengisikan Link Zoom dengan baik dan benar'
                        });
                     }
                }
            })
        }
        //  $("#bukabtn").click(function(){
        //      $.ajax({
        //          type: 'POST',
        //          url: '{{ route('map_admin_update') }}',
        //          data: {'_token':'<?php echo csrf_token(); ?>',
        //          hasil: "Open",
        //      },
        //          success: function(data){
        //              $("#status").html(data.msg)
        //          }
        //      });
        //  });

        //  $("#tutupbtn").click(function(){
        //      $.ajax({
        //          type: 'POST',
        //          url: '{{ route('map_admin_update') }}',
        //          data: {'_token':'<?php echo csrf_token(); ?>',
        //          hasil: "Close"
        //      },
        //          success: function(data){
        //              $("#status").html(data.msg)
        //          }
        //      });
        //  });
    </script>
@endsection
