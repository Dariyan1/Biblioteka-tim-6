<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZanrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zanrovis')->insert([
            'Naziv' => 'Pripovjetka']);
            DB::table('zanrovis')->insert([
                'Naziv' => 'Roman']);
    }
}
