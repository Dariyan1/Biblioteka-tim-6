<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formats')->insert([
            'Naziv' => 'A4',
        ]);
        DB::table('formats')->insert([
            'Naziv' => 'A3',
        ]);
    }
}
