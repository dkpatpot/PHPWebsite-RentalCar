<?php

namespace Tests\Feature;

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Assert;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CarApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    public function test_get_cars_from_api()
    {
        for ($i = 0; $i < 10; $i++) {
            $car = new Car();
            $car->image = 'Image Test';
            $car->brand = "Brand Test {$i}";
            $car->years = '2020';
            $car->model = 'Model Test';
            $car->color = 'Color Test';
            $car->total_displacement = '1000';
            $car->mileage = '1000';
            $car->fuel_type = 'Fuel Test';
            $car->drive_system = 'Drive Test';
            $car->transmission = 'Transmission Test';
            $car->type = 'Type Test';
            $car->price = '1000';
            $car->save();
        }
        
        $response = $this->get('/api/cars');

        $response->assertStatus(200);

        $responseContent = $response->getContent();

        $responseList = json_decode($responseContent)->data;

        $this->assertEquals(10, collect($responseList)->count());
    }

    public function test_update_cars_from_api(){
        $car = new Car();
        $car->image = 'Image Test';
        $car->brand = "Brand Test";
        $car->years = '2020';
        $car->model = 'Model Test';
        $car->color = 'Color Test';
        $car->total_displacement = '1000';
        $car->mileage = '1000';
        $car->fuel_type = 'Fuel Test';
        $car->drive_system = 'Drive Test';
        $car->transmission = 'Transmission Test';
        $car->type = 'Type Test';
        $car->price = '1000';
        $car->save();

        $response = $this->putJson('/api/cars/1', [
            'brand' => 'Brand Test 1',
            'years' => '2021',
            'model' => 'Model Test 1',
            'color' => 'Color Test 1',
            'total_displacement' => '1001',
            'mileage' => '1001',
            'fuel_type' => 'Fuel Test 1',
            'drive_system' => 'Drive Test 1',
            'transmission' => 'Transmission Test 1',
            'type' => 'Type Test 1',
            'price' => '1001',
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', 'Car updated successful with ID: 1')
                ->where('car_id', 1)
                ->etc()
        );
    }

    public function test_delete_cars_from_api(){
        $car = new Car();
        $car->image = 'Image Test';
        $car->brand = "Brand Test";
        $car->years = '2020';
        $car->model = 'Model Test';
        $car->color = 'Color Test';
        $car->total_displacement = '1000';
        $car->mileage = '1000';
        $car->fuel_type = 'Fuel Test';
        $car->drive_system = 'Drive Test';
        $car->transmission = 'Transmission Test';
        $car->type = 'Type Test';
        $car->price = '1000';
        $car->save();
        $car = Car::find(1);
        $car_code = $car->car_code;

        $response = $this->deleteJson('/api/cars/1');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', "Car {$car_code} deleted successfully")
                ->etc()
        );
    }
}
