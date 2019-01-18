@extends('admin.layouts.base')


@section('main')
    <table class="layui-table" lay-skin="line" lay-size="lg">
        <thead>
        <tr>
            <th>编号</th>
            <th>图书信息</th>
            <th>发布者信息</th>
            <th>内容</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>t>
        @if($result->isNotEmpty())
            @foreach($result as $value)
                <tr>
                    <td>
                        {{$value->id}}
                    </td>
                    <td>
                        {{$value->book_name}}
                    </td>
                    <td>
                        {{!empty($value->author)?$value->author->nickname:''}}
                    </td>
                    <td>
                        {{$value->content}}
                    </td>
                    <td>
                        {{$value->created_at}}
                    </td>
                    <td>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" style="text-align: center">暂无用户</td>
            </tr>
        @endif
        </tbody>
    </table>



@endsection