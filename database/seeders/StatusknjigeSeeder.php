<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusknjigeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statusknjiges')->insert([
            'Naziv' => 'Vracena']);

        DB::table('statusknjiges')->insert([
            'Naziv' => 'Izdata']);

        DB::table('statusknjiges')->insert([
              'Naziv' => 'Vracena sa prekoracenjem']);
    }
}
