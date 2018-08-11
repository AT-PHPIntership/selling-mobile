<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'username' => 'required|max:255|min:5',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|max:255|min:5',
                    'passwordAgain' => 'required|same:password',
                    'address' => 'required|max:255',
                    'phonenumber' => 'required|numeric',
                    'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'username' => 'max:255|min:5',
                    'address' => 'max:255',
                    'phonenumber' => 'numeric',
                    'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
            default:
                break;
        }
    }
}
