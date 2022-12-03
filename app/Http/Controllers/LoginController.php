<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function index(Request $req)
   {
      //Auth::logout();
      //request()->session()->invalidate();
      //$req->session()->regenerate();
      return view('login-new');
   }
   /**
    * function for validate player when login.
    *
    * @var string
    */
   public function login(Request $req)
   {
      $credentials = $req->validate([
         'username' => ['required'],
         'password' => ['required']
      ]);

      if (Auth::attempt($credentials)) {
         $req->session()->regenerate();

         if (Auth::user()->status >= 2) {
            //dd('berhasil login dengan nama ' . auth()->user()->username);
            return redirect()->intended('/admin');
            //return redirect()->route('index_admin')->with('namaAdmin',auth()->user()->username);
            //return redirect()->intended('/admin')->with('namaAdmin', auth()->user()->username);
         } else {
            if ($req['username'] == 'MANIACXI') {
               $req->session()->put('id', Auth::user()->id);
               return redirect('/peserta/warehouse');
            }
            date_default_timezone_set("Asia/Jakarta");
            $endDate = "3 September 2022 09:00:00";
            $endDateTimestamp = strtotime($endDate);
            if (time() >= $endDateTimestamp) {
               $req->session()->put('id', Auth::user()->id);
               return redirect('/peserta/warehouse');
            } else {
               Auth::logout();
               request()->session()->invalidate();
               $req->session()->regenerate();
               session()->flash('cannotLogin', 'Login bisa dilakukan setelah tanggal 3 September 2022 09:00 WIB');
               return redirect('/');
            }
         }
      }

      return back()->with('loginError', 'Login Gagal Username atau Password Salah');

      /*
        if ($player = DB::table('players')->where('email', $req->get("txtEmail"))->first()) {
            $player = DB::table('players')->where('email', $req->get("txtEmail"))->first();
            if ($player->password == $req->txtPassword) {
                if ($player->role == 'player') {
                    $req->session()->put('id', $player->idplayers);
                    return redirect()->route('dashboard_peserta');
                } elseif ($player->role == 'admin') {
                    $req->session()->put('vialogin', 'admin');
                    return redirect()->route('index_admin');
                }
            } else {
                return redirect('/');
            }
        } else {
            return Redirect::back()->withErrors(['Email tidak valid!']);
        }
        */
   }

   public function logout(Request $request)
   {
      Auth::logout();
      request()->session()->invalidate();
      $request->session()->regenerate();
      return redirect('/');
   }
}