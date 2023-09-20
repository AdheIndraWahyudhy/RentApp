<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\lamanController;
use App\Http\Controllers\mobilController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('auth');
});
Route::prefix('/')->middleware('isUser')->group(function(){
    Route::get('dashboard',[lamanController::class, 'user']);
    Route::get('transaksi',[lamanController::class, 'transaksi']);
    Route::get('mobil/{id}',[lamanController::class, 'detail']);
    Route::post('mobil/order',[lamanController::class, 'order']);
});
Route::prefix('admin')->middleware('isAdmin')->group(function(){
    Route::get('/',[lamanController::class,'admin']);
    Route::resource('/mobil',mobilController::class);
    Route::prefix('transaksi')->group(function(){
        Route::get('/',[transaksiController::class,'index']);
        Route::get('/detail/{id}',[transaksiController::class,'detail']);
        Route::get('/detail/{id}/konfirmasi',[transaksiController::class,'confirm']);
        Route::get('/detail/{id}/batal',[transaksiController::class,'cencel']);
    });
    Route::prefix('user')->group(function(){
        Route::get('/',[userController::class,'index']);
        Route::get('/delete/{id}',[userController::class,'delete']);
    });

});

Route::prefix('auth')->group(function () {
    Route::middleware('isTamu')->group(function(){
        Route::get('/',[authController::class,'index']);
        Route::post('/login',[authController::class,'login']);
        Route::post('/registrasi',[authController::class,'create']);
        Route::get('/daftar',[authController::class,'register']);
    });
    Route::get('/logout',[authController::class,'logout']);
});
