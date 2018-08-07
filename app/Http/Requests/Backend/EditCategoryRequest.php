<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
        $category = $this->route()->parameter('category');
        return [
            'name' => [
                'required',
                'regex:/(^[A-Za-z0-9 ]+$)+/',
                'unique:categories,name,' . $category->name . ',name'
            ],
            'parent_id' => 'nullable|exists:categories,id'
        ];
    }
}
