<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index(){


    }

    public function store(Request $request){
        $data = [
            'book_name'=>$request->input('book_name'),


        ];
    }


    public function detail(Request $request){

    }




}
