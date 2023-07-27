<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regiones')->insert([
            'name' => 'Región Noreste'
        ]);
        DB::table('regiones')->insert([
            'name' => 'Región Occidente'
        ]);
        DB::table('regiones')->insert([
            'name' => 'Región Oriente'
        ]);
        DB::table('regiones')->insert([
            'name' => 'Región Centronorte'
        ]);
        DB::table('regiones')->insert([
            'name' => 'Región Centrosur'
        ]);
        DB::table('regiones')->insert([
            'name' => 'Región Suroeste'
        ]);
        DB::table('regiones')->insert([
            'name' => 'Región Sureste'
        ]);
    }
}
