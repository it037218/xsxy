<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBook;
use App\Http\Requests\UpdateBook;
use App\Services\BookServices;
use App\Services\CommodityServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsedBookController extends Controller
{
    //
    public function index()
    {

    }

    public function show(Request $request, $id)
    {
        return view('admin.book.show');
    }

    public function add()
    {
        return view('admin.book.store');

    }

    public function store(StoreBook $request)
    {


    }

    public function modify($id)
    {
        return view('admin.book.modify');
    }

    public function update(UpdateBook $request, $id)
    {
    }


    public function delete($id)
    {

    }

}
