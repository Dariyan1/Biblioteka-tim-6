<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PismoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pismos')->insert([
            'Naziv' => 'Cirilica' ]);
            DB::table('pismos')->insert([
                'Naziv' => 'Latinica' ]);
    }
}
