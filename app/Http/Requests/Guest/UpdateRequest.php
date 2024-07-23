<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "first_name" => ['nullable', 'string', 'max:255'],
            "last_name" => ['nullable', 'string', 'max:255'],
            "email" => ['nullable', 'string', 'email', 'max:255', 'unique:guests,email'],
            'phone' => ['nullable', 'string', 'min:10', 'max:15'],
            'country' => ['nullable', 'string', 'max:255'],
        ];
    }
}
