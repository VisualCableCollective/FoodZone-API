<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => "DEFAULT_SELLER_NAME" // replaced by seeder
        ];
    }

    public function getSellerNames(): array
    {
        return [
            "Brummis Imbiss",
            "Restaurant Alte Schule",
            "Restaurant Am Wasserturm",
            "Volvo Trucks Dinner",
            "Brasserie Steffen"
        ];
    }
}
