<?php

namespace App\Http\Resources;

use App\Models\RestaurantWorkingTime;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{


    public function toArray($request)
    {
        $workingTime = RestaurantWorkingTime::where('restaurant_id', $this->id);
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
            "schedule" => [
                "شنبه" => [
                    'ساعت شروع' => $this->workingTime->saturdayStart,
                    'ساعت پایان' => $this->workingTime->saturdayEnd,
                ],
                'یک شنبه' => [
                    'ساعت شروع' => $this->workingTime->sundayStart,
                    'ساعت پایان' => $this->workingTime->sundayEnd,
                ],
                'دوشنبه' => [
                    'ساعت شروع' => $this->workingTime->mondayStart,
                    'ساعت پایان' => $this->workingTime->mondayEnd,
                ],
                'سه شنبه' => [
                    'ساعت شروع' => $this->workingTime->tuesdayStart,
                    'ساعت پایان' => $this->workingTime->tuesdayEnd,
                ],
                'چهارشنبه' => [
                    'ساعت شروع' => $this->workingTime->wednesdayStart,
                    'ساعت پایان' => $this->workingTime->wednesdayEnd,
                ],
                'پنجشنبه' => [
                    'ساعت شروع' => $this->workingTime->thursdayStart,
                    'ساعت پایان' => $this->workingTime->thursdayEnd,
                ],
                'جمعه' => [
                    'ساعت شروع' => $this->workingTime->fridayStart,
                    'ساعت پایان' => $this->workingTime->fridayEnd,
                ],
            ],

        ];
        return parent::toArray($request);
    }
}
