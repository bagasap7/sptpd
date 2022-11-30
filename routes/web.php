<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WajibPajakController;
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

Route::get('/', function () {
    return view('home',[
        'title' => 'Home'
    ]);
});

Route::get('/login',[LoginController::class,'index']);
Route::get('/dashboard', function () {
    return view('dashboard.index',[
        'title' => 'Aplikasi E-SPTPD'
    ]);
});

Route::get('/wajib_pajak', [WajibPajakController::class,'index'])->name('wajib_pajak.index');
Route::get('/wajib_pajak/create', [WajibPajakController::class,'create'])->name('wajib_pajak.create');
Route::post('/wajib_pajak/store', [WajibPajakController::class,'store'])->name('wajib_pajak.store');
Route::get('/getKelurahan/{id}',[WajibPajakController::class,'getKelurahan'])->name('wajib_pajak.kelurahan');