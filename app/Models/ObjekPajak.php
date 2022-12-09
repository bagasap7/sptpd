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
        return $this->belongsTo(WajibPajak::class,'wajib_pajak_id','id');
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'kecamatan_id','id');
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'kelurahan_id','id');
    }
    public function jenispajak(){
        return $this->belongsTo(JenisPajak::class,'id_jenis_pajak','id');
    }
    public function rekening(){
        return $this->belongsTo(Rekening::class,'id_rekening','id');
    }
}
