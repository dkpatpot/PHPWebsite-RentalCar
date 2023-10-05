<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'detail' => 'detail',
            'is_active' => True,
            'total_amount' => rand(0,100000),
            'discount_type' => 'discount_type',
            // $table->string('name');
            // $table->string('detail')->nullable();
            // $table->boolean('is_active');
            // $table->integer('discount')->default(0);
            // $table->integer('total_amount')->default(0);

            // $table->id();
            // $table->string('name');
            // $table->string('detail')->nullable();
            // $table->boolean('is_active');

            // $table->string('discount_type');
            // $table->integer('total_amount');
            // $table->integer('percent')->nullable();
            // $table->integer('amount')->nullable();
            // $table->timestamps();
            // $table->softDeletes();
        ];
    }
}
