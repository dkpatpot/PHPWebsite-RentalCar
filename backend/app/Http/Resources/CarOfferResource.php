<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarOfferResource extends JsonResource
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
            'cus_firstname' => $this->cus_firstname,
            'cus_lastname' => $this->cus_lastname,
            'cus_email' => $this->cus_email,
            'cus_phone' => $this->cus_phone,
            'car_brand' => $this->car_brand,
            'car_model' => $this->car_model,
            'car_year' => $this->car_year,
            'car_color' => $this->car_color,
            'car_mileage' => $this->car_mileage,
            'offer_status' => $this->offer_status,
            'car_total_displacement' => $this->car_total_displacement,
            'car_fuel_type' => $this->car_fuel_type,
            'car_drive_system' => $this->car_drive_system,
            'car_transmission' => $this->car_transmission,
        ];
    }
}
