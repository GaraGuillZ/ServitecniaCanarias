<?php

namespace Database\Factories;

use App\Models\Parte;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parte::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'n_parte' => $this->faker->vat(), 
            'descripcion' => $this->faker->sentences($nb = 3, $asText = false),
            'f_inicio' => $this->faker->date(),
            'trabajos_realizados' => $this->faker->sentences($nb = 3, $asText = false),
            'observaciones' => $this->faker->sentences($nb = 3, $asText = false),
            'mano_de_obra'=> $this->faker->firstname(),
            'empleado_id' => $this->faker->numberBetween(1, Empleado::count()),
            'cliente_id' => $this->faker->numberBetween(1, Cliente::count()),
        ];
    }
}
