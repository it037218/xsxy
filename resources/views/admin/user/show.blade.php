@extends('admin.layouts.base')

@section('link_pre')
    <style>
        .layui-row {
            margin-top: 10px;
        }
    </style>
@endsection

@section('main')
    <div class="layui-container">
        <div class="layui-row">
            <div class="layui-col-md12">
                <img src="{{$userInfo->avatar_url}}"
                     style="width: 40px;border-radius: 50%">
                <span>{{$userInfo->nickname}}</span>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-md4">
                性别：{{$userInfo->gender==1?'男':'女'}}
            </div>
            <div class="layui-col-md4">
                手机号：{{$userInfo->mobile}}
            </div>
            <div class="layui-col-md4">
                签名：{{$userInfo->sign}}
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-md4">
                孩子姓名：{{$userInfo->child_name}}
            </div>
            <div class="layui-col-md4">
                孩子性别：{{$userInfo->child_gender==1?'男':'女'}}
            </div>
            <div class="layui-col-md4">
                孩子学校名称：{{$userInfo->child_school}}
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-md4">
                孩子年级：{{$userInfo->child_grade}}
            </div>
            <div class="layui-col-md4">
                孩子班级：{{$userInfo->child_class}}
            </div>
        </div>
    </div>
    <!--发布二手-->
    <div class="layui-card" style="margin-top: 15px;border-top: 1px solid #f6f6f6;">
        <div class="layui-card-header">发布图书列表</div>
        <div class="layui-card-body">
            <table class="layui-table">
                <tr>
                    <td>
                        图书信息
                    </td>
                    <td>
                        价格
                    </td>
                    <td>
                        适合年级
                    </td>
                    <td>
                        发布时间
                    </td>
                </tr>
                @if(!empty($userBook))
                    @foreach($userBook as $k=>$v)
                        <tr>
                            <td>
                                {{$v->book_name}}
                            </td>
                            <td>
                                {{$v->price}}
                            </td>
                            <td>
                                {{$v->grade}}
                            </td>
                            <td>
                                {{$v->created_at}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td style="text-align: center;" colspan="4">
                            暂未发布图书
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

    <!--读后感列表-->
    <div class="layui-card" style="margin-top: 15px;border-top: 1px solid #f6f6f6;">
        <div class="layui-card-header">读后感列表</div>
        <div class="layui-card-body">
            <table class="layui-table">
                <thead>
                <tr>
                    <td>
                        图书信息
                    </td>
                    <td>
                        读后感
                    </td>
                    <td>
                        评论数
                    </td>
                    <td>
                        点赞数
                    </td>
                    <td>
                        发布时间
                    </td>
                </tr>
                </thead>
                @if(!empty($userReport))
                    @foreach($userReport as $k=>$v)
                        <tr>
                            <td>
                                {{$v->book_name}}
                            </td>
                            <td>
                                {{$v->content}}
                            </td>
                            <td>
                                {{$v->comments_count}}
                            </td>
                            <td>
                                {{$v->like_count}}
                            </td>
                            <td>
                                {{$v->created_at}}
                            </td>
                        </tr>
                    @endforeach
                @endif

            </table>
        </div>
    </div>

@endsection