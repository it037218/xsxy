@extends('admin.layouts.base')


@section('main')
    <table class="layui-table" lay-skin="line" lay-size="lg">
        <thead>
        <tr>
            <th>姓名</th>
            <th>性别</th>
            <th>手机号</th>
            <th>孩子姓名</th>
            <th>孩子性别</th>
            <th>孩子学校名称</th>
            <th>孩子年级</th>
            <th>孩子班级</th>
            <th>加入时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @if($result->isNotEmpty())
            @foreach($result as $value)
                <tr>
                    <td>{{$value->name}}</td>
                    <td>{{\App\Models\User::userGender($value->gender)}}</td>
                    <td>{{$value->mobile}}</td>
                    <td>{{$value->child_name}}</td>
                    <td>{{\App\Models\User::userGender($value->child_gender)}}</td>
                    <td>{{$value->child_school}}</td>
                    <td>{{$value->child_grade}}</td>
                    <td>{{$value->child_class}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>
                        <button class="layui-btn-group">
                            <a href="/admin/user/show/id/{{$value->id}}" class="layui-btn ">
                                详情
                            </a>
                        </button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10" style="text-align: center">暂无用户</td>
            </tr>
        @endif
        </tbody>
    </table>



@endsection