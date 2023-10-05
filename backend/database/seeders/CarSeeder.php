<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c_brand = ['TOYOTA', 'HONDA', 'MITSUBISHI', 'NISSAN', 'SUZUKI', 'BMW',
        'MERCEDES-BENZ', 'AUDI', 'VOLKSWAGEN', 'FORD'];
        $c_model = ['VIOS', 'CITY', 'MIRAGE', 'VERSA', 'SWIFT', 'i8',
        'S-CLASS', 'R8', 'BEETLE', 'MUSTANG'];
        $c_type = ['SEDAN', 'SUV', 'HATCHBACK', 'COUPE', 'HATCHBACK', 'SPORTSCAR',
        'VAN', 'PICKUP', 'MINIVAN', 'HYBRID'];

        for ($i = 0; $i < 10; $i++) {
            $car = new Car();
            $car->image = $c_brand[$i] . $c_model[$i] . '.jpg';
            $car->brand = $c_brand[$i];
            $car->model = $c_model[$i];
            $car->years = fake()->year();
            $car->color = fake()->colorName();
            $car->mileage = fake()->numerify('######');
            $car->price = fake()->numerify('########');
            $car->status = 'available';
            $car->type = $c_type[$i];
            $car->total_displacement = fake()->numerify('###');
            $car->fuel_type = 'Diesel';
            $car->transmission = 'Automatic';
            $car->view_count = fake()->numerify('##');
            $car->drive_system = 'FRONT-WHEEL DRIVE (FWD)';
            $car->save();
            $car->car_code =  substr($car->brand, 0, 1) . substr($car->model, 0, 1) .  mt_rand(10000,99999);
            $car->save();
        }

        for ($j = 0; $j < 7; $j++) {
            $car = new Car();
            $car->image = $c_brand[$j] . $c_model[$j] . '.jpg';
            $car->brand = $c_brand[$j];
            $car->model = $c_model[$j];
            $car->years = fake()->year();
            $car->color = fake()->colorName();
            $car->mileage = fake()->numerify('######');
            $car->price = fake()->numerify('########');
            $car->status = 'sold';
            $car->type = array_rand($c_type);
            $car->total_displacement = fake()->numerify('###');
            $car->fuel_type = 'Diesel';
            $car->transmission = 'Automatic';
            $car->view_count = fake()->numerify('##');
            $car->drive_system = 'FRONT-WHEEL DRIVE (FWD)';
            $car->interest = fake()->numerify('##');
            $car->down_payment = fake()->numerify('#######');
            $car->pay_period = fake()->numerify('##');
            $car->price_with_vat = fake()->numerify('#########');
            $car->monthly_payment = fake()->numerify('######');
            $car->total_price = fake()->numerify('#########');
            $car->buy_by = 'user@car.com';
            $car->save();
            $car->car_code = substr($car->brand, 0, 1) . substr($car->model, 0, 1) .  mt_rand(10000,99999);
            $car->save();
        }

        $f_name = ['Smith', 'Johnson', 'Williams'];
        $l_name = ['Brown', 'Jones', 'Miller'];

        for ($k = 0; $k < 3; $k++) {
            $car = new Car();
            $car->image = $c_brand[$k] . $c_model[$k] . '.jpg';
            $car->brand = $c_brand[$k];
            $car->model = $c_model[$k];
            $car->years = fake()->year();
            $car->color = fake()->colorName();
            $car->mileage = fake()->numerify('######');
            $car->price = fake()->numerify('########');
            $car->status = 'deliver';
            $car->type = array_rand($c_type);
            $car->total_displacement = fake()->numerify('###');
            $car->fuel_type = 'Diesel';
            $car->transmission = 'Automatic';
            $car->view_count = fake()->numerify('##');
            $car->drive_system = 'FRONT-WHEEL DRIVE (FWD)';
            $car->interest = fake()->numerify('##');
            $car->down_payment = fake()->numerify('#######');
            $car->pay_period = fake()->numerify('##');
            $car->price_with_vat = fake()->numerify('#########');
            $car->monthly_payment = fake()->numerify('######');
            $car->total_price = fake()->numerify('#########');
            $car->buy_by = $f_name[$k] . ' ' . $l_name[$k];
            $car->save();
            $car->car_code = substr($car->brand, 0, 1) . substr($car->model, 0, 1) .  mt_rand(10000,99999);
            $car->save();
        }
    }
}
