<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('dashboard.pembayaran.index',[
             
             "transaksi" => Transaksi::where('tanggal_pembayaran','!=', null)->get()
        
        ]);
    }
}
