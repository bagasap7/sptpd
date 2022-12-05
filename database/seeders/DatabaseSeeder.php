<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'id_wajib_pajak' => '2',
            'tanggal_daftar' => now(),
            'name' => 'Bagasap',
            'email' => 'bagasadityapramudana@gmail.com',
            'akses' => '1',
            'password' => bcrypt('12345')

        ]);
        // \App\Models\User::factory(10)->create();
    }
}
