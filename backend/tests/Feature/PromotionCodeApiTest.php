<?php

namespace Tests\Feature;

use App\Models\Promotion;
use App\Models\PromotionCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PromotionCodeApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    public function test_get_promotion_codes_from_api()
    {
        $promotion = new Promotion();
        $promotion->name = "Name Test";
        $promotion->detail = "Detail Test";
        $promotion->discount_type = "percent";
        $promotion->percent = 10;
        $promotion->is_active = true;
        $promotion->amount = 10;
        $promotion->total_amount = 10;
        $promotion->save();

        for ($i = 0; $i < 4; $i++) {
            $promotionCode = new PromotionCode();
            $promotionCode->code = 'Code Test';
            $promotion->promotionCodes()->save($promotionCode);
        }

        $response = $this->get('/api/promotion_codes');

        $response->assertStatus(200);

        $responseContent = $response->getContent();

        $responseList = json_decode($responseContent)->data;

        $this->assertEquals(4, collect($responseList)->count());
    }

    public function test_update_promotion_codes_from_api() {
        $promotion = new Promotion();
        $promotion->name = "Name Test";
        $promotion->detail = "Detail Test";
        $promotion->discount_type = "percent";
        $promotion->percent = 10;
        $promotion->is_active = true;
        $promotion->amount = 10;
        $promotion->total_amount = 10;
        $promotion->save();

        $promotionCode = new PromotionCode();
        $promotionCode->code = 'Code Test';
        $promotion->promotionCodes()->save($promotionCode);

        $response = $this->put('/api/promotion_codes/' . $promotionCode->id, [
            'redeemed_at' => now()
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', 'Promotion Code updated successfully with id 1')
                ->etc()
        );
    }

    public function test_delete_prmotion_codes_from_api() {
        $promotion = new Promotion();
        $promotion->name = "Name Test";
        $promotion->detail = "Detail Test";
        $promotion->discount_type = "percent";
        $promotion->percent = 10;
        $promotion->is_active = true;
        $promotion->amount = 10;
        $promotion->total_amount = 10;
        $promotion->save();

        $promotionCode = new PromotionCode();
        $promotionCode->code = 'Code Test';
        $promotion->promotionCodes()->save($promotionCode);

        $response = $this->delete('/api/promotion_codes/' . $promotionCode->id);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', 'Promotion Code Code Test deleted successfully')
                ->etc()
        );
    }
}
