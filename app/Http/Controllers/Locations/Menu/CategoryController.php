<?php

namespace App\Http\Controllers\Locations\Menu;

use App\Http\Controllers\Controller;
use App\Models\Location;

class CategoryController extends Controller
{
    public function index($locationId) {
        $location = Location::findorfail($locationId);
        return $location->seller->productCategories;
    }
}
