<?php

namespace Database\Seeders;

use App\Models\Proveedores;
use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedores::factory()->count(10000)->create();
    }
}
