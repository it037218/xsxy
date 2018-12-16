<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseGroupMember extends Model
{
    //
    use SoftDeletes;
    protected $table = 'course_group_member';
    protected $guarded = [];
}
