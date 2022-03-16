<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Familia;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'descripcion'=>$this->faker->sentence(),
            'precio'=>$this->faker->numberBetween(1,10000),
            'familia_id'=>function(){
                //n
                return $this->faker->numberBetween(1,20);
            },
        ];
    }
}
