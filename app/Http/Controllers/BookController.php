<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {


    }

    public function store(Request $request)
    {
        $data = [
            'book_name' => $request->input('book_name'),
            'cover_image_id' => $request->input('image_id'),
            'grade' => $request->input('grade'),
            'desc' => $request->input('desc'),
            'openid' => $request->input('openid'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'number' => $request->input('number', 1),
            'contact' => $request->input('contact')
        ];
        $result = Book::create($data);
        return ['success' => $result ? 1 : 0];
    }


    public function detail(Request $request)
    {

    }


}
