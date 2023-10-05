<?php

namespace Tests\Feature;

use App\Models\CarOffer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CarOfferApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    public function test_get_car_offers_from_api()
    {
        for ($i = 0; $i < 10; $i++) {
            $carOffer = new CarOffer();
            $carOffer->cus_firstname = "First Name Test {$i}";
            $carOffer->cus_lastname = "Last Name Test {$i}";
            $carOffer->cus_email = "Email Test {$i}";
            $carOffer->cus_phone = "Phone Test {$i}";
            $carOffer->car_brand = "Brand Test {$i}";
            $carOffer->car_model = "Model Test {$i}";
            $carOffer->car_year = "Year Test {$i}";
            $carOffer->car_color = "Color Test {$i}";
            $carOffer->car_mileage = "Mileage Test {$i}";
            $carOffer->save();
        }

        $response = $this->get('/api/car_offers');

        $response->assertStatus(200);

        $responseContent = $response->getContent();

        $responseList = json_decode($responseContent)->data;

        $this->assertEquals(10, collect($responseList)->count());
    }

    public function test_update_car_offers_from_api() {
        $carOffer = new CarOffer();
        $carOffer->cus_firstname = "First Name Test";
        $carOffer->cus_lastname = "Last Name Test";
        $carOffer->cus_email = "Email Test";
        $carOffer->cus_phone = "Phone Test";
        $carOffer->car_brand = "Brand Test";
        $carOffer->car_model = "Model Test";
        $carOffer->car_year = "Year Test";
        $carOffer->car_color = "Color Test";
        $carOffer->car_mileage = "Mileage Test";
        $carOffer->save();

        $response = $this->putJson('/api/car_offers/1', [
            'cus_firstname' => 'First Name Test Update',
            'cus_lastname' => 'Last Name Test Update',
            'cus_email' => 'Email Test Update',
            'cus_phone' => 'Phone Test Update',
            'car_brand' => 'Brand Test Update',
            'car_model' => 'Model Test Update',
            'car_year' => 'Year Test Update',
            'car_color' => 'Color Test Update',
            'car_mileage' => 'Mileage Test Update',
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', 'Car offer updated successfully with ID: 1')
                ->where('car_offer_id', 1)
                ->etc()
        );
    }
}
