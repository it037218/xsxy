<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'course';
    protected $guarded = [];


    public function charge()
    {
        return $this->hasMany(CourseCharge::class, 'course_id', 'id');
    }

    public function arrange()
    {
        return $this->hasMany(CourseArrange::class, 'course_id', 'id');
    }
}
