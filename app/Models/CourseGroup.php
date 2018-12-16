<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseGroup extends Model
{
    //
    use  SoftDeletes;
    protected $table = 'course_group';
    protected $guarded = [];

    public function group_member()
    {
        return $this->hasMany(CourseGroupMember::class, 'id', 'group_id');
    }

}
