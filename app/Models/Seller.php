<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * A seller account offers various products on the plattform and represents one company (with multiple locations).
 * It can be managed by multiple persons
 *
 * @property string $id as uuid
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Seller extends BaseUuidModel
{
    use HasFactory;

    /**
     * Get the locations of this seller.
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    /**
     * Get the locations of this seller.
     */
    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class);
    }

    /**
     * Get the locations of this seller.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
