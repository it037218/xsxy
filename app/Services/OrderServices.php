<?php

namespace App\Services;

use App\Models\Order;

class OrderServices
{
    public function getAllOrders($params){
        $model = new Order();
        return $model->search($params)->orderBy('created_at','desc')->get();
    }

    public function getOneOrder($orderNo){
        return Order::where('order_no',$orderNo)->first();
    }
}
