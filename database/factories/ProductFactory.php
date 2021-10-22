<?php

namespace Database\Factories\Models;

use App\Models\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = App\Models\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->$faker->unique()->word,
            'description' => $this->$faker->sentence(),
            'price' => 12.2,
        ];
    }
}
