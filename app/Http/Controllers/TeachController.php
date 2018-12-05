<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachController extends Controller
{
    //
    public function store(Request $request)
    {
        $openid = $request->input('openid');
        $data = [
            'openid' => $openid,
            'name' => $request->input('name'),
            'avatar' => $request->input('avatar'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'school' => $request->input('school'),
            'education' => $request->input('education'),
            'work' => $request->input('work'),
            'service_area' => $request->input('service_area'),
            'mobile' => $request->input('mobile')
        ];
        $result = Teacher::firstOrreate(['openid' => $openid], $data);
        return ['success' => $result ? 1 : 0];
    }
}
