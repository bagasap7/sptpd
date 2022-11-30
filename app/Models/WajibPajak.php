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
        return $this->belongsTo(Kecamatan::class,'kecamatan_id','id');
    }
    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class,'kelurahan_id','id');
    }
    public function objekpajak(){
        return $this->hasMany(ObjekPajak::class,'objek_pajak_id','id');
    }
}
