<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{


    use RefreshDatabase, WithFaker;


    public function test_that_a_book_can_be_created()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence,
            'ISBN' => $this->faker->bankAccountNumber,
        ];

        $this->post('/books', $attributes)->assertRedirect('/books');

        $this->assertDatabaseHas('books', $attributes);
        $this->get('/books')->assertSee($attributes['title'], $attributes['ISBN']);
    }
}
