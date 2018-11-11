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
                <img src="https://pic1.zhimg.com/v2-bd7967622a98ab1fe6f6e9da99bf62d7_l.jpg"
                     style="width: 40px;border-radius: 50%">
                <span>IvanCoacher</span>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-md4">
                性别：男
            </div>
            <div class="layui-col-md4">
                手机号：18652362600
            </div>
            <div class="layui-col-md4">
                签名：哈哈哈哈哈
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-md4">
                孩子姓名：男
            </div>
            <div class="layui-col-md4">
                孩子性别：哈哈哈哈哈
            </div>
            <div class="layui-col-md4">
                孩子学校名称：18652362600
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-md4">
                孩子年级：男
            </div>
            <div class="layui-col-md4">
                孩子班级：哈哈哈哈哈
            </div>
        </div>
    </div>
    <!--账单信息-->
    <div class="layui-card" style="margin-top: 15px;border-top: 1px solid #f6f6f6;">
        <div class="layui-card-header">账单信息</div>
        <div class="layui-card-body">
            <table class="layui-table">
                <tr>
                    <td>
                        描述
                    </td>
                    <td>
                        时间
                    </td>
                </tr>
                <tr>
                    <td>
                        买书
                    </td>
                    <td>
                        2018-11-11 11:11:11
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!--收藏列表-->
    <div class="layui-card" style="margin-top: 15px;border-top: 1px solid #f6f6f6;">
        <div class="layui-card-header">收藏列表</div>
        <div class="layui-card-body">
            <table class="layui-table">
                <tr>
                    <td>
                        图书信息
                    </td>
                    <td>
                        时间
                    </td>
                </tr>
                <tr>
                    <td>
                        十万个为什么
                    </td>
                    <td>
                        2018-11-11 11:11:11
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!--发布二手-->
    <div class="layui-card" style="margin-top: 15px;border-top: 1px solid #f6f6f6;">
        <div class="layui-card-header">发布二手</div>
        <div class="layui-card-body">
            <table class="layui-table">
                <tr>
                    <td>
                        图书信息
                    </td>
                    <td>
                        时间
                    </td>
                </tr>
                <tr>
                    <td>
                        买书
                    </td>
                    <td>
                        2018-11-11 11:11:11
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!--借书信息-->
    <div class="layui-card" style="margin-top: 15px;border-top: 1px solid #f6f6f6;">
        <div class="layui-card-header">借书信息</div>
        <div class="layui-card-body">
            <table class="layui-table">
                <tr>
                    <td>
                        图书信息
                    </td>
                    <td>
                        时间
                    </td>
                </tr>
                <tr>
                    <td>
                        买书
                    </td>
                    <td>
                        2018-11-11 11:11:11
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!--读后感列表-->
    <div class="layui-card" style="margin-top: 15px;border-top: 1px solid #f6f6f6;">
        <div class="layui-card-header">借书信息</div>
        <div class="layui-card-body">
            <table class="layui-table">
                <tr>
                    <td>
                        图书信息
                    </td>
                    <td>
                        时间
                    </td>
                </tr>
                <tr>
                    <td>
                        买书
                    </td>
                    <td>
                        2018-11-11 11:11:11
                    </td>
                </tr>
            </table>
        </div>
    </div>

@endsection