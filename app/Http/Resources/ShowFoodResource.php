<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowFoodResource extends JsonResource
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
            'title' => $this->categories,
            'price' => "$this->price".'تومن',
            'off' => 'تومن'."$this->discountPrice",
            'image' => $this->image_path,
            'ingredient' => $this->ingredient,

        ];
        return parent::toArray($request);
    }
}
