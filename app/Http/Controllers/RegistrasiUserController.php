<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WajibPajak;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrasiUserController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
       return view('dashboard.registrasi_user.index',[
            'wajibpajak' => WajibPajak::whereNotExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('users')
                     ->whereColumn('users.id_wajib_pajak', 'wajib_pajaks.id');
           })->get(),
           'users' =>User::where('akses','=','2')->get()
            
        ]);
    }

    public function create($id)
    {
        $wajibpajak = WajibPajak::where('id',$id)->first();

         return view('dashboard.registrasi_user.create', compact ([
            'wajibpajak'
        ]));
    }
    public function store(Request $request)
    {   
        // dd($request);
        $validatedData = $request->validate([
            'id_wajib_pajak' => 'required',
            'tanggal_daftar' => 'required',
            'akses' => 'required',
            'name' => 'required',
            'email' => 'required',
            'username' => 'required|unique:users',
            'no_telpon_wp' => 'required',
            'alamat_wp' => 'required',
            'password' => 'required|min:5|max:255'

        ]);
         $validatedData['password'] = Hash::make($validatedData['password']);
      
         User::create($validatedData);
         return redirect()->route('tambah_user.index')->with('success','Pengguna Baru Berhasil Ditambahkan');
    }
}
