<?php

namespace App\Http\Controllers;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\WajibPajak;
use App\Models\JenisPajak;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjekPajakController extends Controller
{
    public function index(){
        return view('dashboard.objek_pajak.index',[
            // 'objekpajak' => ObjekPajak::all(),
            'wajibpajak' => WajibPajak::all()
        ]);
    }
     public function getKecamatanObjek($id){
        $dataKecamatan = DB::table('kecamatans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKecamatan);
     }
     public function getKelurahanObjek($id){
        $dataKelurahan = DB::table('kelurahans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKelurahan);
     }
    public function getRekening($id){
        $dataRekening = DB::table('rekenings')->where('id_jenis_pajak',$id)->get();
        return response()->json($dataRekening);
    }
    public function create($id){
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $jenispajak = JenisPajak::all();
        $rekening = Rekening::all();
        $wajibpajak  = WajibPajak::where("id",$id)->first();
        $q = DB::table('objek_pajaks')->select(DB::raw('MAX(RIGHT(no_objek,7)) as kode'));
        $kd ="";
        if ($q->count()>0) {
            foreach($q->get()as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%07s",$tmp);
            }
        }
        else{
            $kd = "0000001";
        }

        
        return view('dashboard.objek_pajak.create',compact([
            'jenispajak','rekening','kecamatans','kelurahans','wajibpajak',
            'q', 'kd'
        ]));
    }
    public function store(){
        
    }
}
