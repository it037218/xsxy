<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $result = collect([]);
        return view('admin.user.index')->with(
            [
                'result' => $result
            ]
        );
    }

    public function show($id)
    {
        $result = User::find($id);
        return view('admin.user.show')->with([
            'result' => $result
        ]);
    }

    public function modify(Request $request, $id)
    {
        if ($request->method() == 'GET') {
            $result = User::find($id);
            return view('admin.user.modify')->with([
                'result' => $result
            ]);
        } else {
            $data = $request->input('');
            User::find($id)->update($data);
        }
    }


    public function changeUserStatus(Request $request, $id)
    {

    }

}
