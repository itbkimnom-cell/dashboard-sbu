<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PotentialStoreRequest extends FormRequest
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
            'job_type' => ['required', 'max:255', 'string'],
            'project_name' => ['required', 'max:255', 'string'],
            'source' => ['required', 'max:255', 'string'],
            'interest_level' => ['required', 'max:255', 'string'],
            'estimated_value' => ['required', 'numeric'],
            'status' => ['required', 'max:255', 'string'],
            'notes' => ['required', 'max:255', 'string'],
            'company_id' => ['required', 'exists:companies,id'],
            'created_by' => ['required', 'exists:users,id'],
        ];
    }
}
