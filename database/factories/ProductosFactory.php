<?php

namespace Database\Factories;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Productos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'folio' => $this->faker->regexify('[A-Z0-9]{10}'),
            'cantidad' => $this->faker->numberBetween(0, 100),
            'unidad' => $this->faker->regexify('[0-9]{3}[A-Z0-9]{2}'),
            'precio_por_unidad' => $this->faker->numberBetween(1000,10000),
            'fecha_ingreso' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'id_proveedor' => Proveedores::inRandomOrder()->first()->id,
        ];
    }
}
