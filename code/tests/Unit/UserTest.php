<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    public function test_a_user_has_books()
    {
        $user =factory(User::class)->create();

        $this->assertInstanceOf(Collection::class, $user->books);
    }
}
