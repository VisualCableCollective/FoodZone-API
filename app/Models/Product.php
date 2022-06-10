<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * A product represents the type of a collection of product items (which represent every single physical item).
 *
 * @property string $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $name
 * @property float $price as decimal
 * @property string $category_id
 */
class Product extends BaseUuidModel
{
    use HasFactory;

    /**
     * Get the category that contains the product.
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
