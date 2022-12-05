<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekPajak extends Model
{
    use HasFactory;

    public function wajibpajak(){
        return $this->belongsTo(WajibPajak::class,'id_wajib_pajak','id');
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'kecamatan_id','id');
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'kelurahan_id','id');
    }
}
