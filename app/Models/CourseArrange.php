<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseArrange extends Model
{
    //
    protected $table = 'course_arrange';
    protected $guarded = [];

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'content');
    }
}
