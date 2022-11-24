<?php

namespace App\Http\Resources;

use App\Models\Food;
use Illuminate\Http\Resources\Json\JsonResource;

class CartFoodResource extends JsonResource

{
    public function toArray($request)
    {
        return [
            'id' => $this->food_id,
            'title' => Food::find($this->food_id)->name,
            'count' => $this->count,
            'price' => $this->price
        ];

        return parent::toArray($request);
    }
}
