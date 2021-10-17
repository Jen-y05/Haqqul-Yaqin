<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubKategoriController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TransaksiController;
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

//public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Route akun
Route::get('/Akuns', [AkunController::class, 'index']);
Route::get('/Akuns{$id}', [AkunController::class, 'show']);
Route::get('/Akuns/search/{jenis}', [AkunController::class, 'search']);

//Route kategori
Route::get('/Kategoris', [KategoriController::class, 'index']);
Route::get('/Kategoris{$id}', [KategoriController::class, 'show']);
Route::get('/Kategoris/search/{name}', [KategoriController::class, 'search']);

//Route subkategori
Route::get('/SubKategoris', [SubKategoriController::class, 'index']);
Route::get('/SubKategoris{$id}', [SubKategoriController::class, 'show']);
Route::get('/SubKategoris/search/{name}', [SubKategoriController::class, 'search']);

//Route tag
Route::get('/Tags', [TagController::class, 'index']);
Route::get('/Tags{$id}', [TagController::class, 'show']);
Route::get('/Tags/search/{name}', [TagController::class, 'search']);

//Route transaksi
Route::get('/Transaksis', [TransaksiController::class, 'index']);
Route::get('/Transaksis{$id}', [TransaksiController::class, 'show']);
// Route::get('/Transaksis/search/{name}', [TransaksiController::class, 'search']);

//Route produk
Route::get('/produks', [ProdukController::class, 'index']);
Route::get('/produks{$id}', [ProdukController::class, 'show']);
Route::get('/produks/search/{name}', [ProdukController::class, 'search']);

//protected route
Route::group(['middleware' => ['auth:sanctum']], function (){
    //akun
    Route::post('/Akuns', [AkunController::class, 'store']);
    Route::put('/Akuns/{$id}', [AkunController::class, 'update']);
    Route::delete('/Akuns/{$id}', [AkunController::class, 'destroy']);
    //kategori
    Route::post('/Kategoris', [KategoriController::class, 'store']);
    Route::put('/Kategoris/{$id}', [KategoriController::class, 'update']);
    Route::delete('/Kategoris/{$id}', [KategoriController::class, 'destroy']);
    //subkategori
    Route::post('/SubKategoris', [SubKategoriController::class, 'store']);
    Route::put('/SubKategoris/{$id}', [SubKategoriController::class, 'update']);
    Route::delete('/SubKategoris/{$id}', [SubKategoriController::class, 'destroy']);
    //tag
    Route::post('/Tags', [TagController::class, 'store']);
    Route::put('/Tags/{$id}', [TagController::class, 'update']);
    Route::delete('/Tags/{$id}', [TagController::class, 'destroy']);
    //transaksi
    Route::post('/Transaksis', [TransaksiController::class, 'store']);
    Route::put('/Transaksis/{$id}', [TransaksiController::class, 'update']);
    Route::delete('/Transaksis/{$id}', [TransaksiController::class, 'destroy']);
    //produk
    Route::post('/produks', [ProdukController::class, 'store']);
    Route::put('/produks/{$id}', [ProdukController::class, 'update']);
    Route::delete('/produks/{$id}', [ProdukController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});