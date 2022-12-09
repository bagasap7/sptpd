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
        JenisPajak::create([
            'nama_pajak' => 'Pajak Restoran',
            'kode_jenis_pajak' => '02',


        ]);
        JenisPajak::create([
            'nama_pajak' => 'Pajak Hiburan',
            'kode_jenis_pajak' => '03',


        ]);
        JenisPajak::create([
            'nama_pajak' => 'Pajak Parkir',
            'kode_jenis_pajak' => '07',


        ]);

        User::create([
            'name' => 'Bagasap',
            'tanggal_daftar' => "2022-12-09",
            'akses' => '1',
            'email'=> 'bagasap@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
