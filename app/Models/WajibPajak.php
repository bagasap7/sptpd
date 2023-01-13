<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WajibPajak extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $table = 'wajib_pajaks';

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,'id_kecamatan','id');
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'id_kelurahan','id');
    }
    public function objekpajak(){
        return $this->hasMany(ObjekPajak::class,'id_wajib_pajak','id');
    }
}
