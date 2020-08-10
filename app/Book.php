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
    return route('book.show', $this->id);
  }

  public function setAuthorIdAttribute($author)
  {
    $this->attributes['author_id'] = Author::firstOrCreate([
      'name' => $author,
    ])->id;
  }

  public function checkout($user)
  {
    $this->reservations()->create([
      'user_id' => $user->id,
      'checked_out_at' => now(),
    ]);
  }

  public function checkin($user)
  {
    $reservation = $this->reservations()->where('user_id', $user->id)
      ->whereNotNull('checked_out_ad')
      ->whereNull('checked_in_at')
      ->first();

    if (is_null($reservation)){
      throw new \Exception();
    }

    $reservation->update([
      'checked_in_at' => now()
    ]);
  }

  public function reservations()
  {
    return $this->hasMany(Reservation::class);
  }
}
