<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PovezSeeder::class);
        $this->call(KategorijeSeeder::class);
        $this->call(ZanrSeeder::class);
        $this->call(FormatSeeder::class);
        $this->call(PismoSeeder::class);
        $this->call(IzdavacSeeder::class);
        $this->call(JezikSeeder::class);
        $this->call(AutorSeeder::class);
        $this->call(TipkorisnikaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StatusknjigeSeeder::class);
    }
}
