<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PovezSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('povezs')->insert([
            'Naziv' => 'Tvrdi',
        ]);
        DB::table('povezs')->insert([
            'Naziv' => 'Meki',
        ]);
            
            
                
                
             
    }
}
