<?php

namespace App\Http\Controllers;

use App\GameBesar;
use App\Player;
use App\TabelGamebes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Players;

class GameBesarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function updateData(){
        $hasil = GameBesar::all();
        //$data = json_decode($hasil, true);
        return response()->json(array(
            'msg' => $hasil
        ),200);
    }

    public function getPLayerItem(Request $request) {
        $player1 = Player::where("gamebes_tim","=", $request['id'])->first();
        $item_amount = [];
        for ($i = 1; $i<=5; $i++){
            $team_item = DB::table('player_items')->where('player_id', $player1['id'])->where('item_id', $i)->sum('amount');
            array_push($item_amount, $team_item);
        }
        return json_encode($item_amount);
    }

    public function updateItem(Request $request) {
        $itemid = $request['itemid'];
        $gamebesid = $request['gamebesid'];

        $player1 = Player::where("gamebes_tim","=", $gamebesid)->first();
        $curritem = DB::table('player_items')->where('player_id', $player1['id'])->where('item_id', $itemid)->get();
        // dd($curritem);
        if (count($curritem) > 0) {
            if ($curritem[0]->amount > 0) { 
                $itemnow = $curritem[0]->amount - 1;
                DB::table('player_items')->where('player_id', $player1['id'])->where('item_id', $itemid)
                    ->update(['amount' => $itemnow]);
            }
        }    
    }

    public function getGold(Request $request) {
        $player1 = GameBesar::where("id_lingkarang","=", $request['id'])->first();
        $gold = $player1['poin'];
        // dd($gold);
        // return json_encode($gold);
        return response()->json(array(
            'msg' => $gold
        ),200);
    }

    public function plusData(Request $request){

        $player1 = GameBesar::where("id_lingkarang","=", $request['id'])->first();

        if($request['gold'] == "1"){
            $monyx1 = $player1['poin'] + 100;
            $msg = "Anda berhasil menemukan Gold Chunk dan mendapatkan 100 poin!";
        }else if($request['gold'] == "2"){
            $monyx1 = $player1['poin'] + 200;
            $msg = "Anda berhasil menemukan Gold Bar dan mendapatkan 200 poin!";
        }else if($request['gold'] == "-1"){
            $monyxAwal = $player1['poin'];
            $result = $monyxAwal * 0.1;

            $monyx1 = $monyxAwal - $result;

            if($monyx1 < 0){
                $monyx1 = 0;
            }

            $msg = "Ouch lava meleburkan ".$result." poinmu!";
        }
        
        
        $player1['poin'] = $monyx1;
        $player1->save();

        return response()->json(array(
            'msg' => $msg
        ),200);
    }

    public function storeData(Request $request){
        
        $data = GameBesar::where("id_lingkarang","=",$request['idLing'])->first();
        $data['pos_lingkarang'] = $request['posLing'];
        $data->save();

        return response()->json(array(
            'msg' => 'jalan'
        ),200);
    }

    public function store(Request $request)
    {
        $data = GameBesar::where('id_lingkarang',$request->id)->first();

        $data->status = $request->hasil;
        $data->save();

        $data = GameBesar::where('id_penjaga',1)->get();

        $hasil = json_decode($data, true);

        return response()->json(array(
            'msg' => $hasil[0]['status']
        ),200);
    }

    public function getMove (Request $request){
        $data = GameBesar::where('id_lingkarang', "=", $request['id'])->first();
        $move = $data['move'];
        $gold = $data['poin'];

        return response()->json(array(
            'msg' => $move,
            'gold' => $gold
        ),200);
    }

    public function resetMove(Request $request){
        $data = GameBesar::where('id_lingkarang', "=", $request['id'])->first();
        $data['move'] = 8;
        $data->save();
        return response()->json(array(
            'msg' => "yes"
        ),200);
    }

    public function move (Request $request){
        $data = GameBesar::where('id_lingkarang', "=", $request['id'])->first();
        $move = $data['move'];

        $data['move'] = $data['move'] - 1;

        if($data['move'] < 0){
            $data['move'] = 0;
        }

        $data->save();

        return response()->json(array(
            'msg' => $move
        ),200);
    }

    public function addMove (Request $request) {
        $data = GameBesar::where('id_lingkarang', "=", $request['id'])->first();
        $move = $data['move'];

        if ($move < 8) $data['move'] = $data['move'] + 1;

        $data->save();
    }

    public function steal(Request $req){

        $id1 = $req['id1'];
        $id2 = $req['id2'];

        $player = GameBesar::where("id_lingkarang","=",$id2)->first();

        $monyx = $player['poin'];

        $result = $monyx * 0.25;

        $EnemyMonyx = $monyx - $result;
        $player['poin'] = $EnemyMonyx;
        $player->save();

        $player1 = GameBesar::where("id_lingkarang","=",$id1)->first();
        $monyx1 = $player1['poin'] + $result;
        $player1['poin'] = $monyx1;
        $player1->save();

        return response()->json(array(
            'msg' => $result
        ),200);
    }

    public function getMap() {
        $map = DB::table('tabel_gamebes')->get();
        // dd($map);
        $baris = 0;
        $i = 0;
        $text = "";
        while ($baris < 20) {
            $text = $text . "<tr>";
            $kolom = 0;
            while ($kolom < 20) {
                if ($map[$i]->water != null) {
                    $water = " water='" . $map[$i]->water . "'"; 
                } else {
                    $water = "";
                }
                $id = $map[$i]->baris . "k" . $map[$i]->kolom;
                $text = $text . "<td id='" . $id . "' gold='". $map[$i]->gold . "' rock='". $map[$i]->rock . "'" . $water . " class='". $map[$i]->class ."'>";
                $text = $text . "<div class='td-container " . $map[$i]->class . "'>";
                if ($map[$i]->rock == 1) {
                    $text = $text . "<div id='rock" . $id . "' class='dot stone'></div>";
                    // $text = $text . "<span class='gold-dust'></span>";
                }
                if ($map[$i]->baris == 1) {
                    $text = $text . "<div class='map-number'>" . $map[$i]->kolom . "</div>";
                }
                if ($map[$i]->kolom == 1 && $map[$i]->baris != 1) {
                    $text = $text . "<div class='map-number'>" . $map[$i]->baris . "</div>";
                }
                $text = $text . "</div>";
                $text = $text . "</td>";

                $kolom++;
                $i++;
            }
            
            $text = $text . "</tr>";
            $baris++;
        }
        // dd($text);
        return json_encode($text);
    }

    public function updateMap(Request $request) {
        $type = $request['type'];
        $baris = $request['baris'];
        $kolom = $request['kolom'];
        if ($type == 'pickaxe') {
            DB::table('tabel_gamebes')->where('baris', $baris)->where('kolom', $kolom)->update(['rock' => 0]);
        } elseif ($type == 'shovel') {
            $thisTable = DB::table('tabel_gamebes')->where('baris', $baris)->where('kolom', $kolom)->first();
            // dd($thisTable);
            if ($thisTable->gold == 1) {
                if(str_contains($thisTable->class, "hotzone")) {
                    DB::table('tabel_gamebes')->where('baris', $baris)->where('kolom', $kolom)->update(['gold' => 0, 'class' => 'hotzone gold-chunk']);
                } else {
                    DB::table('tabel_gamebes')->where('baris', $baris)->where('kolom', $kolom)->update(['gold' => 0, 'class' => 'gold-chunk']);
                }
            } elseif ($thisTable->gold == 2) {
                if(str_contains($thisTable->class, "hotzone")) {
                    DB::table('tabel_gamebes')->where('baris', $baris)->where('kolom', $kolom)->update(['gold' => 0, 'class' => 'hotzone gold-bar']);
                } else {
                    DB::table('tabel_gamebes')->where('baris', $baris)->where('kolom', $kolom)->update(['gold' => 0, 'class' => 'gold-bar']);
                }
            } elseif ($thisTable->gold == -1) {
                DB::table('tabel_gamebes')->where('baris', $baris)->where('kolom', $kolom)->update(['gold' => 0, 'class' => 'lava']);
            }
        }
    }

    public function updatePosition(Request $request) {
        $position = $request['position'];
        GameBesar::where("id_lingkarang","=", $request['id'])->update(['pos_lingkarang'=> $position]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GameBesar  $gameBesar
     * @return \Illuminate\Http\Response
     */
    public function show(GameBesar $gameBesar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GameBesar  $gameBesar
     * @return \Illuminate\Http\Response
     */
    public function edit(GameBesar $gameBesar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GameBesar  $gameBesar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameBesar $gameBesar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GameBesar  $gameBesar
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameBesar $gameBesar)
    {
        //
    }
}
