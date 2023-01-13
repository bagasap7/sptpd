<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [
      'id'
    ];

    protected $table = 'transaksis';

    public function wajibpajak(){
        return $this->belongsTo(WajibPajak::class,'id_wajib_pajak','id');
    }
    public function objekpajak(){
        return $this->belongsTo(ObjekPajak::class,'id_objek_pajak','id');
    }
    public function jenispajak(){
        return $this->belongsTo(JenisPajak::class,'id_jenis_pajak','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }
    public function rekening(){
        return $this->belongSTo(Rekening::class,'id_rekening','id');
    }
}
