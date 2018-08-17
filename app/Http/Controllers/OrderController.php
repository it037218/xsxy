<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder;
use App\Services\OrderServices;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(Request $request){
        $service = new OrderServices();
        $result = $service->getAllOrders($request->all());
        return view('admin.order.index',$result);
    }

    public function update(Request $request){



    }
}
