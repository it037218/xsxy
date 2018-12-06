<?php

namespace App\Http\Controllers;

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

        return ['success' => $result ? 1 : 0, 'image_id' => $result->id];

    }
}
