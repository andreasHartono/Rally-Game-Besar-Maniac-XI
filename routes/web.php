<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
// Auth::routes(['register' => false]);

// 3 = Admin, 2 = Penpos, 1 = Peserta

Route::group(['middleware' => 'auth'], function() {
   //Route Peserta
   Route::get('/peserta', 'PesertaController@DashboardPeserta')->name('dashboard_peserta');
   Route::get('/peserta/warehouse', 'PesertaController@WarehousePeserta')->name('warehouse_peserta');
   Route::get('/peserta/shop', 'PesertaController@ShopPeserta')->name('shop_peserta');
   Route::post('/peserta/shop/buy', 'PesertaController@Update')->name('update');

   Route::get('/peserta/map', 'PesertaController@MapPeserta')->name('map_peserta');
   Route::post('/peserta/map/update', 'PesertaController@UpdateMap')->name('map_update');

   //route ajax
   Route::post('/buy-item', 'PesertaController@buyItem')->name('buy-item');
});

Route::group(['middleware' => 'admin'], function() {
   //Route Panitia sebagai admin
   /*
   Route::get('/admin', 'AdminController@index')->name('index_admin');
   Route::get('/admin/pelanggaran/{id}', 'AdminController@showPelanggaran')->name('pelanggaran_admin');
   Route::get('/admin/poin/{id}', 'AdminController@showPoin')->name('poin');
   Route::post('/admin/updatepoin', 'AdminController@editPoin');
   Route::get('/admin/key/{id}', 'AdminController@showKey')->name('key');
   Route::post('/admin/updatekey', 'AdminController@editKey');
   Route::get('/admin/pelanggaran/edit/{id}', 'AdminController@editPelanggaran')->name('edit_pelanggaran');
   Route::post('/admin/pelanggaran/update', 'AdminController@updatePelanggaran')->name('update_pelanggaran');
   Route::get('/admin/pelanggaran/delete/{id}', 'AdminController@deletePelanggaran')->name('delete_pelanggaran');
   Route::get('/admin/pelanggaran/{id}/tambah', 'AdminController@showTambahPelanggaran')->name('tambah_pelanggaran');
   Route::post('admin/pelanggaran/input', 'AdminController@inputPelanggaran');*/
   Route::get('/admin/map_control/{id}', 'AdminController@mapControl');
   Route::get('/admin/map_control', 'AdminController@mapControlAdmin');
   Route::post('/admin/map_control/update/', 'AdminController@mapControlUpdate')->name('map_admin_update');
   Route::post('/admin/getLinkZoom', 'AdminController@showLinkZoom')->name('penpos.getLinkZoom');
   Route::post('/admin/updateLinkZoom', 'AdminController@updateLinkZoom')->name('penpos.updateLinkZoom');
   //route ajax
   //Route::post('/tambah-monyx', 'AdminController@addMonyx')->name('tambah-monyx');
   
   // game besar
   Route::post('/game_besar/addPoint', 'GameBesarController@plusData')->name('game_besar_add');
   Route::post('/game_besar/steal', 'GameBesarController@steal')->name('game_besar_steal');
   Route::post('/game_besar/move', 'GameBesarController@move')->name('game_besar_move');
   Route::post('/game_besar/add_move', 'GameBesarController@addMove')->name('game_besar_add_move');
   Route::post('/game_besar/reset_move', 'GameBesarController@resetMove')->name('game_besar_reset_move');
   Route::post('/game_besar/get_move', 'GameBesarController@getMove')->name('game_besar_get_move');
   Route::get('/game_besar/update', 'GameBesarController@updateData')->name('game_besar_update');
   Route::post('/game_besar/store', 'GameBesarController@storeData')->name('game_besar_store');
   Route::get('/game_besar/get_item', 'GameBesarController@getPLayerItem')->name('game_besar_player_item');
   Route::post('/game_besar/update_item', 'GameBesarController@updateItem')->name('game_besar_update_item');
   Route::get('/game_besar/get_map', 'GameBesarController@getMap')->name('game_besar_get_map');
   Route::post('/game_besar/update_map', 'GameBesarController@updateMap')->name('game_besar_update_map');
   Route::get('/game_besar/get_gold', 'GameBesarController@getGold')->name('game_besar_get_gold');
   Route::post('/game_besar/update_position', 'GameBesarController@updatePosition')->name('game_besar_update_position');
   Route::get('/treasure-hunt', function () {
      return view('admin.gamebes');
   });
});

Route::group(['middleware' => 'penpos'], function() {
   Route::get('/admin', 'AdminController@index')->name('index_admin');
   Route::get('/admin/pelanggaran/{id}', 'AdminController@showPelanggaran')->name('pelanggaran_admin');
   Route::get('/admin/poin/{id}', 'AdminController@showPoin')->name('poin');
   Route::post('/admin/updatepoin', 'AdminController@editPoin');
   Route::get('/admin/key/{id}', 'AdminController@showKey')->name('key');
   Route::post('/admin/updatekey', 'AdminController@editKey');
   Route::get('/admin/pelanggaran/edit/{id}', 'AdminController@editPelanggaran')->name('edit_pelanggaran');
   Route::post('/admin/pelanggaran/update', 'AdminController@updatePelanggaran')->name('update_pelanggaran');
   Route::get('/admin/pelanggaran/delete/{id}', 'AdminController@deletePelanggaran')->name('delete_pelanggaran');
   Route::get('/admin/pelanggaran/{id}/tambah', 'AdminController@showTambahPelanggaran')->name('tambah_pelanggaran');
   Route::post('admin/pelanggaran/input', 'AdminController@inputPelanggaran');
   Route::get('/admin/map_control/{id}', 'AdminController@mapControl');
   Route::post('/admin/map_control/update/', 'AdminController@mapControlUpdate')->name('map_admin_update');
   Route::post('/admin/getLinkZoom', 'AdminController@showLinkZoom')->name('penpos.getLinkZoom');
   Route::post('/admin/updateLinkZoom', 'AdminController@updateLinkZoom')->name('penpos.updateLinkZoom');
   //route ajax
   Route::post('/tambah-monyx', 'AdminController@addMonyx')->name('tambah-monyx');
   // Route::get('/treasure-hunt', function() {
   //    return view('admin.gamebes');
   // });
});


// Route::get('/comingsoon', function () {
//    return view('comingsoon');
// });