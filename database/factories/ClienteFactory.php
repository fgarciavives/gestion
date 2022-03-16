<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nif' => $this->faker->bothify('#########?'),
            'nombre' => $this->faker->name(),
            'direccion' => $this->faker->address(),
            'poblacion' => $this->faker->country(),
            'provincia' => $this->faker->city(),
            'cpostal' => $this->faker->numerify('######'),
            'email' => $this->faker->email(),
            'telefono' => $this->faker->phoneNumber()
        ];
    }
}
