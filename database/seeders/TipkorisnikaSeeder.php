<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipkorisnikaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipkorisnikas')->insert([
            'Naziv' => 'Bibliotekar']);

            DB::table('tipkorisnikas')->insert([
                'Naziv' => 'Ucenik']);

    }
}
