<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }
   
    public function test_get_auths_from_api()
    {
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->name = "Name Test {$i}";
            $user->email = "Email Test {$i}";
            $user->password = "Password Test {$i}";
            $user->phone_number = "Phone Test {$i}";
            $user->role = "Role Test {$i}";
            $user->save();
        }

        $response = $this->get('/api/auth/allUser');

        $response->assertStatus(200);

        $responseContent = $response->getContent();

        $responseList = json_decode($responseContent)->data;

        $this->assertEquals(10, collect($responseList)->count());
    }

    public function test_update_auths_from_api() {
        $user = new User();
        $user->name = "Name Test";
        $user->email = "Email Test";
        $user->password = "Password Test";
        $user->phone_number = "Phone Test";
        $user->role = "Role Test";
        $user->save();

        $response = $this->post('/api/auth/update', [
            'id' => $user->id,
            'name' => 'Name Test 2',
            'email' => 'Email Test 2',
            'password' => 'Password Test 2',
            'phone_number' => 'Phone Test 2',
            'role' => 'Role Test 2',
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', 'User updated successful with ID: 1')
                ->where('car_id', 1)
                ->etc()
        );
    }

    public function test_delete_auths_from_api() {
        $user = new User();
        $user->name = "Name Test";
        $user->email = "Email Test";
        $user->password = "Password Test";
        $user->phone_number = "Phone Test";
        $user->role = "Role Test";
        $user->save();

        $response = $this->post('/api/auth/delete', [
            'id' => $user->id,
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
                ->where('message', 'User deleted successful with ID: 1')
                ->where('car_id', 1)
                ->etc()
        );
    }
}
