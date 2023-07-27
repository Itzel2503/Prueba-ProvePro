<?php

namespace Database\Factories;

use App\Models\Proveedores;
use App\Models\Regiones;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'razon_social' => $this->faker->company,
            'numero_proveedor' => $this->faker->regexify('[0-9]{10}'),
            'fecha_registro' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'rfc' => $this->faker->unique()->regexify('[A-Z]{4}\d{6}[A-Z0-9]{3}'),
            'imagen_random' => $this->faker->imageUrl(),
            'id_region' => Regiones::inRandomOrder()->first()->id,
        ];
    }
}
