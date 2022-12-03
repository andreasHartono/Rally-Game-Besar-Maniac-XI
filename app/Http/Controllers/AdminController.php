<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Pos;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function index(Request $request)
   {
      // $players = DB::table('players')->where('status', 'Player')->get();
      $players = Player::where('status', 1)->get();
      $pos = Pos::all();
      $player = Player::find(Auth::user()->id);
      //jika masuk admin, tulisan di atas menjadi admin, kalau penpos maka akan jadi nama pos nya
      if($player->id == 1){
         $nama = "Admin";
      }else{
         $id = $player->id - 1;
         $jaga = Pos::where('id', $id)->get();
         $nama = "Pos ".$jaga[0]->nama;
      }
      $gamebes = DB::table('game_besars')->get();
      return view('admin.semua', compact('players', 'pos', 'nama', 'gamebes'));
   }

   public function addMonyx(Request $request)
   {
      $player = Player::find(Auth::user()->id);
      $pos_id = $player->id - 1;
      $team_id = $request->get("team_id");
      $monyx = $request->get("monyx");
      $team = Player::find($team_id);
      $nomer = $team->id - 16;
      $pos = Pos::find($pos_id);

      if (count($team->pos()->wherePivot('player_id', $team_id)->wherePivot('pos_id', $pos_id)->get()) > 0) {
         $status = "failed";
         $message = "Tim {$nomer} sudah bermain di pos {$pos->nama}";
      } else {
         $team->pos()->attach($pos_id, ['poin' => $monyx]);
         $team->increment('monyx', $monyx);
         // $team->increment('poin', $monyx);
         $status = "success";
         $message = "berhasill tambah monyx";
      }

      //tambahkan artifacts ke pos yang buka dungeon
      if($pos_id <= 12){
         $team->artifact()->attach($pos_id);
      }

      $new_poin = $team->pos->sum('pivot.poin');
      $new_monyx = $team->monyx;

      return response()->json(array(
         'new_poin' => $new_poin,
         'new_monyx' => $new_monyx,
         'status' => $status,
         'message' => $message
      ), 200);
   }

   public function showPelanggaran($id)
   {
      $pelanggarans = DB::table('pelanggarans')->where('id', $id)->get();
      return view('admin.pelanggaran', ['pelanggarans' => $pelanggarans, 'idplayer' => $id]);
   }

   public function showPoin($id)
   {
      $pos = DB::table('pos')->get();
      $player = DB::table('players')->where('id', $id)->get();
      return view('admin.poin', ['pos' => $pos, 'player' => $player]);
   }

   public function showKey($id)
   {
      $player = DB::table('players')->where('id', $id)->first();
      return view('admin.key', ['player' => $player]);
   }

   public function editPelanggaran($id)
   {
      $pelanggaran = DB::table('pelanggarans')->where('idpelanggarans', $id)->get();

      return view('admin.edit_pelanggaran', ['pelanggaranEdit' => $pelanggaran]);
   }

   public function updatePelanggaran(Request $req)
   {
      DB::table('pelanggarans')->where('idpelanggarans', $req->txtId)->update([
         'nama' => $req->txtNama,
         'minus_poin' => $req->txtMinusPoin
      ]);
   }

   public function deletePelanggaran($id)
   {
      DB::table('pelanggarans')->where('idpelanggarans', $id)->delete();
   }

   public function editPoin(Request $req)
   {

      $selisih = $req->txtInputPoin - $req->txtPoinAwal;
      $player = DB::table('players')->where('id', $req->inputIdPlayer)->first();
      $poin_akhir = $player->mcoins + $selisih;

      DB::table('players')->where('id', $req->inputIdPlayer)->update(
         [
            'mcoins' => $poin_akhir
         ]
      );
      DB::table('poins')->where([['id', $req->inputIdPlayer], ['idpos', $req->inputIdPos]])->update(
         [
            'poin' => $req->txtInputPoin
         ]
      );
      return redirect("/admin/poin/$req->inputIdPlayer");
   }

   public function editKey(Request $req)
   {
      DB::table('players')->where('id', $req->txtIdPlayer)->update(
         [
            'keys' => $req->txtNewKey
         ]
      );

      return redirect("/admin/");
   }

   public function showTambahPelanggaran($id)
   {
      return view('admin.tambah_pelanggaran', ['idplayer' => $id]);
   }

   public function inputPelanggaran(Request $req)
   {
      DB::table('pelanggarans')->insert(
         [
            'nama' => $req->txtNama,
            'minus_poin' => $req->txtMinusPoin,
            'id' => $req->txtIDPlayer
         ]
      );

      return redirect("/admin/pelanggaran/$req->txtIDPlayer");
   }

   /*  Section Map bagian admin */

   /*  Function show Map Control  */
   public function mapControl($idPos)
   {
      $data = Pos::where('id_penjaga', '=', $idPos)->get();
      //  dd($data);
      return view('admin.map', compact('data'));
   }

   public function mapControlAdmin() {
      $data = Pos::get();
      return view('admin.map', compact('data'));
   }

   /*  Function update map control */
   public function mapControlUpdate(Request $request)
   {
      $id = $request->get('id');
      $pos = $request->get('pos');
      $data = Pos::where('id_penjaga', '=',$id)->first();

      
      if ($pos == 1) $data->status = $request->hasil;
      elseif ($pos == 2) $data->status2 = $request->hasil;
      $data->save();

      $data = Pos::where('id_penjaga', '=',$id)->get();

      $hasil = json_decode($data, true);

      return response()->json(array(
         'status'=> 'ok',
         'msg' => $hasil[0]['status']
      ), 200);
   }

   /* Function show data link zoom */
   public function showLinkZoom(Request $request)
   {
      $id = $request->get('id');
      $pos = $request->get('pos');
      $data = Pos::where('id_penjaga','=',$id)->get();
      $hasil = json_decode($data, true);
      //dd($hasil);
      if ($pos == 1){
         return response()->json(array(
            'status'=>'oke',
            'msg'=>view('admin.getEditLinkZoom',compact('hasil'))->render()
         ),200);  
      } elseif ($pos == 2) {
         return response()->json(array(
            'status'=>'oke',
            'msg'=>view('admin.getEditLinkZoom2',compact('hasil'))->render()
         ),200);  
      }
   }

   /* Function update link zoom in map rally */
   public function updateLinkZoom(Request $request)
   {
      $id = $request->get('id');
      $pos = $request->get('pos');
      $data = Pos::where('id_penjaga', '=', $id)->first();

      if ($pos == 1) {
         $data->linkZoom = $request->linkZoom;
         $data->idZoom = $request->idZoom;
         $data->passZoom = $request->passZoom;
      } elseif ($pos == 2) {
         $data->linkZoom2 = $request->linkZoom;
         $data->idZoom2 = $request->idZoom;
         $data->passZoom2 = $request->passZoom;
      }
      $data->save();

      return response()->json(array(
         'status' => 'ok',
         'msg' => 'Data Link Zoom Pos berhasil di update'
      ), 200);
   }

   /*  End of Section Map */
}