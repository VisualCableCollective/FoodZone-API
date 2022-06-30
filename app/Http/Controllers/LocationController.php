<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationsList\SellerCollection;
use App\Models\Location;
use App\Models\Seller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return SellerCollection
     */
    public function index()
    {
        // Get locations near the user grouped by the seller to minimize data usage
        $locations = Location::take(6)->get([
            'id',
            'seller_id',
            'address',
            'additional_address',
            'city',
            'zip_code',
            'latitude',
            'longitude'
        ])->groupBy('seller_id');

        $sellers = Seller::select('name', 'id')->find($locations->keys());
        foreach ($sellers as $seller) {
            $seller->locations = $locations[$seller->id];
        }

        return new SellerCollection($sellers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
