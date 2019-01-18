<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index(Request $request)
    {
        $type = $request->input('type', 'new');
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);
        $result = Report::with(['images', 'comments' => function ($query) {
            return $query->orderByDesc('created_at')->skip(0)->take(21)->get();
        }, 'author', 'comments.author'])
            ->withCount(['comments', 'like' => function ($query) {
                return $query->where('status', 1);
            }]);

        $result = $result->skip(($page - 1) * $pageSize)->take($pageSize)->get();

        return view('admin.report.index')->with([
            'result' => $result
        ]);
    }

    public function show(Request $request, $id)
    {
        $result = Report::with(['images', 'comments' => function ($query) {
            return $query->orderByDesc('created_at')->skip(0)->take(21)->get();
        }, 'author', 'comments.author'])
            ->withCount(['comments', 'like' => function ($query) {
                return $query->where('status', 1);
            }])->where('id', $id)->first();
        return view('admin.report.show')->with([
            'result' => $result
        ]);
    }
}
