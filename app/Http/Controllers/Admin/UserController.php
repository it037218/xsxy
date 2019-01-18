<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Report;
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $userService = new UserServices();
        $param = [];
        $result = $userService->getAllUsers($param);
        return view('admin.user.index')->with(
            [
                'result' => $result
            ]
        );
    }

    public function show($id)
    {
        $userInfo = User::find($id);
        $userBook = Book::with(['CoverImages'])->where('openid', $userInfo->openid)->orderByDesc('created_at')->get();
        $report = Report::with(['images', 'comments' => function ($query) {
            return $query->orderByDesc('created_at')->skip(0)->take(21)->get();
        }, 'author', 'comments.author'])
            ->withCount(['comments', 'like' => function ($query) {
                return $query->where('status', 1);
            }]);
        $userReport = $report->where('openid', $userInfo->openid)->orderByDesc('created_at')->get();

        return view('admin.user.show')->with([
            'userInfo' => $userInfo,
            'userBook' => $userBook,
            'userReport' => $userReport
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
