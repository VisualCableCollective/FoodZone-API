<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request) {
        return $request->user()->seller->productCategories;
    }

    public function store(StoreCategoryRequest $request) {
        $validatedRequest = $request->validated();

        $seller = $request->user()->seller;

        $category = $seller->productCategories()->create([
            'name' => $validatedRequest["name"]
        ]);

        $category->thumbnail_path = $request->file('thumbnail')->storeAs(
            'public/thumbnails/categories', $category->id . "." . $request->file('thumbnail')->getClientOriginalExtension()
        );

        $category->save();

        return ["success" => true, "data" => $category];
    }
}
