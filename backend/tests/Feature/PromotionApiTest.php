<?php

namespace Tests\Feature;

use App\Models\Promotion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PromotionApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    public function test_get_promotions_from_api()
    {
        for ($i = 0; $i < 10; $i++) {
            $promotion = new Promotion();
            $promotion->name = "Name Test {$i}";
            $promotion->detail = "Detail Test {$i}";
            $promotion->discount_type = "percent";
            $promotion->percent = 10;
            $promotion->is_active = true;
            $promotion->amount = 10;
            $promotion->total_amount = 10;
            $promotion->save();
        }

        $response = $this->get('/api/promotions');

        $response->assertStatus(200);

        $responseContent = $response->getContent();

        $responseList = json_decode($responseContent)->data;

        $this->assertEquals(10, collect($responseList)->count());
    }

    public function test_update_promotions_from_api() {
        $promotion = new Promotion();
        $promotion->name = "Name Test";
        $promotion->detail = "Detail Test";
        $promotion->discount_type = "percent";
        $promotion->percent = 10;
        $promotion->is_active = true;
        $promotion->amount = 10;
        $promotion->total_amount = 10;
        $promotion->save();

        $response = $this->putJson('/api/promotions/1', [
            'name' => 'Name Test Update',
            'detail' => 'Detail Test Update',
            'discount_type' => 'percent',
            'percent' => 10,
            'is_active' => true,
            'amount' => 10,
            'total_amount' => 10,
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', 'Promotion updated successfully with id 1')
                ->where('promotion_id', 1)
                ->etc()
        );
    }

    public function test_delete_cars_from_api() {
        $promotion = new Promotion();
        $promotion->name = "Name Test";
        $promotion->detail = "Detail Test";
        $promotion->discount_type = "percent";
        $promotion->percent = 10;
        $promotion->is_active = true;
        $promotion->amount = 10;
        $promotion->total_amount = 10;
        $promotion->save();

        $response = $this->delete('/api/promotions/1');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', 'Promotion Name Test deleted successfully')
                ->etc()
        );
    }
}
