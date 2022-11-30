<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $fillable = [
       'id_kecamatans',
        'nama_kelurahan',
        'kode_kelurahan',
    ];
    public function kecamatan(){
        return $this->hasOne(Kecamatan::class,'id_kecamatans','id');
    }
    public function wajib_pajak(){
        return $this->hasMany(WajibPajak::class,'id_kelurahans','id');
    }
    public function objek_pajak(){
        return $this->hasMany(ObjekPajak::class,'id_kelurahans','id');
    }
}
