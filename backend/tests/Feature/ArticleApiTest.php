<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ArticleApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    public function test_get_articles_from_api()
    {
        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->title = "Title Test {$i}";
            $article->description = 'Description Test';
            $article->image = 'Image Test';
            $article->save();
        }

        $response = $this->get('/api/articles');

        $response->assertStatus(200);

        $responseContent = $response->getContent();

        $responseList = json_decode($responseContent)->data;

        $this->assertEquals(10, collect($responseList)->count());
    }

    public function test_update_articles_from_api() {
        $article = new Article();
        $article->title = "Title Test";
        $article->description = 'Description Test';
        $article->image = 'Image Test';
        $article->save();

        $response = $this->putJson('/api/articles/1', [
            'title' => 'Title Test 2',
            'description' => 'Description Test 2',
            'image' => 'Image Test 2',
        ]);

        $response->assertStatus(201);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', 'Article updated successful with ID: 1')
                ->where('car_id', 1)
                ->etc()
        );
    }

    public function test_delete_article_from_api() {
        $article = new Article();
        $article->title = "Title Test";
        $article->description = 'Description Test';
        $article->image = 'Image Test';
        $article->save();

        $response = $this->delete('/api/articles/1');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', 'article Title Test deleted successfully')
                ->etc()
        );
    }
}
