<?php

namespace App\Services;

use App\Models\UserAccount;
use App\Models\UserAccountLog;

class AccountServices
{
    public function createUserAccount($openid)
    {
        return UserAccount::firstOrCreate(['openid' => $openid]);
    }

    public function getUserAccount($openid)
    {
        return UserAccount::where('openid', $openid)->first();
    }

    public function updateAccount($openid, $data)
    {
        return UserAccount::where('openid', $openid)->update($data);
    }
    public function storeAccountLog($data){
        return UserAccountLog::create($data);
    }
    public function getUserAccountLog($openid){
        return UserAccountLog::where('openid',$openid)->orderBy('created_at','desc')->get();
    }

}
