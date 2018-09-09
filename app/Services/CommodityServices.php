<?php

namespace App\Services;

use App\Models\Commodity;

class CommodityServices
{
    public function store($bookId, $data)
    {
        $model = new Commodity();
        $commodity = $model->where('book_id', $bookId)->first();
        if ($commodity) {
            return Commodity::where('book_id', $bookId)->update($data);
        } else {
            return Commodity::create($data);
        }

    }

}
