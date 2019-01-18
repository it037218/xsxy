@extends('admin.layouts.base')


@section('main')
    <table class="layui-table" lay-skin="line" lay-size="lg">
        <thead>
        <tr>
            <th>图书编号</th>
            <th>图书信息</th>
            <th>发布者信息</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
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
                        {{--<img src="" style="width: 30px;height: 30px;border-radius: 50%">--}}
                        {{$value->contact_user}}
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
                <td colspan="5" style="text-align: center">
                    暂无图书信息
                </td>
            </tr>
        @endif
        </tbody>
    </table>



@endsection