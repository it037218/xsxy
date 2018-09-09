<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('admin.user.index');
    }

    public function show(Request $request, $id)
    {
        return view('admin.user.show');
    }


    public function store(Request $request)
    {

        if ($request->method() == 'GET') {
            return view('admin.user.store');
        } else {


        }
    }

    public function modify(Request $request, $id)
    {
        if ($request->method() == 'GET') {
            return view('admin.user.modify');
        } else {

        }
    }


    public function changeUserStatus(Request $request, $id)
    {

    }

}
