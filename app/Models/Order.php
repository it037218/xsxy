<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'order';
    public function scopeSearch($query,$params){
        return $query;
    }
    public function book(){
        return $this->hasOne(Book::class,'book_id','id');
    }
    public function commodity(){
        return $this->hasOne(Commodity::class,'commodity_id','id');
    }
}
