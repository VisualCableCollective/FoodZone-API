<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * A location represents for example a single restaurant of a company at a specific address.
 *
 * @property string $id as uuid
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $address includes the street name and house number
 * @property string $additional_address just extra information
 * @property string $city
 * @property int    $zip_code
 * @property string $seller_id
 */
class Location extends BaseUuidModel
{
    use HasFactory;

    /**
     * Get the seller that owns the location.
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
