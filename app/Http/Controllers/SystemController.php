<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\FormId;
use App\Models\Grade;
use App\Models\Grades;
use App\Models\Image;
use App\Models\Slider;
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

    public function sliderList()
    {
        $result = Slider::all();
        return ['success' => $result ? 1 : 0, 'content' => $result];
    }
    public function gradeList(){
        return ['success'=>1,'content'=>Grades::all()];
    }
    public function classList(){
        return ['success'=>1,'content'=>Classes::all()];
    }
}
