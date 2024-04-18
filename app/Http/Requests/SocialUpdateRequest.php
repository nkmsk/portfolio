<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'x' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'git_hub' => ['nullable', 'string', 'max:255'],
        ];
    }
}
