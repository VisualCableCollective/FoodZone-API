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
 * @property string $thumbnail_path
 * @property string $seller_id
 */
class ProductCategory extends BaseUuidModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the products of this category.
     */
    public function products()
    {
        return $this->hasMany(Product::class, "category_id");
    }

    /**
     * Get the seller that owns the product category.
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
