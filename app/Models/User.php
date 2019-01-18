<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'users';
    protected $guarded=[];
    public static function userGender($gender)
    {
        $array = [
            '0' => '未知',
            '1' => "男",
            '2' => "女"
        ];
        return $array[$gender] ?? '未知';
    }


    public function scopeSearch($query, $params)
    {
        if (array_key_exists('nickname', $params) && !empty($params['nickname'])) {
            $query->where('nickname', 'like', '%' . $params['nickname'] . '%');
        }
        if (array_key_exists('start_at', $params) && !empty($params['start_at'])) {
            $query->where('created_at', '>=', $params['created_at']);
        }
        if (array_key_exists('end_at', $params) && !empty($params['end_at'])) {
            $query->where('created_at', '<=', $params['created_at']);
        }
        if (array_key_exists('user_type', $params) && !empty($params['user_type'])) {
            $query->where('user_type', $params['user_type']);
        }
        return $query;
    }
}
