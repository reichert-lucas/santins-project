<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
        ];
    }
}
