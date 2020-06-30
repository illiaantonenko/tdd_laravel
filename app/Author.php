<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 * @package App
 *
 * @property int $id
 * @property string $name
 * @property Carbon $dob
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Author extends Model
{
    protected $guarded = [];

    protected $dates = ['dob'];

//    public function setDobAttribute($dob)
//    {
//        $this->attributes['dob'] = Carbon::parse($dob);
//    }
}
