<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * @package App
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Book extends Model
{
    protected $guarded = [];

    public function path()
    {
        return route('books.show', $this->id);
    }
}
