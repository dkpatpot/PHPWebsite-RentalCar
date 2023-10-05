<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
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
            'name' => $this->name,
            'detail' => $this->detail,
            'percent' => $this->percent,
            'amount' => $this->amount,
            'total_amount' => $this->total_amount,
            'is_active' => $this->is_active,
            'discount_type' => $this->discount_type,
            'codes' => $this->whenLoaded('promotionCodes')
            // $table->id();
            // $table->string('name');
            // $table->string('detail')->nullable();
            // $table->boolean('is_active');
            // $table->integer('discount')->default(0);
            // $table->integer('total_amount')->default(0);
            // $table->timestamps();
            // $table->softDeletes();
        ];

    }
}
