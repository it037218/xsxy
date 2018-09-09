<?php

namespace App\Services;

use App\Models\Book;

class BookServices
{
    public function storeBook($data)
    {
        $model = Book::create($data);
        return $model->id;
    }

    public function getOneBook($bookId)
    {
        return Book::find($bookId);
    }

    public function getAllBook($param = [])
    {
        $model = new Book();
        return $model->search($param)->orderBy('created_at', 'desc')->get();
    }

    public function updateBook($bookId, $data)
    {
        return Book::find($bookId)->update($data);
    }

    public function deleteBook($bookId)
    {
        return Book::find($bookId)->delete();
    }

    public function saveImages($bookId, $images)
    {
        return Book::find($bookId)->images()->sync($images);
    }

}
