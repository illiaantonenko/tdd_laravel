<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class CheckoutBookController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @param Book $book
   * @return void
   */
    public function store(Request $request, Book $book)
    {
      $book->checkout(auth()->user());
    }
}
