<?php

namespace Tests\Unit;

use App\Users\UserRepository;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
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
    public function test_edit_first_las_name_profile_happy_path()
    {
        $user = \App\Users\User::factory()->create();

        $params = [
            'first_name' => 'new firstname',
            'last_name' => 'new firstname',
        ];

        $this->repository->update($user, $params);

        $this->assertDatabaseHas('users', $params);
    }

    public function test_edit_email_profile()
    {
        $user = \App\Users\User::factory()->create();

        $params = [
            'email' => $this->faker->email(),
        ];

        $this->repository->update($user, $params);

        $this->assertDatabaseHas('users', $params);
    }

    public function test_edit_empty_email_profile()
    {
        $this->expectException(ValidationException::class);

        $user = \App\Users\User::factory()->create();

        $params = [
            'email' => null,
        ];

        $this->repository->update($user, $params);


    }

    public function test_edit_email_is_unique_profile()
    {
        $this->expectException(ValidationException::class);

        $user = \App\Users\User::factory()->create();
        $user2 = \App\Users\User::factory()->create();

        $params = [
            'email' => $user2->email,
        ];

        $this->repository->update($user, $params);
    }

    public function test_edit_email_toolong_profile()
    {
        $this->expectException(ValidationException::class);

        $user = \App\Users\User::factory()->create();
        $user2 = \App\Users\User::factory()->create();

        $params = [
            'email' => $this->faker->text(600)
        ];

        $this->repository->update($user, $params);
    }

    public function test_edit_email_wrong_format()
    {
        $this->expectException(ValidationException::class);

        $user = \App\Users\User::factory()->create();
        $user2 = \App\Users\User::factory()->create();

        $params = [
            'email' => 'asdf'
        ];

        $this->repository->update($user, $params);
    }
}
