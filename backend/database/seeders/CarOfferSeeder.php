<?php

namespace Database\Seeders;

use App\Models\CarOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarOfferSeeder extends Seeder
{


    public function run()
    {
        $f_name = ['Joe', 'John', 'David', 'Flora', 'Justin', 'Rock', 'Rick',
        'Morty', 'Jerry', 'Summer'];
        $l_name = ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Miller',
        'Davis', 'Garcia', 'Rodriguez', 'Wilson'];
        $c_brand = ['TOYOTA', 'HONDA', 'MITSUBISHI', 'NISSAN', 'SUZUKI', 'BMW',
        'MERCEDES-BENZ', 'AUDI', 'VOLKSWAGEN', 'FORD'];
        $c_model = ['VIOS', 'CITY', 'LANCER', 'X-TRAIL', 'CELERIO', 'X5',
        'CLS 53', 'TT', 'ARTEON', 'MUSTANG'];

        for ($i = 0; $i < 10; $i++) {
            $car_offer = new CarOffer();
            $car_offer->cus_firstname = $f_name[$i];
            $car_offer->cus_lastname = $l_name[$i];
            $car_offer->cus_email = $f_name[$i] . $l_name[$i] . '@gmail.com';
            $car_offer->cus_phone = '08' . fake()->numerify('########');
            $car_offer->car_brand = $c_brand[$i];
            $car_offer->car_model = $c_model[$i];
            $car_offer->car_year = fake()->year();
            $car_offer->car_color = fake()->colorName();
            $car_offer->car_mileage = fake()->numerify('######');
            $car_offer->offer_status = 'pending';
            $car_offer->save();
        }

        $c_model1 = ['A3', 'A4', 'A5', 'A6', 'A7', 'R8', 'Q3'];
        $f_name1 = ['Iron', 'Captain', 'Thor', 'Hulk', 'Black', 'Spider', 'Ant'];
        $l_name1 = ['Holmes', 'Watson', 'Moriaty', 'Lestrade', 'Mycroft', 'Hooper',
        'Morstan'];

        for ($i = 0; $i < 7; $i++) {
            $car_offer = new CarOffer();
            $car_offer->cus_firstname = $f_name1[$i];
            $car_offer->cus_lastname = $l_name1[$i];
            $car_offer->cus_email = $f_name1[$i] . $l_name1[$i] . '@gmail.com';
            $car_offer->cus_phone = '08' . fake()->numerify('########');
            $car_offer->car_brand = $c_brand[$i];
            $car_offer->car_model = $c_model1[$i];
            $car_offer->car_year = fake()->year();
            $car_offer->car_color = fake()->colorName();
            $car_offer->car_mileage = fake()->numerify('######');
            $car_offer->offer_status = 'aceepted';
            $car_offer->save();
        }

        $c_model2 = ['Q5', 'Q7', 'Q8'];
        $f_name2 =  ['Doctor', 'Wasp', 'Vision'];
        $l_name2 = ['Hudson', 'Augustus', 'Smallwood'];
        for ($i = 0; $i < 3; $i++) {
            $car_offer = new CarOffer();
            $car_offer->cus_firstname = $f_name2[$i];
            $car_offer->cus_lastname = $l_name2[$i];
            $car_offer->cus_email = $f_name2[$i] . $l_name2[$i] . '@gmail.com';
            $car_offer->cus_phone = '08' . fake()->numerify('########');
            $car_offer->car_brand = $c_brand[$i];
            $car_offer->car_model = $c_model2[$i];
            $car_offer->car_year = fake()->year();
            $car_offer->car_color = fake()->colorName();
            $car_offer->car_mileage = fake()->numerify('######');
            $car_offer->offer_status = 'checked';
            $car_offer->save();
        }

        $c_model3 = ['Tiguan', 'Passat', 'Touareg'];
        $f_name3 =  ['Pipo', 'Doja', 'Snoop'];
        $l_name3 = ['Gummy', 'Cat', 'Dog'];
        for ($i = 0; $i < 3; $i++) {
            $car_offer = new CarOffer();
            $car_offer->cus_firstname = $f_name3[$i];
            $car_offer->cus_lastname = $l_name3[$i];
            $car_offer->cus_email = $f_name3[$i] . $l_name3[$i] . '@gmail.com';
            $car_offer->cus_phone = '08' . fake()->numerify('########');
            $car_offer->car_brand = $c_brand[$i];
            $car_offer->car_model = $c_model3[$i];
            $car_offer->car_year = fake()->year();
            $car_offer->car_color = fake()->colorName();
            $car_offer->car_mileage = fake()->numerify('######');
            $car_offer->offer_status = 'Filled';
            $car_offer->save();
        }
    }
}
