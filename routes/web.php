<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TunggakanController;
use App\Http\Controllers\ObjekPajakController;
use App\Http\Controllers\PajakHotelController;
use App\Http\Controllers\PajakRestoController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\WajibPajakController;
use App\Http\Controllers\PajakParkirController;
use App\Http\Controllers\RegistrasiUserController;


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
Route::get('/wajib_pajak/delete/{id}', [WajibPajakController::class,'destroy'])->name('wajib_pajak.delete');
Route::get('/getKelurahan/{id}',[WajibPajakController::class,'getKelurahan'])->name('wajib_pajak.kelurahan');
Route::get('/wajib_pajak/cetak/{id}',[WajibPajakController::class,'cetak'])->name('wajib_pajak.cetak');

// Objek Pajak
Route::get('/objek_pajak', [ObjekPajakController::class,'index'])->name('objek_pajak.index');
Route::get('/objek_pajak/create/{id}', [ObjekPajakController::class,'create'])->name('objek_pajak.create');
Route::post('/objek_pajak/store', [ObjekPajakController::class,'store'])->name('objek_pajak.store');
Route::get('/getKelurahanObjek/{id}',[ObjekPajakController::class,'getKelurahanObjek'])->name('objek_pajak.kelurahan');
Route::get('/getRekening/{id}',[ObjekPajakController::class,'getRekening'])->name('wajib_pajak.rekening');

// Pajak Hotel
Route::get('/pajak_hotel',[PajakHotelController::class,'index'])->name('pajak_hotel.index');

// Pajak Restoran
Route::get('/pajak_resto',[PajakRestoController::class,'index'])->name('pajak_resto.index');

// Pajak Parkir
Route::get('/pajak_parkir',[PajakParkirController::class,'index'])->name('pajak_parkir.index');

// Tunggakan
Route::get('/tunggakan',[TunggakanController::class,'index'])->name('tunggakan.index');

// Pembayaran
Route::get('/pembayaran',[PembayaranController::class,'index'])->name('pembayaran.index');

// Pendaftaran Akun
Route::get('/tambah_user',[RegistrasiUserController::class,'index'])->name('tambah_user.index');