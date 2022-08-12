<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\ProductCategory;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $convCatNames = [];
        foreach (ProductCategory::factory()->getCategoryNames() as $catName) {
            $convCatNames[] = $catName;
        }

        // Sellers
        User::factory()->count(rand(10, 100))->has(
            Seller::factory()
                ->times(1)
            ->has(Location::factory()->count(rand(1, 4)))
            ->has(ProductCategory::factory()
                ->count(rand(3, count(ProductCategory::factory()->getCategoryNames())))
                ->state(new Sequence(fn ($sequence) => ['name' => next($convCatNames)],))
            )
            ->state([
                "name" => Seller::factory()->getSellerNames()[array_rand(Seller::factory()->getSellerNames())]
            ])
        )->create();

        // Users
        User::factory()->count(rand(10, 100))->create();
    }
}
