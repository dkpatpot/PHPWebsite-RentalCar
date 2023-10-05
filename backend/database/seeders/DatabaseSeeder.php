<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Article::factory(10)->create();
        // Promotion::factory(10)->create();
        // User::factory(10)->create();
        // Category::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Car::create([
        //     'car_code' => 'mg1024',
        //     'brand' => 'masda',
        //     'price' => 2300000,
        // ]);
        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            AmountPromotionSeeder::class,
            PercentPromotionSeeder::class,
            CarSeeder::class,
            CarOfferSeeder::class
        ]);
    }
}
