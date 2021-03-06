<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|max:255',
            'producer'      => 'required|string',
            'detail'        => 'required',
            'description'   => 'required',
            'price'         => 'required|integer|min:1000|max:10000000000',
            'category_id'   => 'required|exists:categories,id',
            'image.*'       => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
