<?php

namespace Tests\Feature;

use App\Users\UserRepository;
use App\Users\User;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new UserRepository();
    }
    /**
     * A basic test example.
     *
     * @return void
     */

     public function test_update_not_my_profile()
     {
        $user = User::factory()->create();
        $user2 = User::factory()->create();

        $params = [
            'first_name' => $this->faker->firstName()
        ];

        $response = $this->actingAs($user2)->json('PUT', 'api/users/' . $user->id, $params);

        $response->assertForbidden();
     }
}
