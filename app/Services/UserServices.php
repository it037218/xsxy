<?php

namespace App\Services;

use App\Models\User;

class UserServices
{
    public function getAllUsers($params){
        $model = new User();
        return $model->search($params)->orderBy('created_at','desc')->get();

    }
}
