<?php

namespace App\Http\Resources;

use App\Models\Food;
use App\Models\Order;
use App\Models\OrderFood;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{

    public function toArray($request)
    {

        $foods = OrderFood::where('order_id', $this->order_id)->get();
        foreach($foods as $food)
        {
            $food = Food::find($food->food_id);
            if($food)
                $Orderfoods[] = $food->name;
        }

        return[
            'author' => [
                'name' => auth()->user()->name,
            ],
            'foods' => $Orderfoods,
            'created_at' => $this->created_at,
            'score' => $this->score,
            'content' => $this->comment
        ];
        return parent::toArray($request);
    }
}
