<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{
    public function index()
    {

    }

    public function store()
    {
        $book = Book::create($this->validateRequest());
        return redirect($book->path());
    }

    public function update(Book $book)
    {
        $book->update($this->validateRequest());
        return redirect($book->path());
    }

    public function show(Book $book)
    {
        return redirect($book->path());
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect(route('books.index'));
    }

    /**
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required|string',
            'author' => 'required|string',
        ]);
    }
}
