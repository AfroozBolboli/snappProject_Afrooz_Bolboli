<?php

namespace App\Http\Resources;
use Illuminate\Container\Container;

use App\Models\Food;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodCategoryResource extends JsonResource
{


    public function toArray($request)
    {

        $categories = Food::select('category')->distinct()->where('restaurant_id', $this->id)->get()->toArray();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'foods' => ShowFoodResource::collection(Food::where('category', $this->title)->get())
        ]
        ;
        return parent::toArray($request);
    }
}
