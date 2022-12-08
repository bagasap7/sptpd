<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\JenisPajak;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        JenisPajak::create([
            'nama_pajak' => 'Pajak Hotel',
            'kode_jenis_pajak' => '01',


        ]);
        // \App\Models\User::factory(10)->create();
    }
}
