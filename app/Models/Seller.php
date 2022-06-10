<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * A seller account offers various products on the plattform and represents one company (with multiple locations).
 * It can be managed by multiple persons
 *
 * @property string id as uuid
 * @property string name
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Seller extends Model
{
    use HasFactory;

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
