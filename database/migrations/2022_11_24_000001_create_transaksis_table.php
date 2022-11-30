<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_wajib_pajak')->references('id')->on('wajib_pajaks');
            $table->foreignId('id_objek_pajak')->references('id')->on('objek_pajaks');
            $table->foreignId('id_jenis_pajak')->references('id')->on('jenis_pajaks');
            $table->integer('no_transaksi');
            $table->date('tanggal_pendataan');
            $table->date('masa_awal');
            $table->date('masa_akhir');
            $table->string('norek_transaksi');
            $table->string('kode_bayar');
            $table->text('kegiatan');
            $table->text('ket_kegiatan');
            $table->integer('dasar_pengenaan');
            $table->integer('tarif_pajak');
            $table->integer('total_pajak');
            $table->integer('jumlah_bayar');
            $table->date('tanggal_pembayaran');
            $table->date('tanggal_jatuh_tempo');
            $table->integer('jumlah_denda');
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
        Schema::dropIfExists('transaksis');
    }
}
