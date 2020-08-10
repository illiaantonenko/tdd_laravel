<?php

namespace App\Http\Controllers;

use App\Book;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckinBookController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

  /**
   * Store a newly created resource in storage.
   *
   * @param Book $book
   * @return Application|ResponseFactory|Response|void
   */
    public function store(Book $book)
    {
      try {
        $book->checkin(auth()->user());
      } catch (Exception $e) {
        return response([],404);
      }
    }
}
