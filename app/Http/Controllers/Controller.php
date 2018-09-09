<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $codeList = [
        200 => '成功',
        200001 => '缺少必要的参数',
    ];

    public function success($code, $data = [], $msg = '')
    {
        return response()->json([
            'status' => true,
            'errcode' => 200,
            'errmsg' => self::$codeList[$code],
            'content' => $data,
        ]);
    }

    public function fail($code, $data = [], $msg = '')
    {
        return response()->json([
            'status' => false,
            'errcode' => $code,
            'errmsg' => self::$codeList[$code],
            'content' => $data,
        ]);
    }
}
