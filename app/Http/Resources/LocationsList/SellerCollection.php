<?php

namespace App\Http\Resources\LocationsList;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SellerCollection extends ResourceCollection
{
    public static $wrap = 'sellers';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return SellerResource::collection($this);
    }
}
