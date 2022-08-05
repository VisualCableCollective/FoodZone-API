<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetLocationsRequest;
use App\Http\Resources\LocationsList\SellerCollection;
use App\Models\Location;
use App\Models\Seller;
use Illuminate\Http\Request;
use Spatie\Geocoder\Facades\Geocoder;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return SellerCollection
     */
    public function index(GetLocationsRequest $request)
    {
        $data = null;
        if ($request->has("address")) {
            $data = $this->getDataByAddress($request);
        } else if ($request->has("latitude")) {
            $data = $this->getDataByGeocode($request);
        } else {
            abort(400, "Missing request parameters.");
        }

        return (new SellerCollection($data["sellers"]))->additional(['user_coords' => $data["user_coords"]]);
    }

    private function getDataByAddress(GetLocationsRequest $request) {
        $validated_request = $request->validated();

        $coords_data = Geocoder::getCoordinatesForAddress($validated_request['address']);

        // Get locations near the user grouped by the seller to minimize data usage
        $locations = Location::nearby([
            $coords_data["lat"],
            $coords_data["lng"]
        ], 10000, 1)
            ->get([
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

        return ["sellers" => $sellers, "user_coords" => ["lat" => $coords_data["lat"], "lng" => $coords_data["lng"]]];
    }

    private function getSellersByGeocode(GetLocationsRequest $request) {
        $validated_request = $request->validated();

        // Get locations near the user grouped by the seller to minimize data usage
        $locations = Location::nearby([
            $validated_request['latitude'],
            $validated_request['longitude']
        ], 10000, 1)
            ->get([
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

        return ["sellers" => $sellers, "user_coords" => ["lat" => $validated_request['latitude'], "lng" => $validated_request['longitude']]];
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
