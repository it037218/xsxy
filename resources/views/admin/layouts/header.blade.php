<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>图书</title>
    <link rel="stylesheet" type="text/css" href="/plugins/layui/css/layui.css?v=12ed" media="all">

    <style>
        /*.layui-layout-admin .layui-side {*/
            /*!*top: 0;*!*/
        /*}*/
        /**{*/
            /*padding: 0;*/
            /*margin: 0;*/
        /*}*/
        /*.layui-side {*/
            /*z-index: 1001;*/
        /*}*/

        /*.layui-layout-admin .layui-logo {*/
            /*height: 60px;*/
            /*color: #fff;*/
            /*border-bottom: 1px solid #14685E;*/
            /*text-align: left;*/
            /*padding-left: 20px;*/
        /*}*/

        /*.layui-side .layui-nav {*/
            /*position: absolute;*/
            /*top: 61px;*/
            /*left: 0;*/
        /*}*/

        /*.layui-header .layui-nav .layui-nav-item a {*/
            /*color: #999;*/
        /*}*/

        /*.layui-layout-admin .layui-body {*/
            /*background-color: #F2F2F2;*/
            /*bottom: 0;*/
            /*padding: 15px;*/
            /*box-sizing: border-box;*/
        /*}*/

        /*.layui-layout-admin .layui-header {*/
            /*background-color: #fff;*/
        /*}*/

        /*.layui-layout-admin .layui-logo {*/
            /*border: none;*/
        /*}*/

        /*.layui-bg-gray .layui-nav-itemed a {*/
            /*color: #333 !important;*/
        /*}*/
        /*.layui-nav .layui-nav-mored, .layui-nav-item > a .layui-nav-more {*/
            /*margin-top: -9px;*/
            /*border-style: dashed dashed solid;*/
            /*border-color:  #999 transparent transparent;*/
        /*}*/
        /*.layui-nav .layui-nav-mored, .layui-nav-itemed > a .layui-nav-more {*/
            /*margin-top: -9px;*/
            /*border-style: dashed dashed solid;*/
            /*border-color: transparent transparent #999;*/
        /*}*/

        /*.layui-bg-gray .layui-nav-item a:hover {*/
            /*background-color: #eee;*/
        /*}*/
        /*.layui-bg-gray .layui-nav-child {*/
            /*background-color: #eee!important;*/

        /*}*/
        /*.layui-nav-item .layui-nav-child dd{*/
            /*box-sizing: border-box;*/
            /*padding-left: 25px;*/
        /*}*/
        /*.layui-nav .layui-icon{*/
            /*display: inline-block;*/
            /*width: 20px;*/
            /*font-size: 18px!important;*/
            /*margin-right: 3px;*/
        /*}*/
        /*.layui-breadcrumb {*/
            /*visibility: visible;*/
            /*font-size: 0*/
        /*}*/

        /*.layui-breadcrumb a {*/
            /*display: inline-block;*/
        /*}*/
        .layui-layout-admin .layui-side{
            top: 61px;
        }
    </style>
    @yield('link_pre')
    @yield('script_pre')
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header  layui-bg-green">
        {{--<div class="layui-logo">--}}
            {{--图书--}}
        {{--</div>--}}
        <div style="color: #fff; font-size: 28px;height: 60px;line-height: 60px;padding-left: 20px;font-weight: bold">
            图书
        </div>
        <ul class="layui-nav layui-layout-right ">
            <li class="layui-nav-item">
                <a href="javascript:;">
{{--                    {{session('userInfo')->username}}--}}
                </a>
            </li>
            <li class="layui-nav-item"><a href="/admin/logout">注销</a></li>
        </ul>
    </div>
    @yield('container')
</div>
@yield('link_post')
@yield('script_post')
@yield('model')
</body>
</html>