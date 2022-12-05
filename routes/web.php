<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WajibPajakController;
use App\Http\Controllers\ObjekPajakController;
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
// Login
Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::post('/login',[LoginController::class,'authenticate'])->name('login.authenticate');

Route::get('/dashboard', function () {
    return view('dashboard.index',[
        'title' => 'Aplikasi E-SPTPD'
    ]);
});
// Wajib Pajak
Route::get('/wajib_pajak', [WajibPajakController::class,'index'])->name('wajib_pajak.index');
Route::get('/wajib_pajak/create', [WajibPajakController::class,'create'])->name('wajib_pajak.create');
Route::post('/wajib_pajak/store', [WajibPajakController::class,'store'])->name('wajib_pajak.store');
Route::get('/wajib_pajak/edit/{id}', [WajibPajakController::class,'edit'])->name('wajib_pajak.edit');
Route::post('/wajib_pajak/update{id}', [WajibPajakController::class,'update'])->name('wajib_pajak.update');
Route::get('/getKelurahan/{id}',[WajibPajakController::class,'getKelurahan'])->name('wajib_pajak.kelurahan');

// Objek Pajak
Route::get('/objek_pajak', [ObjekPajakController::class,'index'])->name('objek_pajak.index');
Route::get('/objek_pajak/create/{id}', [ObjekPajakController::class,'create'])->name('objek_pajak.create');
Route::post('/objek_pajak/store', [ObjekPajakController::class,'store'])->name('objek_pajak.store');
// Route::get('/getKelurahan/{id}',[ObjekPajakController::class,'getKelurahan'])->name('objek_pajak.kelurahan');