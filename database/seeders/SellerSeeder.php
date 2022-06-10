<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->getSellerNames() as $companyName) {
            Seller::factory(1)->has(Location::factory()->count(rand(1, 4)))->create([
                "name" => $companyName
            ]);
        }
    }

    private function getSellerNames(): array
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
