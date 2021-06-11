<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JezikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jeziks')->insert([
            'Naziv' => 'Crnogorski',
        ]);
        DB::table('jeziks')->insert([
            'Naziv' => 'Engleski',
        ]);
    }
}
