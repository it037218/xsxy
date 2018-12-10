<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Report;
use App\Models\UserReportAgree;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $result = Book::with(['cover_image'])->orderByDesc('created_at')->get();
        return ['success' => $result ? 1 : 0, 'content' => $result];
    }

    public function store(Request $request)
    {
        $data = [
            'book_name' => $request->input('book_name'),
            'cover_image_id' => $request->input('image_id'),
            'grade' => $request->input('grade'),
            'desc' => $request->input('desc'),
            'openid' => $request->input('openid'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'number' => $request->input('number', 1),
            'contact' => $request->input('contact')
        ];
        $result = Book::create($data);
        return ['success' => $result ? 1 : 0];
    }


    public function detail(Request $request)
    {
        $id = $request->input('book_id');
        $result = Book::with('cover_image')->find($id);
        return ['success' => $result ? 1 : 0, 'content' => $result];
    }

    public function reportList(Request $request)
    {
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', '10');
        $openid = $request->input('openid');
        $bookId = $request->input('book_id');
        $result = Report::with(['images', 'comments' => function ($query) {
            return $query->orderByDesc('created_at')->skip(0)->take(21)->get();
        }, 'author', 'comments.author'])
            ->withCount(['comments', 'like' => function ($query) {
                return $query->where('status', 1);
            }])->where('book_id', $bookId);

        $result->orderByDesc('created_at');

        $result = $result->skip(($page - 1) * $pageSize)->take($pageSize)->get();

        foreach ($result as $k => $v) {
            $result[$k]->is_like = false;

            $rst = UserReportAgree::where('openid', $openid)->where('report_id', $v->id)->first();
            if ($rst) {
                $result[$k]->is_like = true;
            }
        }
        return ['success' => $result ? 1 : 0, 'content' => $result];
    }
}
