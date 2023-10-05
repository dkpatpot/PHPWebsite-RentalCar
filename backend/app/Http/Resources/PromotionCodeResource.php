<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PromotionCodeResource extends JsonResource
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
            'code' => $this->code,
            'user' => $this->whenNotNull($this->user_id),
            'redeemed_at' => $this->whenNotNull($this->redeemed_at),
            // 'reward' => new RewardResource($this->whenLoaded('reward'))
        ];
        // $table->id();
        // $table->foreignIdFor(\App\Models\Promotion::class);
        // $table->string('code');
        // $table->foreignIdFor(\App\Models\User::class)->nullable();
        // $table->timestamp('redeemed_at')->nullable();
        // $table->timestamps();
        // $table->softDeletes();

    }
}
