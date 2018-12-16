<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'course';
    protected $guarded = [];
    public function charge(){
        return $this->hasMany(CourseCharge::class,'id','course_id');
    }
    public function arrange(){

    }
}
