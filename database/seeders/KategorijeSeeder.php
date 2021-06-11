<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class KategorijeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategorijes')->insert([
            'Naziv' => 'Bajka' ]);
            DB::table('kategorijes')->insert([
                'Naziv' => 'Basna' ]);
    }
}
