<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\WajibPajak;
use PDF;
use Illuminate\Support\Facades\DB;

class WajibPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.wajib_pajak.index',[
            'wajibpajak' => WajibPajak::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getKecamatan($id){
        $dataKecamatan = DB::table('kecamatans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKecamatan);
     }
     public function getKelurahan($id){
        $dataKelurahan = DB::table('kelurahans')->where('id_kecamatan',$id)->get();
        return response()->json($dataKelurahan);
     }
     public function cetak($id){
        $wpcetak = WajibPajak::where('id',$id)->first();
        $pdf = PDF::loadview('/dashboard/wajib_pajak/cetak',['wajibpajak'=>$wpcetak]);
        return $pdf->stream();
     }
    public function create()
    {
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $q = DB::table('wajib_pajaks')->select(DB::raw('MAX(RIGHT(no_pendaftaran,7)) as kode'));
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

        return view('dashboard.wajib_pajak.create', compact ([
            'kecamatans', 'kelurahans', 'q', 'kd'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // dd(request()->all());
        $validatedData = $request->validate([
            'tanggal_daftar' => 'required',
            'no_pendaftaran' => 'required',
            'jenis_pendapatan' => 'required',
            'jenis_usaha' => 'required',
            'nik' => 'required|max:16',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'rt' => 'required',
            'rw' => 'required',
            'kabupaten' => 'required',
            'id_kecamatan' => 'required',
            // 'kecamatan_luar' => 'required',
            'id_kelurahan' => 'required',
            // 'kelurahan_luar' => 'required',
            'no_telpon' => 'required|max:13',
            'kode_pos' => 'required|max:5',
            'email' => 'required|email:dns|unique:wajib_pajaks'

        ]);
        // dd($validatedData);
        // $data = [
        //     'tanggal_daftar' => $request->get('tanggal_daftar')
        // ];
        WajibPajak::create($validatedData);
         return redirect()->route('wajib_pajak.index')->with('success','berhasil ditambahkan');
        // $save = WajibPajaKController::create($validatedData);
        // $save->save();
        // if ($save) {
        //     return redirect()->route('wajib_pajak')->with('success','berhasil ditambahkan');
        // }
    }
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wp = WajibPajak::findOrFail($id);
        
      $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        return view('dashboard.wajib_pajak.edit', compact ([
            'wp','kecamatans','kelurahans'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'jenis_pendapatan' => 'required',
            'jenis_usaha' => 'required',
            'nik' => 'required|max:16',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'rt' => 'required',
            'rw' => 'required',
            'kabupaten' => 'required',
            'id_kecamatan' => 'required',
            // 'kecamatan_luar' => 'required',
            'id_kelurahan' => 'required',
            // 'kelurahan_luar' => 'required',
            'no_telpon' => 'required|max:13',
            'kode_pos' => 'required|max:5',
            'email' => 'required|email:dns|unique:wajib_pajaks'

        ];
        $validatedData = $request->validate($rules);
        WajibPajak::where('id') //salah
                    ->update($validatedData);
        return redirect('dashboard.wajib_pajak.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
