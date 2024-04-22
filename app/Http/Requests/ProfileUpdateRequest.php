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
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone_number' => ['nullable'],
            'postal_code' => ['nullable', 'string'],
            'region' => ['nullable', 'string'],
            'locality' => ['nullable', 'string'],
            'role' => ['required', 'integer', 'in:0,1'],
        ];

        // 画像が選択された場合のみ
        if ($this->file('image')) {
        $rules['image'] = ['image', 'max:1024'];
        }
    }
}
