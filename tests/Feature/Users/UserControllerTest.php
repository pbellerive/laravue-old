<?php

namespace Tests\Unit;

use App\Users\UserRepository;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new UserRepository();
    }
   public function test_update_my_profile_happy_path()
    {
        $user = \App\Users\User::factory()->create();

        $params = [
            'first_name' => $this->faker->text(10),
            'last_name' => $this->faker->text(10),
        ];

        $response = $this->actingAs($user)->json('PUT', 'api/users/' . $user->id, $params);

        $this->assertDatabaseHas('users', $params);
    }
}
