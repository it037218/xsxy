<?php

namespace App\Http\Controllers;

use App\Models\CourseCharge;
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
        $chargeId = $request->input('course_charge_id');
//        $courseInfo = Course::with(['charge'])->find($courseId);

        $courseChargeInfo = CourseCharge::find($chargeId);

        $leftNum = $totalNum = $courseChargeInfo->type;
        $data = [
            'openid' => $openid,
            'course_id' => $courseId,
            'status' => 0,
            'total_num' => $totalNum,
            'left_num' => $leftNum
        ];
        $result = CourseGroup::create($data);
        $groupId = $result->id;
        $rst = CourseGroupMember::create(['openid' => $openid, 'course_id' => $courseId, 'group_id' => $groupId, 'status' => 1, 'owner' => 1]);
        CourseGroup::find($groupId)->decrement('left_num');
        if ($rst) {
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
        $type = $request->input('type');
        $groupDetail = CourseGroup::find($groupId);
        //判断拼团是否已满
        if ($groupDetail->left_num == 0) {
            return ['success' => 0, 'msg' => '拼团已满'];
        }

        if ($type == 1) {
            //判断是否已经参与拼团
            CourseGroupMember::where('openid', $openid)
                ->where('group_id', $groupId)
                ->first();
            $rst = CourseGroupMember::firstOrCreate(['openid' => $openid, 'course_id' => $courseId, 'group_id' => $groupId, 'owner' => 0], ['status' => 1]);
            CourseGroup::find($groupId)->decrement('left_num');

        } else {
            $rst = CourseGroupMember::firstOrCreate(['openid' => $openid, 'course_id' => $courseId, 'group_id' => $groupId, 'owner' => 0], ['status' => 0]);
        }


//        if ($rst) {
//            return ['success' => 0, 'msg' => '已参团'];
//        }

//        $rst = CourseGroupMember::create(['openid' => $openid, 'course_id' => $courseId, 'group_id' => $groupId]);

        //检查拼团是否已满
        if ($rst) {
            return ['success' => 1, 'msg' => '参团成功'];
        } else {
            return ['success' => 0, 'msg' => '参团失败'];
        }
    }

}
