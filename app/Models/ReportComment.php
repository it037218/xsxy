<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportComment extends Model
{
    //
    protected $table = 'report_comment';
    protected $guarded = [];

    public function author()
    {
        return $this->hasOne(User::class, 'openid', 'openid');
    }
}
