<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartRestaurantResource extends JsonResource
{

    public function toArray($request)
    {
        return[
            'title' => $this->name,
            'image' => $this->restaurantPicture
        ];

        return parent::toArray($request);
    }
}
