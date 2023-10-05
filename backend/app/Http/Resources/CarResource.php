<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'car_code' => $this->car_code,
            'brand' => $this->brand,

            'years' => $this->years,
            'model' => $this->model,
            'color' => $this->color,
            'total_displacement' => $this->total_displacement,
            'mileage' => $this->mileage,
            'fuel_type' => $this->fuel_type,
            'drive_system' => $this->drive_system,
            'transmission' => $this->transmission,
            'type' => $this->type,

            'price' => $this->price,
            'status' => $this->status,
            'view_count' => $this->view_count,
            'like_count' => $this->like_count,
            'interest' => $this->interest,
            'down_payment' => $this->down_payment,
            'monthly_payment' => $this->monthly_payment,
            'pay_period' => $this->pay_period,
            'buy_by' => $this->buy_by,
            'p_code' => $this->p_code,
            'p_discount' => $this->p_discount,
            'price_with_vat' => $this->price_with_vat,
            'total_price' => $this->total_price,
            'image' => $this->image
        ];
        // return parent::toArray($request);
    }
}
