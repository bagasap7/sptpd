<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekPajak extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $table = 'objek_pajaks';

    public function wajibpajak(){
        return $this->belongsTo(WajibPajak::class,'id_wajib_pajak','id');
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'id_kecamatan','id');
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'id_kelurahan','id');
    }
    public function jenispajak(){
        return $this->belongsTo(JenisPajak::class,'id_jenis_pajak','id');
    }
    public function rekening(){
        return $this->belongsTo(Rekening::class,'id_rekening','id');
    }
    public function transaksi(){
        return $this->hasMany(Transaksi::class,'id_objek_pajak','id');
    }
}
