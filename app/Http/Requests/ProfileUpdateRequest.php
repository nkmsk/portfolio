<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'about_me' => ['required', 'string', 'max:1000'],
            'pr' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone_number' => ['nullable'],
            'image' => ['nullable', 'image', 'max:1024'],
            'postal_code' => ['nullable', 'string'],
            'region' => ['nullable', 'string'],
            'locality' => ['nullable', 'string'],
        ];
    }
}
