<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => \App\Models\Product::all()->random(),
            'color' => $this->faker->colorName(),
            'size' => $this->faker->numberBetween(20,50),
            'description' => $this->faker->sentence(15),
        ];
    }
}
