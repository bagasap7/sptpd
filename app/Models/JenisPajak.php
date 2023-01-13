<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPajak extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pajak',
        'kode_jenis_pajak'
    ];
    protected $table = 'jenis_pajaks';

    public function objekpajak(){
        return $this->hasMany(ObjekPajak::class,'id_objek_pajak','id');
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class,'id_transaksi','id');
    }
}
