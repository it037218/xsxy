<?php

namespace App\Http\Controllers;

use App\Models\FormId;
use App\Models\Image;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    //
    public function upload(Request $request)
    {
        $fileName = uniqid() . '.png';
        $path = $request->file('file')->storeAs('public', $fileName);

        $fullUrl = "https://miniapp.xishuxiyou.com/storage/" . $fileName;

        $result = Image::create(['url' => $fullUrl]);

        return ['success' => $result ? 1 : 0, 'img_id' => $result->id, 'img_url' => $fullUrl];

    }

    public function saveFormId(Request $request)
    {
        $data = [
            'openid' => $request->input('openid'),
            'form_id' => $request->input('form_id'),
            'times' => 1,
            'submit_time' => date('Y-m-d H:i:s')
        ];
        $result = FormId::create($data);
        return ['success' => $result ? 1 : 0];
    }
}
