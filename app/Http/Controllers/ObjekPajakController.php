<?php

namespace App\Http\Controllers;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\WajibPajak;
use Illuminate\Http\Request;

class ObjekPajakController extends Controller
{
    public function index(){
        return view('dashboard.objek_pajak.index',[
            // 'objekpajak' => ObjekPajak::all(),
            'wajibpajak' => WajibPajak::all()
        ]);
    }
     public function getKecamatan($id){
        $dataKecamatan = DB::table('kecamatans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKecamatan);
     }
     public function getKelurahan($id){
        $dataKelurahan = DB::table('kelurahans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKelurahan);
     }
    public function create(){
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $wajibpajak  = WajibPajak::all();
        return view('dashboard.objek_pajak.create',compact([
            'kecamatans','kelurahans','wajibpajak'
        ]));
    }
    public function store(){
        
    }
}
