<?php

namespace App\Http\Controllers;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\WajibPajak;
use App\Models\ObjekPajak;
use App\Models\JenisPajak;
use App\Models\Rekening;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjekPajakController extends Controller
{
    public function index(){
        $this->authorize('admin');
        return view('dashboard.objek_pajak.index',[
            
            'wajibpajak' => WajibPajak::all(),
            'objekpajak' => ObjekPajak::all()

        ]);
    }
     public function getKecamatanObjek($id){
        $dataKecamatan = DB::table('kecamatans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKecamatan);
     }
     public function getKelurahanObjek($id){
        $dataKelurahan = DB::table('kelurahans')->where('id_kecamatan',$id)->where('kode_kelurahan','!=','00')->get();
        return response()->json($dataKelurahan);
     }
    public function getRekening($id){
        $dataRekening = DB::table('rekenings')->where('id_jenis_pajak',$id)->get();
        return response()->json($dataRekening);
    }
    public function create($id){
        $kecamatans = Kecamatan::where('kode_kecamatan','!=','00')->get();
        // $kelurahans = Kelurahan::all();
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
            'jenispajak','rekening','kecamatans','wajibpajak',
            'q', 'kd'
        ]));
    }
    public function store(Request $request){
       
        $validatedData = $request->validate([
            'id_wajib_pajak' => 'required',
            'tanggal_daftar_objek' => 'required',
            'no_objek' => 'required',
            'id_jenis_pajak' => 'required',
            'id_rekening' => 'required',
            'nama_objek' => 'required|max:255',
            'alamat_objek' => 'required|max:255',
            'rt_objek' => 'required',
            'rw_objek' => 'required',
            'id_kecamatan' => 'required',
            // 'kecamatan_luar' => 'required',
            'id_kelurahan' => 'required',
            // 'kelurahan_luar' => 'required',
            'kode_pos_objek' => 'required|max:5',
            'latitude' => 'required',
            'longitude' => 'required'

        ]);
      
        ObjekPajak::create($validatedData);
        
         return redirect()->route('objek_pajak.index')->with('success','Objek Pajak berhasil ditambahkan');
    }

    public function edit($id){
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $jenispajak = JenisPajak::all();
        $rekening = Rekening::all();
        // $wajibpajak  = WajibPajak::where("id",$id)->first();
        $op = ObjekPajak::where("id",$id)->first();
        

        return view('dashboard.objek_pajak.edit', compact ([
            'kecamatans','kelurahans','rekening','jenispajak','op'
        ]));
    
    }
    public function update(Request $request,$id )
    {
        // $rules = [
        //     'jenis_pendapatan' => 'required',
        //     'jenis_usaha' => 'required',
        //     'nik' => 'required|unique:wajib_pajaks|max:16',
        //     'nama' => 'required|unique:wajib_pajaks|max:255',
        //     'alamat' => 'required|max:255',
        //     'rt' => 'required',
        //     'rw' => 'required',
        //     'kabupaten' => 'required',
        //     'id_kecamatan' => 'required',
        //     // 'kecamatan_luar' => 'required',
        //     'id_kelurahan' => 'required',
        //     // 'kelurahan_luar' => 'required',
        //     'no_telpon' => 'required|max:13',
        //     'kode_pos' => 'required|max:5',
        //     'email' => 'required|email:dns|unique:wajib_pajaks'

        // ];
        // $validatedData = $request->validate($rules);
              $op = ObjekPajak::findOrFail($id);
              $op->update($request->all());

        // dd($op);
        // WajibPajak::find($id) //salah
        //             ->update($validatedData);
        return redirect()->route('objek_pajak.index')->with('edit','Objek Pajak berhasil diedit');
    }
}
