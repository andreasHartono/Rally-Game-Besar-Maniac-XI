<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Besar</title>
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/gamebes.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{ asset('../assets/img/logo.ico') }}" rel="shorcut icon">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
</head>

<body>

    <div class="container-gamebes">
        <div class="map">

            <table border="1" id="tabel-gamebes">
                
            </table>
        </div>
        <div class="action">
            <div class="combobox" id="player">
                <select name="team-name" id="team-name">
                    <option value="1">1. MASSACT</option>
                    <option value="2">2. Margie</option>
                    <option value="3">3. Eixcel Squad</option>
                    <option value="4">4. Yankees</option>
                    <option value="5">5. Orbit Game Dev</option>
                    <option value="6">6. Plutonium</option>
                    <option value="7">7. Miraii Team</option>
                    <option value="8">8. bekbekbek</option>
                    <option value="9">9. Dalmations</option>
                    <option value="10">10. Sinkuli</option>
                    <option value="11">11. the strikers</option>
                    <option value="12">12. ELBRIDGE</option>
                    <option value="13">13. MLP</option>
                    <option value="14">14. ENVISAGE</option>
                    <option value="15">15. ORPHIC</option>
                    <option value="16">16. TIM WOLVA</option>
                    <option value="17">17. TechIT</option>
                    <option value="18">18. Tuberkulosis</option>
                    <option value="19">19. semoga sukses</option>
                    <option value="20">20. Fratz Science</option>
                    <option value="21">21. Clown In Action</option>
                </select>
                <button type="button" class="change-position" onclick="changePosition()">Change Position</button>
            </div>
            <div class="timer-container">
                <div class="timer-text">
                    <h5 class="text-white"><span id="timer">04:00</span></h5>
                </div>
                <div class="timer-button">
                    <button class="" type="button" id="start">Start</button>
                    <button class="" type="button" id="pause">Pause</button>
                    <button class="" type="button" id="reset">Reset</button>
                </div>
            </div>
            <div class="items">
                <div class="item-1 item-container">
                    <img class="item-image" src="{{ asset('../assets/img/shop-shovel.png') }}"
                        alt="">
                    <div class="item-detail">
                        <p class="item-name">Shovel</p>
                        <p class="item-name" id="item0">Jumlah: 0</p>
                    </div>
                    <button id="useShovel" class="item-button">Use</button>
                </div>
                <div class="item-1 item-container">
                    <img class="item-image" src="{{ asset('../assets/img/shop-scanner.png') }}"
                        alt="">
                    <div class="item-detail">
                        <p class="item-name">Scanner</p>
                        <p class="item-name" id="item1">Jumlah: 0</p>
                    </div>
                    <button id="useScanner" class="item-button">Use</button>
                </div>
                <div class="item-1 item-container">
                    <img class="item-image" src="{{ asset('../assets/img/shop-mini-scanner.png') }}"
                        alt="">
                    <div class="item-detail">
                        <p class="item-name">Mini Scanner</p>
                        <p class="item-name" id="item2">Jumlah: 0</p>
                    </div>
                    <button id="useMiniScanner" class="item-button">Use</button>
                </div>
                <div class="item-1 item-container">
                    <img class="item-image" src="{{ asset('../assets/img/shop-pickaxe.png') }}"
                        alt="">
                    <div class="item-detail">
                        <p class="item-name">Pick Axe</p>
                        <p class="item-name" id="item3">Jumlah: 0</p>
                    </div>
                    <button id="usePickAxe" class="item-button">Use</button>
                </div>
                <div class="item-1 item-container">
                    <img class="item-image" src="{{ asset('../assets/img/shop-thief-bag.png') }}"
                        alt="">
                <div class="item-detail">
                    <p class="item-name">Thief Bag</p>
                    <p class="item-name" id="item4">Jumlah: 0</p>
                </div>
                    <button id="useThiefBag" class="item-button">Use</button>
                </div>
            </div>
            <div class="info">
                <p id="infoGerak"></p>
                <p id="infoGold"></p>
            </div>
            <div class="movement-container"> 
                <div class="movement">
                    <button class="controller" id="up">⬆️</button>
                    <button class="controller" id="down">⬇️</button>
                    <button class="controller" id="left">⬅️</button>
                    <button class="controller" id="right">➡️</button>
                    <!-- <button class="controller" id="use">USE</button> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
<script>
    var id = "";
    var posisition = "";
    var kelompok = "";

    let map = "";

    $(document).ready(function() {
        getMap();
    });

    $("#useShovel").click(function() {

        kelompok = $("#team-name").find('option:selected').val();
        var idPlayer = "#k" + kelompok;
        posisition = $(idPlayer).attr('data-loc');
        var split = posisition.split(",");
        var newLoc = "#" + split[0] + "k" + split[1];
        var hasil = $(newLoc).attr('gold');

        var Kling = "k"+kelompok;

        $.ajax({
            type: 'POST',
            url: '{{ route('game_besar_move') }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': Kling,
            },
            success: function(data) {
                var move = data.msg;

                if(move != 0){
                    var batu = $(newLoc).attr('rock');
                    if ( batu == 0) {
                        if (hasil == "0") {
                            // alert("Anda tidak menemukan Gold Bar");
                            Swal.fire({
                                icon: 'info',
                                title: "Anda tidak menemukan Gold Bar"
                            });
                        } else{

                                    $.ajax({
                                        type: 'POST',
                                        url: '{{ route("game_besar_add") }}',
                                        data: {
                                            '_token': '<?php echo csrf_token() ?>',
                                            'id': Kling,
                                            'gold': hasil
                                        },
                                        success: function(data) {
                                            // alert(data.msg)
                                            if ($(newLoc).attr('gold') == "-1") {
                                                $(newLoc).removeClass();
                                                $(newLoc).addClass("lava");
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: data.msg
                                                });
                                            } else if ($(newLoc).attr('gold') == "1") {
                                                $(newLoc).removeClass("gold-dust");
                                                $(newLoc).addClass("gold-chunk");
                                                Swal.fire({
                                                    icon: 'success',
                                                    imageUrl: '{{ asset("../assets/img/gold-chunk.png") }}',
                                                    imageWidth: 100,
                                                    title: data.msg
                                                });
                                            } else if ($(newLoc).attr('gold') == "2") {
                                                $(newLoc).removeClass("gold-dust");
                                                $(newLoc).addClass("gold-bar");
                                                Swal.fire({
                                                    icon: 'success',
                                                    imageUrl: '{{ asset("../assets/img/gold-bar.png") }}',
                                                    imageWidth: 100,
                                                    title: data.msg
                                                });
                                            }

                                            $(newLoc).attr('gold', "0");
                                            updateMap(split[0], split[1], 'shovel');
                                        }
                                    });
                        }
                    }else{
                        // alert("Ada batu");
                        Swal.fire({
                            icon: 'info',
                            title: "Ada batu"
                        });
                    }
                }
            }
        });
        
        updateItem(kelompok, 1);

    });

    $("#useScanner").click(function() {
        kelompok = $("#team-name").find('option:selected').val();
        var idPlayer = "#k" + kelompok;
        posisition = $(idPlayer).attr('data-loc');
        var split = posisition.split(",");
        var newLoc = "#" + split[0] + "k" + split[1];
        
        var ada = 0;

        var Kling = "k"+kelompok;
        $.ajax({
            type: 'POST',
            url: '{{ route('game_besar_move') }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': Kling,
            },
            success: function(data) {
                var move = data.msg;

                if(move != 0){
                    for (let i = 0; i < 5; i++) {
                        //Atas
                        var val = parseInt(split[0]);
                        var result = val - 1;
                        
                        if(result > 0){
                            var newLoc = "#" + result + "k" + split[1];
                            var hasil = $(newLoc).attr('gold');
                            if (hasil == "1" || hasil == "2") {
                                ada = 1;
                            }
                        }
                        
                        //Bawah

                        var val = parseInt(split[0]);
                        var result = val + 1;
                        
                        if(result <= 20){
                            var newLoc = "#" + result + "k" + split[1];
                            var hasil = $(newLoc).attr('gold');
                            if (hasil == "1" || hasil == "2") {
                                ada = 1;
                            }
                        }

                        //Kiri

                        var val = parseInt(split[1]);
                        var result = val - 1;
                        
                        if(result > 0){
                            var newLoc = "#" + split[0] + "k" + result;
                            var hasil = $(newLoc).attr('gold');
                            if (hasil == "1" || hasil == "2") {
                                ada = 1;
                            }
                        }

                        //Kanan

                        var val = parseInt(split[1]);
                        var result = val + 1;
                        
                        if(result <= 20){
                            var newLoc = "#" + split[0] + "k" + result;
                            var hasil = $(newLoc).attr('gold');
                            if (hasil == "1" || hasil == "2") {
                                ada = 1;
                            }
                        }
                    }

                    if(ada == 1){
                        // alert("Scanner mendeteksi emas di sekitar sini!");
                        Swal.fire({
                            icon: 'info',
                            title: "Scanner mendeteksi emas di sekitar sini!"
                        });
                    }else{
                        // alert("Scanner tidak mendeteksi emas di sekitar sini..");
                        Swal.fire({
                            icon: 'info',
                            title: "Scanner tidak mendeteksi emas di sekitar sini.."
                        });
                    }
                }
            }
        });
    
        updateItem(kelompok, 2);
    });

    $("#useMiniScanner").click(function() {
        kelompok = $("#team-name").find('option:selected').val();
        var idPlayer = "#k" + kelompok;
        posisition = $(idPlayer).attr('data-loc');
        var split = posisition.split(",");
        var newLoc = "#" + split[0] + "k" + split[1];
        

        var Kling = "k"+kelompok;

        $.ajax({
            type: 'POST',
            url: '{{ route('game_besar_move') }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': Kling,
            },
            success: function(data) {
                var move = data.msg;

                if(move != 0){
                    var hasil = $(newLoc).attr('gold');
                    if (hasil == "0") {
                        Swal.fire({
                            icon: 'info',
                            title: "Mini-Scanner tidak mendeteksi emas.."
                        });
                        // alert("Mini-Scanner tidak mendeteksi emas..");
                    } else if (hasil == "1" || hasil =="2") {
                        // alert("Mini-Scanner mendeteksi emas!")
                        Swal.fire({
                            icon: 'info',
                            title: "Mini-Scanner mendeteksi emas!"
                        });
                    }
                }
            }
        });

        updateItem(kelompok, 3);
    });

    $("#usePickAxe").click(function() {
        kelompok = $("#team-name").find('option:selected').val();
        var idPlayer = "#k" + kelompok;
        posisition = $(idPlayer).attr('data-loc');

        var split = posisition.split(",");
        var newLoc = "#" + split[0] + "k" + split[1];

        var Kling = "k"+kelompok;

        $.ajax({
            type: 'POST',
            url: '{{ route('game_besar_move') }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': Kling,
            },
            success: function(data) {
                var move = data.msg;

                    if(move != 0){
                        var hasil = $(newLoc).attr('rock');
                        if (hasil == "0") {
                        // alert("Tidak ada batu disini");
                        Swal.fire({
                            icon: 'error',
                            title: "Tidak ada batu di sini"
                        });
                    } else if (hasil == "1") {
                        $(newLoc).attr('rock', "0");
                        var rockid = "#rock"+ split[0] + "k" + split[1];
                        $(rockid).remove();
                        // alert("Batu Dihancurkan");
                        Swal.fire({
                            icon: 'success',
                            title: "Batu Dihancurkan"
                        });
                        updateMap(split[0], split[1], "pickaxe");
                    }
                }
            }
        });
        updateItem(kelompok, 4);
    });

    $("#useThiefBag").click(function(){
        kelompok = $("#team-name").find('option:selected').val();
        var idPlayer = "#k"+kelompok;
        posisition = $(idPlayer).attr('data-loc');
        var split = posisition.split(",");
        var newLoc = "#"+ split[0]+ "k"+split[1];

        var Kling = "k"+kelompok;

        $.ajax({
            type: 'POST',
            url: '{{ route('game_besar_move') }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': Kling,
            },
            success: function(data) {
                var move = data.msg;
                console.log(move);

                if(move != 0){
                    var jumlah = $(newLoc+' > div > span').length;
                    console.log(jumlah);
                    if (jumlah == 2) {
                        var ids = $(newLoc+' span').map(function(){
                            return $(this).attr('id');
                        }).get();

                        var id1 = "k"+kelompok;
                        var id2 ="";
                        $.each(ids, function( index, value ) {
                            if(value != id1){
                                id2 = value;
                            }
                        });

                        console.log("Masuk line 445");

                        $.ajax({
                            type: 'POST',
                            url: '{{ route("game_besar_steal") }}',
                            data: {
                                '_token': '<?php echo csrf_token() ?>',
                                'id1': id1,
                                'id2': id2
                            },
                            success: function(data) {
                                console.log(data.msg);
                                // alert("Anda berhasil mencuri poin lawan sebesar "+data.msg+" poin!");
                                Swal.fire({
                                    icon: 'success',
                                    title: `Anda berhasil mencuri poin lawan sebesar ${data.msg} poin!`
                                });
                            }
                        });
                    }
                }
            }
        });

        updateItem(kelompok, 5);
    });

$("#team-name").change(function(){
    
    //Reset Move
    kelompok = $("#team-name").find('option:selected').val();
    var idp = "k" + kelompok;

    $.ajax({
                type: 'POST',
                url: '{{ route("game_besar_reset_move") }}',
                data: {
                    '_token': '<?php echo csrf_token() ?>',
                    'id': idp
                },
            });

    getItemAmount();
});

$(".controller").click(function() {
    id = this.id;
    kelompok = $("#team-name").find('option:selected').val();
    var idp = "k" + kelompok;
    var idPlayer = "#k" + kelompok;
    
    var Kling = "k"+kelompok;

        $.ajax({
            type: 'POST',
            url: '{{ route('game_besar_move') }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': Kling,
            },
            success: function(data) {
                var move = data.msg;

                    if(move != 0){
                        if (id == "up") {
                        posisition = $(idPlayer).attr('data-loc');
                        var split = posisition.split(",");
                        var val = parseInt(split[0]);
                        var result = val - 1;
                        var newPos = result + '';
                        var newLoc = "#" + result + "k" + split[1];
                        var dataLoc = result + "," + split[1];
                        
                        var water = $(newLoc).attr('water');
                        if(water != 1 && result > 0){
                            if (result > 0) {
                                $.ajax({
                                    type: 'POST',
                                    url: '{{ route('game_besar_store') }}',
                                    data: {
                                        '_token': '<?php echo csrf_token(); ?>',
                                        'idLing': idp,
                                        'posLing': dataLoc
                                    },
                                    success: function(data) {
                                    }
                                });
                            }
                        } else {
                            // alert("tidak bisa jalan ada air");
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('game_besar_add_move') }}',
                                data: {
                                    '_token': '<?php echo csrf_token(); ?>',
                                    'id': Kling,
                                },
                            });
                            if (water == 1){
                                Swal.fire({
                                    icon: 'error',
                                    title: "tidak bisa jalan ada air"
                                });
                            }
                        }
                        
                        
                    } else if (id == "left") {
                        posisition = $(idPlayer).attr('data-loc');
                        var split = posisition.split(",");
                        var val = parseInt(split[1]);
                        var result = val - 1;
                        var newPos = result + '';
                        var newLoc = "#" + +split[0] + "k" + result;
                        var dataLoc = split[0] + "," + result;

                        var water = $(newLoc).attr('water');
                        if(water != 1 && result > 0){
                            if (result > 0) {
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('game_besar_store') }}',
                                data: {
                                    '_token': '<?php echo csrf_token(); ?>',
                                    'idLing': idp,
                                    'posLing': dataLoc
                                },
                                success: function(data) {
                                }
                            });
                        }
                        }else{
                            // alert("tidak bisa jalan ada air");
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('game_besar_add_move') }}',
                                data: {
                                    '_token': '<?php echo csrf_token(); ?>',
                                    'id': Kling,
                                },
                            });
                            if (water == 1){
                                Swal.fire({
                                    icon: 'error',
                                    title: "tidak bisa jalan ada air"
                                });
                            }
                        }

                       
                    } else if (id == "right") {
                        posisition = $(idPlayer).attr('data-loc');
                        var split = posisition.split(",");
                        var val = parseInt(split[1]);
                        var result = val + 1;
                        var newPos = result + '';
                        var newLoc = "#" + +split[0] + "k" + result;
                        var dataLoc = split[0] + "," + result;

                        var water = $(newLoc).attr('water');
                        if(water != 1 && result <= 20){
                            if (result > 0) {
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('game_besar_store') }}',
                                data: {
                                    '_token': '<?php echo csrf_token(); ?>',
                                    'idLing': idp,
                                    'posLing': dataLoc
                                },
                                success: function(data) {},
                                error: function(request, error) {
                                    console.log(arguments);
                                    alert(" Can't do because: " + error);
                                }
                            });
                        }
                        }else{
                            // alert("tidak bisa jalan ada air");
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('game_besar_add_move') }}',
                                data: {
                                    '_token': '<?php echo csrf_token(); ?>',
                                    'id': Kling,
                                },
                            });
                            if (water == 1){
                                Swal.fire({
                                    icon: 'error',
                                    title: "tidak bisa jalan ada air"
                                });
                            }
                        }

                    } else if (id == "down") {
                        posisition = $(idPlayer).attr('data-loc');
                        var split = posisition.split(",");
                        var val = parseInt(split[0]);
                        var result = val + 1;
                        var newPos = result + '';
                        var newLoc = "#" + result + "k" + split[1];
                        var dataLoc = result + "," + split[1];

                        var water = $(newLoc).attr('water');
                        if(water != 1 && result <= 20){
                            if (result > 0 && result <= 20) {
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('game_besar_store') }}',
                                data: {
                                    '_token': '<?php echo csrf_token(); ?>',
                                    'idLing': idp,
                                    'posLing': dataLoc
                                },
                                success: function(data) {
                                }
                            });
                        }
                        }else{
                            // alert("tidak bisa jalan ada air");
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('game_besar_add_move') }}',
                                data: {
                                    '_token': '<?php echo csrf_token(); ?>',
                                    'id': Kling,
                                },
                            });
                            if (water == 1){
                                Swal.fire({
                                    icon: 'error',
                                    title: "tidak bisa jalan ada air"
                                });
                            }
                        }

                        
                    } else if (id == "use") {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('game_besar_store') }}',
                            data: {
                                '_token': '<?php echo csrf_token(); ?>',
                                'idLing': "Hello",
                            },
                            success: function(data) {
                                alert(data.msg);
                            },
                            error: function(request, error) {
                                console.log(arguments);
                                alert(" Can't do because: " + error);
                            }
                        });
                    }
                }
            }
        });
});

setInterval(function() {

    getMap();

    var kNow = $("#team-name").find('option:selected').val();

    var Kling = "k"+kNow;
    $.ajax({
            type: 'POST',
            url: '{{ route('game_besar_get_move') }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': Kling,
            },
            success: function(data) {
                $("#infoGerak").html("Sisa Gerakan: "+data.msg);
                $("#infoGold").html("Gold: "+data.gold);
            }
    })                

    $.ajax({
        type: 'GET',
        url: '{{ route('game_besar_update') }}',
        data: {
            '_token': '<?php echo csrf_token(); ?>',
        },
        success: function(data) {
            $.each(data.msg, function(index, value) {

                //data dari database
                var dataPos = value['pos_lingkarang'];
                var split = dataPos.split(",");
                var newLoc = "#" + split[0] + "k" + split[1];

                //data dari tabel
                var idPlayer = "#" + value['id_lingkarang'];
                var posLingkaran = $(idPlayer).attr('data-loc');

                if (posLingkaran != dataPos) {
                    var dataLoc = split[0] + "," + split[1];
                    $(idPlayer).remove();
                    $(newLoc).children().append('<span id=' + value['id_lingkarang'] +
                        ' data-loc="' +
                        dataLoc +
                        '" class="dot"><div style="text-align: center">' +
                        value['id'] + '</div></span>');
                }
            });
        }
    });

    getItemAmount();

}, 500);
        
    function getItemAmount() {
        kelompok = $("#team-name").find('option:selected').val();

        $.ajax({
            type: 'GET',
            url: '{{ route("game_besar_player_item") }}',
            data: {
                    '_token': '<?php echo csrf_token() ?>',
                    'id': kelompok
            },
            success: function(data) {
                const items = JSON.parse(data);
                for (let i = 0; i < 5; i++) {
                    $(`#item${i}`).html(`Jumlah: ${items[i]}`);
                }
            }
        });
    }

    function updateItem(kelompok, itemid) {
        $.ajax({
            type: 'POST',
            url: '{{ route("game_besar_update_item") }}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'gamebesid': kelompok,
                'itemid': itemid
            }
        });
    }

    function getMap() {
        $.ajax({
            type: 'GET',
            url: '{{ route("game_besar_get_map") }}',
            success: function(data) {
                const tempMap = JSON.parse(data);
                if (tempMap !== map) {
                    map = tempMap;
                    $('#tabel-gamebes').html(map);
                }
            }
        });
    }

    function updateMap(baris, kolom, type) {
        $.ajax({
            type: 'POST',
            url: '{{ route("game_besar_update_map") }}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'baris': baris,
                'kolom': kolom,
                'type': type
            }
        })
    }

    async function changePosition() {
        let kNow = $("#team-name").find('option:selected').val();
        let Kling = "k"+kNow;
        const {value: horizontalPos} = await Swal.fire({
            title: 'Masukkan Posisi Horizontal',
            input: 'text',
            inputLabel: 'Contoh: 3',
            showCancelButton: true,
            inputValidator: (value) => {
                if(!value) {
                    return 'Jangan kosong ya!'
                } else {
                    let pattern1 = /[1-9]/g;
                    let pattern2 = /[1-2][0-9]/g;
                    if (!(value.match(pattern1) != null || value.match(pattern2) != null)) {
                        return 'Format tidak sesuai!'
                    }
                }
            }
        });

        if (horizontalPos) {
            const {value: verticalPos} = await Swal.fire({
                title: 'Masukkan Posisi Vertikal',
                input: 'text',
                inputLabel: '10',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Jangan kosong ya!'
                    } else {
                        let pattern1 = /[1-9]/g;
                        let pattern2 = /[1-2][0-9]/g;
                        if (!(value.match(pattern1) != null || value.match(pattern2) != null)) {
                            return 'Format tidak sesuai!'
                        }
                    }
                }
            })

            if (verticalPos) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("game_besar_update_position") }}',
                    data: {
                        '_token': '<?php echo csrf_token() ?>',
                        'id': Kling,
                        'position': `${verticalPos},${horizontalPos}`,
                    }
                });
            }
        }
    }

    

    var timer;
    var second = 240;
    var running = false;
    $(document).on('click', '#start', function() {
        if (!running){
            $("#timer").css('display','inline');
            running = true;
            timer = setInterval(function() {
                second--;
                // $("#timer").text(second);
                showTimer(second);
                if (second <= 0) {
                    $("#timer").text('Waktu Habis');
                    // alert('Waktu Habis');
                    Swal.fire({
                        icon: 'warning',
                        title: "Waktu Habis"
                    });
                    running = false;
                    clearInterval(timer);
                    second = 240;
                }
            }, 1000);
        }
    });

    $(document).on('click','#pause', function(){
        // $("#timer").text(second);
        showTimer(second);
        running = false
        clearInterval(timer);
    });

    $(document).on('click','#reset', function(){
        $("#timer").text('04:00');
        running = false;
        clearInterval(timer);
        second = 240;
    });

    function showTimer(second) {
        let minute = second / 60;
        let seconds = second % 60;

        let minuteString = parseInt(minute).toString();
        let secondString = seconds.toString();
        if (minuteString.length == 1) {
            minuteString = "0" + minuteString;
        }
        if (secondString.length == 1) {
            secondString = "0" + secondString;
        }

        $("#timer").text(`${minuteString}:${secondString}`);
    }
</script>
