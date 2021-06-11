<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IzdavacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('izdavacs')->insert([
            'Naziv' => 'Tobogan']);
            DB::table('izdavacs')->insert([
                'Naziv' => 'Gradska Biblioteka']);
            
    }
}
