<?php

namespace App\Http\Controllers;
use App\Models\WajibPajak;
use App\Models\ObjekPajak;
use App\Models\JenisPajak;
use App\Models\Transaksi;
use App\Models\Rekening;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PajakHotelController extends Controller
{
    public function index()
    {
        return view('dashboard.pajak_hotel.index',[
            'wajibpajak' => Wajibpajak::all(),
            'objekpajak' => ObjekPajak::where('id_jenis_pajak','=','1')->when(Auth::user()->id_wajib_pajak,function($query){
                $query->where('id_wajib_pajak',Auth::user()->id_wajib_pajak);
            })->get(),
            "transaksi" => Transaksi::where('id_jenis_pajak','=','1')->when(Auth::user()->id_wajib_pajak,function($query){
                $query->where('id_wajib_pajak',Auth::user()->id_wajib_pajak);
            })->get()
        ]);
            
    }
    public function create($id)
    {
        $objekpajak = ObjekPajak::where('id',$id)->first();

        $q = DB::table('transaksis')->select(DB::raw('MAX(RIGHT(no_transaksi,7)) as kode'));
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
        return view('dashboard.pajak_hotel.create',compact([
            'objekpajak','q','kd'
        ]));
    }
    public function store(Request $request )
    {
        dd($request);
        $validatedData = $request->validate([
            'id_wajib_pajak' =>'required',
            'id_objek_pajak' =>'required',
            'id_jenis_pajak' => 'required',
            'no_transaksi' => 'required',
            'tahun_pajak' => 'required',
            'masa_awal' => 'required',
            'masa_akhir' => 'required',
            'norek_transaksi' => 'required',
            'kegiatan' => 'required',
            'ket_kegiatan' => 'required',
            'dasar_pengenaan' =>'required',
            'tarif_pajak' => 'required',
            'total_pajak' => 'required'
        ]);
        // dd($validatedData);
        // $data = [
        //     'tanggal_daftar' => $request->get('tanggal_daftar')
        // ];
        $jenispajak = JenisPajak::where('id',$validatedData['id_jenis_pajak'])->first();
        $masaAkhir = Carbon::createFromFormat('Y-m', $validatedData['masa_akhir']);

         Transaksi::create(array_merge($validatedData,
            [
            'id_user' => Auth::user()->id,
            'tanggal_pendataan' => now(),
            'kode_bayar' => "17".sprintf('%02s',$jenispajak->kode_jenis_pajak).  "01".sprintf("%07s",$validatedData['no_transaksi']).date("Y"),
            'masa_awal' => Carbon::createFromFormat('Y-m', $validatedData['masa_awal']),
            'masa_akhir' => $masaAkhir,
            'tanggal_jatuh_tempo' => $masaAkhir->addMonth()
        ]));

        // dd($transaksi);

         return redirect()->route('pajak_hotel.index')->with('success','Pajak Hotel berhasil ditambahkan');
        // $save = WajibPajaKController::create($validatedData);
        // $save->save();
        // if ($save) {
        //     return redirect()->route('wajib_pajak')->with('success','berhasil ditambahkan');
        // }
    }
}
