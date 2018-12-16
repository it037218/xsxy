<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseGroup;
use App\Models\CourseGroupMember;
use Illuminate\Http\Request;

class CourseGroupController extends Controller
{
    //

    public function store(Request $request)
    {
        $openid = $request->input('openid');
        $courseId = $request->input('course_id');
        $chargeType = $request->input('course_charge_type');
//        $courseInfo = Course::with(['charge'])->find($courseId);
        $leftNum = $totalNum = $chargeType;
        $data = [
            'openid' => $openid,
            'course_id' => $courseId,
            'status' => 0,
            'total_num' => $totalNum,
            'left_num' => $leftNum
        ];
        $result = CourseGroup::create($data);
        if ($result) {
            return ['success' => 1, 'group_id' => $result->id];
        } else {
            return ['success' => 0];
        }
    }

    public function joinIn(Request $request)
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

}
