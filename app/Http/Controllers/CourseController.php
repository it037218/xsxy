<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseGroup;
use App\Models\CourseGroupMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'openid' => $request->input('openid'),
            'stage' => $request->input('stage'),
            'course_type' => $request->input('course_type'),
            'course_num' => $request->input('course_num'),
            'course_time' => $request->input('course_time'),
            'desc' => $request->input('desc')
        ];
        $result = Course::create($data);
        if (!$result) {
            return ['success' => 0, 'msg' => '创建失败'];
        }
        $courseId = $result->id;
        //添加拼团收费设置
        if (!empty($request->input('charge'))) {

            $charge = $request->input('charge');
            $d = [];
            foreach ($charge as $k => $v) {
                $d[] = [
                    'course_id' => $courseId,
                    'type' => $v['type'],
                    'money' => $v['money']
                ];
            }
            Course::find($courseId)->charge()->createMany($d);
        }

        //添加课程安排
        if (!empty($request->input('arrange'))) {
            $arrange = $request->input('arrange');
            $d = [];
            foreach ($arrange as $k => $v) {
                $d[] = [
                    'type' => $v['type'],
                    'content' => $v['content'],
                    'course_id'=>$courseId
                ];
            }
            Course::find($courseId)->arrange()->createMany($d);
        }

        return ['success' => 1];

    }

    public function list(Request $request)
    {

    }
    public function detail(Request $request){
        $courseId = $request->input('course_id');
        $result = Course::with(['charge','arrange','arrange.image'])->find($courseId);

        if (!empty($result->arrange)){
            foreach ($result->arrange as $k=>$v){
                if($v->type == 2){
                    $result->arrange[$k]->content = $v->image->url;
                }
            }

        }

        return $result;

    }
//    public function

}

