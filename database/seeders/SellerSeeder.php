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
        foreach (Seller::factory()->getSellerNames() as $companyName) {
            Seller::factory(1)->has(Location::factory()->count(rand(1, 4)))->create([
                "name" => $companyName
            ]);
        }
    }
}
