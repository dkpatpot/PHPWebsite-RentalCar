<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand' => 'brand',
            'years' => 'years',
            'model' => 'model',
            'color' => 'color',
            // $table->string('brand');
            // $table->string('years');
            // $table->string('model');
            // $table->string('color');
        ];
    }
}
