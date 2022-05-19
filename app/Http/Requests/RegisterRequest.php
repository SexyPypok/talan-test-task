<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:users,name|max:255',
            'email' => 'required|unique:users,email|string|max:255|email',
            'phone' => 'required|unique:users,phone|string',
            'password' => 'required|string|min:8|max:255',
        ];
    }
}
