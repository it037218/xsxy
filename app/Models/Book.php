<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //
    use SoftDeletes;
    protected $table = 'book';
//    protected $fillable = [
//        'book_name',
//        'description',
//        'type_id',
//        'author',
//        'cover_img_url',
//        'price',
//        'source',
//    ];
    protected $guarded = [];

    public function cover_image()
    {
        return $this->hasOne(Image::class, 'id', 'cover_image_id');
    }

    public function CoverImages()
    {
        return $this->belongsToMany(Image::class, 'book_cover_images', 'book_id', 'image_id');
    }

    public function DetailImages()
    {
        return $this->belongsToMany(Image::class, 'book_detail_images', 'book_id', 'image_id');

    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'book_image', 'book_id', 'image_id');
    }

    public function scopeSearch($query, $param)
    {
        return $query;
    }

//    public function tag(){}

}
