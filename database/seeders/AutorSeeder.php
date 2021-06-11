<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('autors')->insert([
            'ImePrezime' => 'Ivo Andric',
            'Biografija' => 'Biografija Iva Andrica' ]);
            DB::table('autors')->insert([
                'ImePrezime' => 'Miroslav Krleza',
                'Biografija' => 'Biografija Miroslava Krleze' ]);
    }
}
