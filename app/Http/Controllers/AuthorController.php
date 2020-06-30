<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store()
    {
        $data = $this->validateRequest();
        Author::create($data);
    }

    /**
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'name' => 'required|string',
            'dob' => 'required|date',
        ]);
    }
}
