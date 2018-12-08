<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;
    //
    protected $table = 'report';
    protected $guarded = [];

    public function images()
    {
        return $this->belongsToMany(Image::class, 'report_image', 'report_id', 'image_id');
    }

    public function comments()
    {
        return $this->hasMany(ReportComment::class, 'id', 'report_id');
    }

    public function author()
    {
        return $this->hasOne(User::class, 'openid', 'openid');
    }
}
