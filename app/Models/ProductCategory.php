<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * A product category represents a category of products (for example drinks, burgers, desserts, etc.)
 *
 * @property string $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $name
 */
class ProductCategory extends BaseUuidModel
{
    use HasFactory;

    /**
     * Get the products of this category.
     */
    public function products()
    {
        return $this->hasMany(Product::class, "category_id");
    }
}
