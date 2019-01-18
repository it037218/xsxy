@extends('admin.layouts.header')
@section('container')
    <div class="layui-side layui-bg-green">
        <div class="layui-side-scroll layui-bg-green">
            <ul class="layui-nav layui-nav-tree layui-bg-green" lay-filter="test">
                <li class="layui-nav-item">
                    <a class="" href="javascript:;"><i class="layui-icon layui-icon-group"></i>&nbsp;图书管理</a>
                    <dl class="layui-nav-child">
                        <dd class="userList"><a href="/admin/book">图书列表</a></dd>
                        {{--<dd class="userDegree"><a href="/admin/book/add">新增图书</a></dd>--}}
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;"><i class="layui-icon layui-icon-group"></i>&nbsp;用户管理</a>
                    <dl class="layui-nav-child">
                        <dd class="userList"><a href="/admin/user">用户列表</a></dd>
                        {{--<dd class="userDegree"><a href="/admin/user/tag">用户标签设置</a></dd>--}}
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a class="" href="javascript:;"><i class="layui-icon layui-icon-group"></i>&nbsp;读后感管理</a>
                    <dl class="layui-nav-child">
                        <dd class="userList"><a href="/admin/report">读后感列表</a></dd>
                        {{--<dd class="userDegree"><a href="/admin/user/tag">用户标签设置</a></dd>--}}
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-body">
        <!-- 内容主体区域 -->

        <div style="padding: 15px;">@yield('main')</div>


    </div>

@endsection
@section('script_post')
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="/plugins/layui/layui.all.js"></script>
    <script>
        layui.use('element', function () {
            //导航的hover效果、二级菜单等功能，需要依赖element模块
            var element = layui.element;
            element.init()
        });
    </script>
@endsection

@section('link_post')

@endsection