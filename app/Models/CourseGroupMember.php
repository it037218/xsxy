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

    public function group()
    {
        return $this->hasOne(CourseGroup::class, 'id', 'group_id');
    }

    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'openid', 'openid');
    }

    public function courseCharge()
    {
        return $this->hasOne(CourseCharge::class, 'id', 'course_charge_id');
    }
}
