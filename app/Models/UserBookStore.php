<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBookStore extends Model
{
    //
    protected $table = 'user_book_store';
    protected $guarded = [];

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function user()
    {

    }
}
