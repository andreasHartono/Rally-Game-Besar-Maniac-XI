@extends('peserta.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('../assets/css/map.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@endsection

@section('content')
    <div class="content" id="hasilContent">
        <div class="container-fluid d-flex justify-content-center">
            <div class="d-flex flex-wrap mapmap">
                <div class="bd-highlight mb-0" style="flex-basis: 100%;">
                    <div class="bg-map w-100" style="position: relative;">

                        <img src="{{ url('assets/img/map.png') }}" alt="" style="width: 915px;">
                        {{-- <h1 id="testtext">{{ $game[0]['status'] }}</h1> --}}

                        @foreach ($game as $item)
                            @if ($item['id'] < 16)
                                @if ($item['zoom2'] == 0)
                                    <button href="#modalRally{{ $item['id'] }}" class="map-btn" id="rallyPos{{ $item['id'] }}"
                                    data-toggle="modal" type="button"></button>
                                @else {{-- Kalau punya 2 pos --}}
                                    <button href="#modalRally{{ $item['id'] }}" class="map-btn pos1" id="rallyPos{{ $item['id'] }}"
                                    data-toggle="modal" type="button"></button>
                                    <button href="#modalRally{{ $item['id'] }}-2" class="map-btn pos2" id="rallyPos{{ $item['id'] }}-2"
                                    data-toggle="modal" type="button"></button>
                                @endif
                                
                            @else 
                                <button href="#modalGamebes" class="map-btn-gamebes" id="rallyGamebes"
                                data-toggle="modal" type="button">Treasure Hunt</button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ModalRally --}}
            @foreach ($game as $item)
                @if ($item['id'] < 16)
                    <div class="modal fade" id="modalRally{{ $item['id'] }}" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fw-bold">{{ $item['nama'] }}</h4>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Nama Pos: {{ $item['nama'] }}</p>
                                    <p>Jenis Pos:
                                        @if ($item['id'] <= 3)
                                            Battle
                                        @else
                                            Single
                                        @endif
                                    </p>
                                    <p>Link Zoom: <a href="{{ $item['linkZoom'] }}" target="_blank">Click Me</a></p>
                                    <p>ID Zoom: {{ $item['idZoom'] }} <button onclick="copy('{{ $item['idZoom'] }}')" class="btn-copy"><span class="material-symbols-outlined">content_copy</span></button></p>  <!-- Tambahin clipboard dan animasi centang kalo sudah berhasil user mengcopy id zoom ya-->
                                    <p>Password Zoom: {{ $item['passZoom'] }} <button onclick="copy('{{ $item['passZoom'] }}')" class="btn-copy"><span class="material-symbols-outlined">content_copy</span></button></p> <!-- Tambahin clipboard dan animasi centang kalo sudah berhasil user mengcopy password zoom ya-->
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-secondary fw-bold text-light" data-dismiss="modal">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($item['zoom2'] == 1) {{-- Kalau punya 2 pos --}}
                        <div class="modal fade" id="modalRally{{ $item['id'] }}-2" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title fw-bold">{{ $item['nama'] }}</h4>
                                        <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Nama Pos: {{ $item['nama'] }}</p>
                                        <p>Jenis Pos:
                                            @if ($item['id'] <= 3)
                                                Battle
                                            @else
                                                Single
                                            @endif
                                        </p>
                                        <p>Link Zoom: <a href="{{ $item['linkZoom2'] }}" target="_blank">Click Me</a></p>
                                        <p>ID Zoom: {{ $item['idZoom2'] }} <button onclick="copy('{{ $item['idZoom2'] }}')" class="btn-copy"><span class="material-symbols-outlined">content_copy</span></button></p>  <!-- Tambahin clipboard dan animasi centang kalo sudah berhasil user mengcopy id zoom ya-->
                                        <p>Password Zoom: {{ $item['passZoom2'] }} <button onclick="copy('{{ $item['passZoom2'] }}')" class="btn-copy"><span class="material-symbols-outlined">content_copy</span></button></p> <!-- Tambahin clipboard dan animasi centang kalo sudah berhasil user mengcopy password zoom ya-->
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-secondary fw-bold text-light" data-dismiss="modal">OK</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endif
                @else
                    {{-- Modal Gamebes --}}
                    <div class="modal fade" id="modalGamebes" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fw-bold">{{ $item['nama'] }}</h4>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Nama Pos: {{ $item['nama'] }}</p>
                                    <p>Jenis Pos: Game Besar</p>
                                    <p>Link Zoom: <a href="{{ $item['linkZoom'] }}" target="_blank">Click Me</a></p>
                                    <p>ID Zoom: {{ $item['idZoom'] }} <button onclick="copy('{{ $item['idZoom'] }}')" class="btn-copy"><span class="material-symbols-outlined">content_copy</span></button></p>
                                    <p>Password Zoom: {{ $item['passZoom'] }} <button onclick="copy('{{ $item['passZoom'] }}')" class="btn-copy"><span class="material-symbols-outlined">content_copy</span></button></p>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-secondary fw-bold text-light" data-dismiss="modal">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{-- End of Modal Rally --}}

            
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#map').addClass("active");
            // $(":submit").attr("disabled", true);
        });

        setInterval(function() {
            $.ajax({
                type: 'POST',
                url: '{{ route('map_update') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                },
                success: function(data) {
                      if (data.pos1 == "Close") {
                          //console.log(data.data1);
                          $("#rallyPos1").addClass("full");
                          $("#rallyPos1").removeClass("waiting");
                          $("#rallyPos1").attr("disabled", true);
                      } else if(data.pos1 == "Open"){
                          $("#rallyPos1").removeClass("full");
                          $("#rallyPos1").removeClass("waiting");
                          $("#rallyPos1").removeAttr("disabled");
                      } else if (data.pos1 == "Waiting") {
                          $("#rallyPos1").removeClass("full");
                          $("#rallyPos1").addClass("waiting");
                          $("#rallyPos1").removeAttr("disabled");
                      }
                      if (data.pos2 == "Close") {
                          $("#rallyPos2").addClass("full");
                          $("#rallyPos2").removeClass("waiting");
                          $("#rallyPos2").attr("disabled", true);
                      } else if(data.pos2 == "Open"){
                          $("#rallyPos2").removeClass("full");
                          $("#rallyPos2").removeClass("waiting");
                          $("#rallyPos2").removeAttr("disabled");
                      } else if (data.pos2 == "Waiting") {
                          $("#rallyPos2").removeClass("full");
                          $("#rallyPos2").addClass("waiting");
                          $("#rallyPos2").removeAttr("disabled");
                      }
                      if (data.pos3 == "Close") {
                          $("#rallyPos3").addClass("full");
                          $("#rallyPos3").removeClass("waiting");
                          $("#rallyPos3").attr("disabled", true);
                      } else if(data.pos3 == "Open"){
                          $("#rallyPos3").removeClass("full");
                          $("#rallyPos3").removeClass("waiting");
                          $("#rallyPos3").removeAttr("disabled");
                      } else if (data.pos3 == "Waiting") {
                          $("#rallyPos3").removeClass("full");
                          $("#rallyPos3").addClass("waiting");
                          $("#rallyPos3").removeAttr("disabled");
                      }
                      if (data.pos4 == "Close") {
                          $("#rallyPos4").addClass("full");
                          $("#rallyPos4").attr("disabled", true);
                      } else if(data.pos4 == "Open"){
                          $("#rallyPos4").removeClass("full");
                          $("#rallyPos4").removeAttr("disabled");
                      }
                      if (data.pos5 == "Close") {
                          $("#rallyPos5").addClass("full");
                          $("#rallyPos5").attr("disabled", true);
                      } else if(data.pos5 == "Open"){
                          $("#rallyPos5").removeClass("full");
                          $("#rallyPos5").removeAttr("disabled");
                      }
                      if (data.pos6 == "Close") {
                          $("#rallyPos6").addClass("full");
                          $("#rallyPos6").attr("disabled", true);
                      } else if(data.pos6 == "Open"){
                          $("#rallyPos6").removeClass("full");
                          $("#rallyPos6").removeAttr("disabled");
                      }
                      if (data.pos7 == "Close") {
                          $("#rallyPos7").addClass("full");
                          $("#rallyPos7").attr("disabled", true);
                      } else if(data.pos7 == "Open"){
                          $("#rallyPos7").removeClass("full");
                          $("#rallyPos7").removeAttr("disabled");
                      }
                      if (data.pos8 == "Close") {
                          $("#rallyPos8").addClass("full");
                          $("#rallyPos8").attr("disabled", true);
                      } else if(data.pos8 == "Open"){
                          $("#rallyPos8").removeClass("full");
                          $("#rallyPos8").removeAttr("disabled");
                      }
                      if (data.pos9 == "Close") {
                          $("#rallyPos9").addClass("full");
                          $("#rallyPos9").attr("disabled", true);
                      } else if(data.pos9 == "Open"){
                          $("#rallyPos9").removeClass("full");
                          $("#rallyPos9").removeAttr("disabled");
                      }
                      if (data.pos10 == "Close") {
                          $("#rallyPos10").addClass("full");
                          $("#rallyPos10").attr("disabled", true);
                      } else if(data.pos10 == "Open"){
                          $("#rallyPos10").removeClass("full");
                          $("#rallyPos10").removeAttr("disabled");
                      }
                      if (data.pos11 == "Close") {
                          $("#rallyPos11").addClass("full");
                          $("#rallyPos11").attr("disabled", true);
                      } else if(data.pos11 == "Open"){
                          $("#rallyPos11").removeClass("full");
                          $("#rallyPos11").removeAttr("disabled");
                      }
                      if (data.pos12 == "Close") {
                          $("#rallyPos12").addClass("full");
                          $("#rallyPos12").attr("disabled", true);
                      } else if(data.pos12 == "Open"){
                          $("#rallyPos12").removeClass("full");
                          $("#rallyPos12").removeAttr("disabled");
                      }
                      if (data.pos13 == "Close") {
                          $("#rallyPos13").addClass("full");
                          $("#rallyPos13").attr("disabled", true);
                      } else if(data.pos13 == "Open"){
                          $("#rallyPos13").removeClass("full");
                          $("#rallyPos13").removeAttr("disabled");
                      }
                      if (data.pos14 == "Close") {
                          $("#rallyPos14").addClass("full");
                          $("#rallyPos14").attr("disabled", true);
                      } else if(data.pos14 == "Open"){
                          $("#rallyPos14").removeClass("full");
                          $("#rallyPos14").removeAttr("disabled");
                      }
                      if (data.pos15 == "Close") {
                          $("#rallyPos15").addClass("full");
                          $("#rallyPos15").attr("disabled", true);
                      } else if(data.pos15 == "Open"){
                          $("#rallyPos15").removeClass("full");
                          $("#rallyPos15").removeAttr("disabled");
                      }
                      
                    // if -> pny 2 pos
                      if (data.pos1_2 == "Close") {
                          $("#rallyPos1-2").addClass("full");
                          $("#rallyPos1-2").attr("disabled", true);
                      } else if(data.pos1_2 == "Open"){
                          $("#rallyPos1-2").removeClass("full");
                          $("#rallyPos1-2").removeAttr("disabled");
                      }
                      if (data.pos2_2 == "Close") {
                          $("#rallyPos2-2").addClass("full");
                          $("#rallyPos2-2").attr("disabled", true);
                      } else if(data.pos2_2 == "Open"){
                          $("#rallyPos2-2").removeClass("full");
                          $("#rallyPos2-2").removeAttr("disabled");
                      }
                      if (data.pos3_2 == "Close") {
                          $("#rallyPos3-2").addClass("full");
                          $("#rallyPos3-2").attr("disabled", true);
                      } else if(data.pos3_2 == "Open"){
                          $("#rallyPos3-2").removeClass("full");
                          $("#rallyPos3-2").removeAttr("disabled");
                      }
                      if (data.pos4_2 == "Close") {
                          $("#rallyPos4-2").addClass("full");
                          $("#rallyPos4-2").attr("disabled", true);
                      } else if(data.pos4_2 == "Open"){
                          $("#rallyPos4-2").removeClass("full");
                          $("#rallyPos4-2").removeAttr("disabled");
                      }
                      if (data.pos5_2 == "Close") {
                          $("#rallyPos5-2").addClass("full");
                          $("#rallyPos5-2").attr("disabled", true);
                      } else if(data.pos5_2 == "Open"){
                          $("#rallyPos5-2").removeClass("full");
                          $("#rallyPos5-2").removeAttr("disabled");
                      }
                      if (data.pos6_2 == "Close") {
                          $("#rallyPos6-2").addClass("full");
                          $("#rallyPos6-2").attr("disabled", true);
                      } else if(data.pos6_2 == "Open"){
                          $("#rallyPos6-2").removeClass("full");
                          $("#rallyPos6-2").removeAttr("disabled");
                      }
                      if (data.pos7_2 == "Close") {
                          $("#rallyPos7-2").addClass("full");
                          $("#rallyPos7-2").attr("disabled", true);
                      } else if(data.pos7_2 == "Open"){
                          $("#rallyPos7-2").removeClass("full");
                          $("#rallyPos7-2").removeAttr("disabled");
                      }
                      if (data.pos8_2 == "Close") {
                          $("#rallyPos8-2").addClass("full");
                          $("#rallyPos8-2").attr("disabled", true);
                      } else if(data.pos8_2 == "Open"){
                          $("#rallyPos8-2").removeClass("full");
                          $("#rallyPos8-2").removeAttr("disabled");
                      }
                      if (data.pos9_2 == "Close") {
                          $("#rallyPos9-2").addClass("full");
                          $("#rallyPos9-2").attr("disabled", true);
                      } else if(data.pos9_2 == "Open"){
                          $("#rallyPos9-2").removeClass("full");
                          $("#rallyPos9-2").removeAttr("disabled");
                      }
                      if (data.pos10_2 == "Close") {
                          $("#rallyPos10-2").addClass("full");
                          $("#rallyPos10-2").attr("disabled", true);
                      } else if(data.pos10_2 == "Open"){
                          $("#rallyPos10-2").removeClass("full");
                          $("#rallyPos10-2").removeAttr("disabled");
                      }
                      if (data.pos11_2 == "Close") {
                          $("#rallyPos11-2").addClass("full");
                          $("#rallyPos11-2").attr("disabled", true);
                      } else if(data.pos11_2 == "Open"){
                          $("#rallyPos11-2").removeClass("full");
                          $("#rallyPos11-2").removeAttr("disabled");
                      }
                      if (data.pos12_2 == "Close") {
                          $("#rallyPos12-2").addClass("full");
                          $("#rallyPos12-2").attr("disabled", true);
                      } else if(data.pos12_2 == "Open"){
                          $("#rallyPos12-2").removeClass("full");
                          $("#rallyPos12-2").removeAttr("disabled");
                      }
                      if (data.pos13_2 == "Close") {
                          $("#rallyPos13-2").addClass("full");
                          $("#rallyPos13-2").attr("disabled", true);
                      } else if(data.pos13_2 == "Open"){
                          $("#rallyPos13-2").removeClass("full");
                          $("#rallyPos13-2").removeAttr("disabled");
                      }
                      if (data.pos14_2 == "Close") {
                          $("#rallyPos14-2").addClass("full");
                          $("#rallyPos14-2").attr("disabled", true);
                      } else if(data.pos14_2 == "Open"){
                          $("#rallyPos14-2").removeClass("full");
                          $("#rallyPos14-2").removeAttr("disabled");
                      }
                      if (data.pos15_2 == "Close") {
                          $("#rallyPos15-2").addClass("full");
                          $("#rallyPos15-2").attr("disabled", true);
                      } else if(data.pos15_2 == "Open"){
                          $("#rallyPos15-2").removeClass("full");
                          $("#rallyPos15-2").removeAttr("disabled");
                      }
                }
            });
        }, 500);
    
    function copy(url){
        navigator.clipboard.writeText(url);
        Swal.fire({
            icon: 'success',
            title: 'Copied',
            timer: 1000
        })
    }

    </script>
@endsection
