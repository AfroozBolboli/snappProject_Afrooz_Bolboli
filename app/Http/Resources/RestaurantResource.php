<?php

namespace App\Http\Resources;

use App\Models\Food;
use App\Models\RestaurantWorkingTime;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{


    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'type' => $this->categories,
            'address' => [
                'address' => $this->address,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ],
            'is_open' => $this->status,
            'image' => $this->restaurantPicture,
            // 'score' => $this->score,
            'schedule' => RestaurantWorkingTimeResource::collection(RestaurantWorkingTime::where('restaurant_id', $this->id)->get())

        ];
        return parent::toArray($request);
    }
}
