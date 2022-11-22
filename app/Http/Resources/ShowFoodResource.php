<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowFoodResource extends JsonResource
{
    public static $wrap = 'categories';
    public function toArray($request)
    {
        return [
            
            'id' => $this->id,
            'title' => $this->name,
            'price' => "$this->price".'تومن',
            'off' => 'تومن'."$this->discountPrice",
            'image' => $this->image_path,
            'ingredient' => $this->ingredient,

        ];
        return parent::toArray($request);
    }
}
