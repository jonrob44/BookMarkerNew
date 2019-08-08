<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BooksTest extends TestCase
{


    use RefreshDatabase, WithFaker;


    public function test_that_a_book_can_be_created()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $attributes = [
            'title' => $this->faker->sentence,
            'ISBN' => $this->faker->bankAccountNumber,
        ];

        $this->post('/books', $attributes)->assertRedirect('/books');

        $this->assertDatabaseHas('books', $attributes);
        $this->get('/books')->assertSee($attributes['title'], $attributes['ISBN']);
    }

    public function test_a_book_requires_a_title()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory('App\Book')->raw(['title' => '']);
        $this->post('/books',$attributes)->assertSessionHasErrors('title');
    }
    public function test_a_book_requires_a_isbn()
    {
        $this->actingAs(factory(User::class)->create());

        $attributes = factory('App\Book')->raw(['ISBN' => '']);
        $this->post('/books',$attributes)->assertSessionHasErrors('ISBN');
    }




    public function test_only_authenticated_user_can_view_a_book()
    {

       // $this->withoutExceptionHandling();

        $book = factory('App\Book')->create();

        $this->get($book->path() )->assertRedirect('login');
    }
}
