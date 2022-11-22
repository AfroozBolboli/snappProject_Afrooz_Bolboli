<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantWorkingTimeResource extends JsonResource
{
    public function toArray($request)
    {
        return [

            "شنبه" => [
                'ساعت شروع' => $this->saturdayStart,
                'ساعت پایان' => $this->saturdayEnd,
            ],
            'یک شنبه' => [
                'ساعت شروع' => $this->sundayStart,
                'ساعت پایان' => $this->sundayEnd,
            ],
            'دوشنبه' => [
                'ساعت شروع' => $this->mondayStart,
                'ساعت پایان' => $this->mondayEnd,
            ],
            'سه شنبه' => [
                'ساعت شروع' => $this->tuesdayStart,
                'ساعت پایان' => $this->tuesdayEnd,
            ],
            'چهارشنبه' => [
                'ساعت شروع' => $this->wednesdayStart,
                'ساعت پایان' => $this->wednesdayEnd,
            ],
            'پنجشنبه' => [
                'ساعت شروع' => $this->thursdayStart,
                'ساعت پایان' => $this->thursdayEnd,
            ],
            'جمعه' => [
                'ساعت شروع' => $this->fridayStart,
                'ساعت پایان' => $this->fridayEnd,
            ],

        ];
        return parent::toArray($request);
    }
}
