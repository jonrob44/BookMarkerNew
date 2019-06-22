<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function store()
    {
        Book::create( request(['title', 'ISBN']));

        return redirect('/books');
    }

    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }
}
