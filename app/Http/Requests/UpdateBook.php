<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'book_name' => 'required',
            'description' => 'required',
            'images' => 'required',
            'stock' => 'required',
            'author'    =>'required',
            'cover_image_id'    =>'required|integer',

            //
        ];
    }
}
