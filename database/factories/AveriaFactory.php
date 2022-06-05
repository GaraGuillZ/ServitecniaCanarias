<?php

namespace Database\Factories;

use App\Models\Averia;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;
use App\Models\Empleado;

class AveriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Averia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->name(),
            'f_alta' => $this->faker->date(),
            'f_realizacion' => $this->faker->date(),
            'estado' => $this->faker->boolean(),
            'facturado' => $this->faker->boolean(),
            'observaciones' => $this->faker->name(),
            'empleado_id' => $this->faker->numberBetween(1, Empleado::count()),
            'cliente_id' => $this->faker->numberBetween(1, Cliente::count()),
        ];
    }
}
