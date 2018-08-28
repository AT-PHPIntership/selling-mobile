<?php

namespace App\Http\Requests\User;

use App\Http\Requests\User\ApiFormRequest;

class RegisterRequest extends ApiFormRequest
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
            'username'       => 'required|string|max:100|unique:users',
            'email'          => 'required|string|email|max:255|unique:users',
            'password'       => 'required|string|min:5',
            'rePassword'     => 'required_with:password|same:password'
            'phonenumber'    => 'required|numeric',
            'address'        => 'string',
        ];
    }
}
