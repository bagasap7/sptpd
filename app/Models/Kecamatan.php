<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'nama_kecamatan',
        'kode_kecamatan',
    ];
    public function wajib_pajak(){
        return $this->hasMany(WajibPajak::class,'id_kecamatans','id');
    }
    public function objek_pajak(){
        return $this->hasMany(ObjekPajak::class,'id_kecamatans','id');
    }
}
