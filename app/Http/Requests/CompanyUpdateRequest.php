<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'string'],
            'industry' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'website' => ['nullable', 'max:255', 'string'],
            'pic_name' => ['required', 'max:255', 'string'],
            'pic_position' => ['required', 'max:255', 'string'],
            'pic_phone' => ['required', 'max:255', 'string'],
            'created_by' => ['required', 'exists:users,id'],
        ];
    }
}
