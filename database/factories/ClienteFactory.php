<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->firstname(),
            'apellidos' => $this->faker->lastname(),
            'nom_empresa' => $this->faker->firstname(),
            'dni' => $this->faker->dni(), 
            'cif' => $this->faker->vat(), 
            'email' => $this->faker->email(), 
            'telefono' => $this->faker->tollFreeNumber(),
            'movil' => $this->faker->mobileNumber(),
            'direccion' => $this->faker->address(),  
            'per_contacto' =>$this->faker->firstname(),

        ];
    }
}
