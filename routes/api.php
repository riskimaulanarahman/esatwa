<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('list-satwa','BackEndController@listsatwa');
Route::get('list-lokasi','BackEndController@listlokasi');
Route::get('get-satwa/{id}','BackEndController@getsatwa');
Route::post('ubah-satwa','BackEndController@ubahsatwa')->name('ubahsatwa');
Route::get('get-pengaduan/{id}','BackEndController@getpengaduan');
Route::post('ubah-pengaduan','BackEndController@ubahpengaduan')->name('ubahpengaduan');
Route::post('tambah-pengaduan','BackEndController@tambahpengaduan')->name('tambahpengaduan');


