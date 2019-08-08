<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    public function test_it_has_a_path()
    {
        $book = factory(Book::class)->create();
        $this->assertEquals('/books/'. $book->id, $book->path());
    }
}
