<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class PesertaController extends Controller
{
    public function DashboardPeserta(Request $request)
    {
        $id = $request->session()->get('id');
        $peserta = DB::table('players')->where('id', $id)->get();
        return view('peserta.dashboard', ['peserta_view' => $peserta]);
    }

    public function MapPeserta(Request $request)
    {
        $id = $request->session()->get('id');
        $peserta_view = DB::table('players')->where('id', $id)->get();
        $result = DB::table('pos')->get();
        $game = json_decode($result, true);
        //dd($game);
        return view('peserta.map', compact('peserta_view'), compact('game'));
    }

    public function UpdateMap()
    {
      //   $id = $request->session()->get('id');
      //   $peserta_view = DB::table('players')->where('id', $id)->get();
        $result = DB::table('pos')->get();
        $game = json_decode($result, true);
        return response()->json(array(
            'pos1' => $game[0]['status'],
            'pos2' => $game[1]['status'],
            'pos3' => $game[2]['status'],
            'pos4' => $game[3]['status'],
            'pos5' => $game[4]['status'],
            'pos6' => $game[5]['status'],
            'pos7' => $game[6]['status'],
            'pos8' => $game[7]['status'],
            'pos9' => $game[8]['status'],
            'pos10' => $game[9]['status'],
            'pos11' => $game[10]['status'],
            'pos12' => $game[11]['status'],
            'pos13' => $game[12]['status'],
            'pos14' => $game[13]['status'],
            'pos15' => $game[14]['status'],
            'pos1_2' => $game[0]['status2'],
            'pos2_2' => $game[1]['status2'],
            'pos3_2' => $game[2]['status2'],
            'pos4_2' => $game[3]['status2'],
            'pos5_2' => $game[4]['status2'],
            'pos6_2' => $game[5]['status2'],
            'pos7_2' => $game[6]['status2'],
            'pos8_2' => $game[7]['status2'],
            'pos9_2' => $game[8]['status2'],
            'pos10_2' => $game[9]['status2'],
            'pos11_2' => $game[10]['status2'],
            'pos12_2' => $game[11]['status2'],
            'pos13_2' => $game[12]['status2'],
            'pos14_2' => $game[13]['status2'],
            'pos15_2' => $game[14]['status2'],
        ),200);
    }

    public function WarehousePeserta(Request $request)
    {
        $id = $request->session()->get('id');
        $peserta = DB::table('players')->where('id', $id)->get();
        // $pelanggaran = DB::table('pelanggarans')->where('id', $id)->get();
        $poin = DB::table('poins')->where('player_id', $id)->orderBy('pos_id', 'asc')->get();
        $artefak = DB::table('player_artifacts')->where('player_id', $id)->orderBy('artifact_id', 'asc')->distinct()->get();
        $pos = DB::table('pos')->get();
        $artifacts = DB::table('artifacts')->get();
        $gold = DB::table('game_besars')->where('id', $peserta[0]->gamebes_tim)->first()->poin;
        $item_name = ['Shovel', 'Scanner', 'Mini Scanner', 'Pickaxe', 'Thief Bag'];
        $item_amount = [];
        for ($i = 1; $i<=5; $i++){
            $team_item = DB::table('player_items')->where('player_id', $id)->where('item_id', $i)->sum('amount');
            array_push($item_amount, $team_item);
        }

        return view('peserta.warehouse', 
            ['peserta_view' => $peserta, 
            'poin_view' => $poin, 
            'pos' => $pos,
            'artefak' => $artefak,
            'artifacts' => $artifacts,
            'item_name' => $item_name,
            'item_amount' => $item_amount,
            'gold' => $gold,
            ]);
    }

    public function ShopPeserta(Request $request)
    {
        $id = $request->session()->get('id');
        $peserta = DB::table('players')->where('id', $id)->get();
        $item_name = ['Shovel', 'Scanner', 'Mini Scanner', 'Pickaxe', 'Thief Bag'];
        $item_amount = [];
        for ($i = 1; $i<=5; $i++){
            $team_item = DB::table('player_items')->where('player_id', $id)->where('item_id', $i)->sum('amount');
            array_push($item_amount, $team_item);
        }

        return view('peserta.shop', [
            'peserta_view' => $peserta,
            'item_name' => $item_name,
            'item_amount' => $item_amount,
        ]);
    }

    public function Buyitem(Request $request)
    {
        $id = $request->session()->get('id');
        $peserta = DB::table('players')->where('id', $id)->get();

        $name = $request->get('name');
        $amount = $request->get('amount');

        $item = DB::table('items')->where('name', $name)->get();
        $total = $amount * $item[0]->harga;

        $check = DB::table('player_items')
            ->where('player_id', $id)->where('item_id', $item[0]->id)->get();

        if ((int) $amount < 1) {
            $item_name = ['Shovel', 'Scanner', 'Mini Scanner', 'Pickaxe', 'Thief Bag'];
            $item_amount = [];
            for ($i = 1; $i<=5; $i++){
                $team_item = DB::table('player_items')->where('player_id', $id)->where('item_id', $i)->sum('amount');
                array_push($item_amount, $team_item);
            }
            return response()->json(array(
                'monyx' => $peserta[0]->monyx,
                'item_name' => $item_name,
                'item_amount' => $item_amount,
                'status' => "failed",
                'message' => "Jumlah pembelian minimal 1 item",
            ), 200);
        }

        if($total <= $peserta[0]->monyx){

            //kalau belum ada, tambahkan baris baru
            if(count($check) > 0){
                $new_amount = $check[0]->amount + $amount;
                DB::table('player_items')
                ->where('player_id', $id)->where('item_id', $item[0]->id)->update(['amount'=>$new_amount]);

            }else{
                DB::table('player_items')->insert([
                    'player_id' => $id,
                    'item_id' => $item[0]->id,
                    'amount'=>$amount
                ]);
            }

            //kurangi monyx
            $new_monyx = $peserta[0]->monyx - $total;
            DB::table('players')->where('id', $id)->update(['monyx'=>$new_monyx]);

            $item_name = ['Shovel', 'Scanner', 'Mini Scanner', 'Pickaxe', 'Thief Bag'];
            $item_amount = [];
            for ($i = 1; $i<=5; $i++){
                $team_item = DB::table('player_items')->where('player_id', $id)->where('item_id', $i)->sum('amount');
                array_push($item_amount, $team_item);
            }


            return response()->json(array(
                'monyx' => $new_monyx,
                'item_name' => $item_name,
                'item_amount' => $item_amount,
                'status' => "success",
                'message' => "Berhasil membeli item",
            ), 200);
        }else{
            $item_name = ['Shovel', 'Scanner', 'Mini Scanner', 'Pickaxe', 'Thief Bag'];
            $item_amount = [];
            for ($i = 1; $i<=5; $i++){
                $team_item = DB::table('player_items')->where('player_id', $id)->where('item_id', $i)->sum('amount');
                array_push($item_amount, $team_item);
            }
            return response()->json(array(
                'monyx' => $peserta[0]->monyx,
                'item_name' => $item_name,
                'item_amount' => $item_amount,
                'status' => "failed",
                'message' => "Monyx tidak mencukupi",
            ), 200);
        }

    }

    public function Update(Request $req)
    {
        $id = $req->session()->get('id');
        // Declare Status dan Message Json
        $status = "";
        $msg = "";

        // Ambil banyak kunci dari Ajax
        $banyak_kunci = $req->get('banyak_kunci');
        $harga_kunci = 100 * $banyak_kunci;

        // Ambil data peserta dari DB
        $data_peserta = DB::table('players')->where('id', $id)->get();

        // Declare Mcoins dan Keys dari Data Peserta
        foreach ($data_peserta as $dp) {
            $koin_peserta = $dp->mcoins;
            $key_peserta = $dp->keys;
        }

        // Process Penukaran Keys
        $koin_update = $koin_peserta - $harga_kunci;
        $key_update = $key_peserta + $banyak_kunci;

        if ($koin_update >= 0) {
            DB::table('players')->where('id', $id)->update(
                [
                    'mcoins' => $koin_update,
                    'keys' => $key_update
                ]
            );
            $status = 'berhasil';
            $msg = 'Penukaran berhasil! Selamat anda mendapatkan ' . $banyak_kunci . ' M-Key!';
        } else {
            $status = 'gagal';
            $msg = 'Maaf, M-Gold anda tidak mencukupi!';
        }

        return response()->json(array(
            'status' => $status,
            'msg' => $msg
        ), 200);
    }
}