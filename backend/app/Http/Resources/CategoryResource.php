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
            'brand' => $this->brand,
            'years' => $this->years,
            'model' => $this->model,
            'color' => $this->color,
            // $table->string('brand');
            // $table->string('years');
            // $table->string('model');
            // $table->string('color');
        ];
        // return parent::toArray($request);

    }
}
