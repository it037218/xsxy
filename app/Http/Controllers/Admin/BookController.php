<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBook;
use App\Http\Requests\UpdateBook;
use App\Models\Book;
use App\Services\BookServices;
use App\Services\CommodityServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function index()
    {
        $result = Book::with(['CoverImages'])->orderByDesc('created_at')->get();
        return view('admin.book.index')->with([
            'result' => $result
        ]);
    }

    public function show(Request $request, $id)
    {
        $result = Book::with(['CoverImages', 'DetailImages'])->find($id);
        return view('admin.book.show')->with([
            'result' => $result
        ]);
    }

    public function add()
    {
        return view('admin.book.store');

    }

    public function store(StoreBook $request)
    {
        $requestData = $request->validated();
        try {
            DB::beginTransaction();
            $data = [
                'book_name' => $requestData['book_name'],
                'description' => $requestData['description'],
                'author' => $requestData['author'],
                'cover_image_id' => $requestData['cover_image_id'],
                'price' => $requestData['price']
            ];
            $service = new BookServices();
            $bookId = $service->storeBook($data);

            //保存图片
            $images = $requestData['images'];
            $service->saveImages($bookId, $images);

            //同步到商品表
            $commodityService = new CommodityServices();
            $data['sale_number'] = 'A' . $bookId . time();
            $commodityService->store($bookId, $data);
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        DB::commit();
        return $this->success('200');

    }

    public function modify($id)
    {
        return view('admin.book.modify');
    }

    public function update(UpdateBook $request, $id)
    {
        $requestData = $request->validated();
        $service = new BookServices();
        $service->updateBook($id, $requestData);
        $service->saveImages($id, $requestData['images']);
    }


    public function delete($id)
    {

    }

}
