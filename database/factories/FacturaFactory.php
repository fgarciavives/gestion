<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero'=>$this->faker->unique()->numberBetween(1,100),
            'nombre'=>$this->faker->name(),
            'direccion'=>$this->faker->sentence(),
            'poblacion'=>$this->faker->word(),
            'provincia'=>$this->faker->word(),
            'cpostal'=>$this->faker->numerify('#####'),
            'telefono'=>$this->faker->phoneNumber(),
            'fecha'=>$this->faker->date(),
            'iva' => $this->faker->numerify('#.##'),
            'cliente_id'=> $this->faker->numberBetween(1,10)
        ];
    }
}
