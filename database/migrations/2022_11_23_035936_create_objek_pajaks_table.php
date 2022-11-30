<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjekPajaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objek_pajaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_wajib_pajak')->references('id')->on('wajib_pajaks');
            $table->foreignId('id_jenis_pajak')->references('id')->on('jenis_pajaks');
            $table->foreignId('id_rekening')->references('id')->on('rekenings');
            $table->foreignId('id_kecamatan')->references('id')->on('kecamatans');
            $table->foreignId('id_kelurahan')->references('id')->on('kelurahans');
            $table->date('tanggal_daftar_objek');
            $table->integer('no_objek');
            $table->string('nama_objek');
            $table->text('alamat_objek');
            $table->char('rt_objek',3);
            $table->char('rw_objek',2);
            $table->string('kode_pos_objek');
            $table->string('email');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objek_pajaks');
    }
}
