<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportComment;
use App\Models\UserReportAgree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    //
    public function index(Request $request)
    {
        $type = $request->input('type', 'new');
        $page = $request->input('page', 1);
        $openid = $request->input('openid');
        $pageSize = $request->input('pageSize', 10);
        $result = Report::with(['images', 'comments' => function ($query) {
            return $query->orderByDesc('created_at')->skip(0)->take(21)->get();
        }, 'author', 'comments.author'])
            ->withCount(['comments', 'like' => function ($query) {
                return $query->where('status', 1);
            }]);
        if ($type == 'hot') {
            $result->orderByDesc('comments_count');
        } else {
            $result->orderByDesc('created_at');
        }
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

    public function store(Request $request)
    {
        $openid = $request->input('openid');
        $bookName = $request->input('book_name');
        $content = $request->input('content');

        $data = [
            'openid' => $openid,
            'content' => $content,
            'book_name' => $bookName,
            'book_id'=>$request->input('book_id',-1)
        ];
        DB::beginTransaction();
        try {
            $rst1 = Report::create($data);

            if (!$rst1) {
                return ['success' => 0];
            }

            $reportId = $rst1->id;

            $images = $request->input('images');
            Log::info(json_encode($images));
            if ($images) {
                $rst2 = Report::find($reportId)->images()->sync($images);
            }
            DB::commit();

            return ['success' => 1];
        } catch (\Exception $exception) {
            DB::rollBack();
            return ['success' => 0];
        }


    }

    public function changeAgree(Request $request)
    {
        $openid = $request->input('openid');
        $reportId = $request->input('report_id');
        $data = [
            'openid' => $openid,
            'report_id' => $reportId,
            'status' => 0
        ];

        $rst = UserReportAgree::firstOrCreate(['openid' => $openid, 'report_id' => $reportId], $data);
        $rst->status = !$rst->status;
        $result = $rst->save();

        UserReportAgree::where('openid', $openid)->where('report_id', $reportId)->first();
//        if ($rst1->status) {
//            Report::find($reportId)->increment('likes');
//        } else {
//            Report::find($reportId)->decrement('likes');
//        }
        return ['success' => $result ? 1 : 0];
    }


    public function storeComment(Request $request)
    {
        $reportId = $request->input('report_id');
        $openid = $request->input('openid');
        $content = $request->input('content');
        $data = [
            'openid' => $openid,
            'content' => $content,
            'report_id' => $reportId,
        ];
        $result = ReportComment::create($data);
//        if ($result) {
//            Report::find($reportId)->increment('comments');
//        }
        return ['success' => $result ? 1 : 0];
    }

    public function commentList(Request $request)
    {
        $reportId = $request->input('report_id');
        $result = ReportComment::with(['author'])
            ->where('report_id', $reportId)
            ->orderByDesc('created_at')
            ->skip(0)
            ->take(21)
            ->get();
        return ['success' => $result ? 1 : 0, 'content' => $result];
    }

    public function detail(Request $request)
    {
        $reportId = $request->input('report_id');
        $result = Report::with(['images', 'comments' => function ($query) {
            return $query->orderByDesc('created_at')->skip(0)->take(21)->get();
        }, 'author', 'comments.author'])
            ->withCount(['comments', 'like' => function ($query) {
                return $query->where('status', 1);
            }])->where('id', $reportId)->first();
        return ['success' => $result ? 1 : 0, 'content' => $result];
    }
}
