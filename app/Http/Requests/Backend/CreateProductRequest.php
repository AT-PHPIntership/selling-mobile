<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

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
            'status'        => 'required|integer|min:0|max:1',
            'unit_price'    => 'required',
            'category_id'   => 'required',
            'image.*'       => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
