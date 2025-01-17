<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "address" => $this->faker->streetAddress(),
            "city" => $this->faker->city(),
            "zip_code" => $this->faker->postcode(),
            "latitude" => $this->faker->latitude(54, 54.5),
            "longitude" => $this->faker->longitude(9, 9.3),
        ];
    }
}
