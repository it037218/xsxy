<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $service = new UserServices();
        $result = $service->getAllUsers($request->all());
        return view('admin.user.index', $result);
    }

    public function getOpenid(Request $request)
    {
        $code = $request->input('code');
        $appId = 'wx3a7d272a09f29273';
        $appSecret = 'db427e8cd6f1bebfb408a6f70d92ea37';
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=" . $appId . "&secret=" . $appSecret . "&js_code=" . $code . "&grant_type=authorization_code";
        $result = file_get_contents($url);
        return $result;
    }

    public function saveUserInfo(Request $request)
    {
        $openid = $request->input('openid');
        $data = [
            'nickname' => $request->input('nickname'),
            'avatar_url' => $request->input('avatar_url'),
            'openid' => $openid
        ];
        $result = User::firstOrCreate(['openid' => $openid], [$data]);
        return ['success' => $result ? 1 : 0];
    }

    public function saveUserFullInfo(Request $request)
    {
        $openid = $request->input('openid');

        $data = [
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'sign' => $request->input('sign'),
            'mobile' => $request->input('mobile'),
            'child_name' => $request->input('child_name'),
            'child_gender' => $request->input('child_gender'),
            'child_grade' => $request->input('child_grade'),
            'child_class' => $request->input('child_class'),
            'child_school' => $request->input('child_school')
        ];
        $result = User::where('openid', $openid)->update($data);
        return ['success' => $result ? 1 : 0];
    }


}
