<?php

namespace App\Http\Controllers;

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
}
