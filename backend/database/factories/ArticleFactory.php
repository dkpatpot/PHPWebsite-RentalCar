<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'description' => 'description',
            // 'status' => 'status',
            'view_count' => rand(0,100),
            'like_count' => rand(0,100),
            // $table->id();
            // $table->string('title');
            // $table->text('description');
            // $table->string('status')->nullable();
            // $table->bigInteger('view_count')->default(0);
            // $table->bigInteger('like_count')->default(0);
            // $table->string('image')->nullable();
            // $table->timestamps();
            
        ];
    }
}
