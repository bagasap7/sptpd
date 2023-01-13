<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTipeData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::table('transaksis',function(Blueprint $table){

            // $table->dropForeign(['id_wajib_pajak']);
            $table->integer('jumlah_bayar')->nullable()->change();
            $table->date('tanggal_pembayaran')->nullable()->change();
            $table->date('tanggal_jatuh_tempo')->nullable()->change();
            $table->integer('jumlah_denda')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
