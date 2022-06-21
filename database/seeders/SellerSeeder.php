<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\ProductCategory;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        $convCatNames = [];
        foreach (ProductCategory::factory()->getCategoryNames() as $catName) {
            $convCatNames[] = $catName;
        }

        foreach (Seller::factory()->getSellerNames() as $companyName) {
            Seller::factory(1)
                ->has(Location::factory()->count(rand(1, 4)))
                ->has(ProductCategory::factory()->count(rand(3, count(ProductCategory::factory()->getCategoryNames())))
                    ->state(new Sequence(fn ($sequence) => ['name' => next($convCatNames)],))
                )
                ->create([
                "name" => $companyName
            ]);
        }
    }
}
