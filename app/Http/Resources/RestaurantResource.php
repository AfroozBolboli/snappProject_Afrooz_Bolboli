<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
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
            'workingDay' => $this->workingDay,
            'openingTime' => $this->openingTime,
            'closingTime' => $this->closingTime,

        ];
        return parent::toArray($request);
    }
}
