<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseGroup;
use App\Models\CourseGroupMember;
use Illuminate\Http\Request;

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
                    'content' => $v['content']
                ];

            }
            Course::find($courseId)->arrange()->createMany($d);
        }

        return ['success' => 1];

    }

    public function list(Request $request)
    {

    }

    public function createGroup(Request $request)
    {
        $openid = $request->input('openid');
        $courseId = $request->input('course_id');
        $num = $request->input('number');
        $result = CourseGroup::firstOrCreate(['openid' => $openid, 'course_id' => $courseId]);
        if ($result) {
            return ['success' => 1, 'group_id' => $result->id];
        } else {
            return ['success' => 0];
        }
    }

    public function joinGroup(Request $request)
    {
        $openid = $request->input('openid');
        $groupId = $request->input('group_id');
        $courseId = $request->input('course_id');
        $groupDetail = CourseGroup::find($groupId);
        //判断拼团是否已满
        if ($groupDetail->left_num == 0) {
            return ['success' => 0, 'msg' => '拼团已满'];
        }

        //判断是否已经参与拼团
        $rst = CourseGroupMember::where('openid', $openid)
            ->where('group_id', $groupId)
            ->first();

        if ($rst) {
            return ['success' => 0, 'msg' => '已参团'];
        }

        $rst = CourseGroupMember::create(['openid' => $openid, 'course_id' => $courseId, 'group_id' => $groupId]);

        //检查拼团是否已满
        if ($rst) {
            CourseGroup::find($courseId)->decrement('left_num');
            return ['success' => 1];
        } else {
            return ['success' => 0, 'msg' => '参团失败'];
        }
    }

//    public function

}

