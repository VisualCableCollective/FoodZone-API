<?php

namespace Database\Seeders;

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
            $seller = Seller::factory(1)->create([
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
