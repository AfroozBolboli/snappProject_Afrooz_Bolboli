<?php

namespace App\Http\Resources;

use App\Models\OrderFood;
use App\Models\Restaurant;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{

    public function toArray($request)
    {

        return[
            'id' => $this->id,
            'restaurant' => CartRestaurantResource::make(Restaurant::find($this->restaurant_id)),
            'foods' => CartFoodResource::collection(OrderFood::where('order_id', $this->id)->get()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        return parent::toArray($request);
    }
}
