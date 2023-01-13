<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TunggakanController extends Controller
{
    public function index()
    {
        return view('dashboard.tunggakan.index',[
             "transaksi" => Transaksi::where('tanggal_pembayaran', null)->when(Auth::user()->id_wajib_pajak,function($query){
                $query->where('id_wajib_pajak',Auth::user()->id_wajib_pajak); })->get()
        ]);
    }
    public function store(){
        // dd(request()->all());
        $id = request()->get('id');
        $jumlah_bayar = request()->get('jumlah_bayar');

        Transaksi::where('id',$id)->update(['jumlah_bayar' => $jumlah_bayar,
            'tanggal_pembayaran' => now(),]);

        //  Transaksi::create(
        //     [
            
        // ]);

        // dd($transaksi);

         return redirect()->route('tunggakan.index')->with('success','Pajak berhasil dibayar');
    }
}
