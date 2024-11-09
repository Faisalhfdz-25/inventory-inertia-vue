<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'stock' => $this->faker->numberBetween(1, 100), // Mengisi stock dengan angka acak antara 1-100
            'price' => $this->faker->numberBetween(1000, 50000), // Mengisi harga dengan angka acak antara 1.000-50.000
            'is_active' => $this->faker->boolean, // Status aktif atau tidak (true/false)
            'category_id' => Category::factory(),
        ];
    }
}
