<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
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

    public function images()
    {
        return $this->belongsToMany(UploadFile::class, 'book_image', 'book_id', 'file_id');
    }

    public function scopeSearch($query, $param)
    {
        return $query;
    }

//    public function tag(){}

}
