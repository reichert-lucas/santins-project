<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreUniversityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'alpha_two_code' => 'nullable|string',
            'country' => 'nullable|string',
            'domains' => 'nullable|array',
            'domains.*' => 'required|string',
            'name' => 'nullable|string',
            'web_pages' => 'nullable|array',
            'web_pages.*' => 'required|string',
        ];
    }
}
