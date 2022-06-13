<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => "DEFAULT_CATEGORY_NAME" // replaced by seeder
        ];
    }

    public function getCategoryNames(): array
    {
        return [
            "Getränke",
            "Burger",
            "Pasta",
            "Pizza",
            "Desserts"
        ];
    }
}
