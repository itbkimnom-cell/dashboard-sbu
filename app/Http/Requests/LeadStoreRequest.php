<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadStoreRequest extends FormRequest
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
            'stage' => ['required', 'max:255', 'string'],
            'probability' => ['required', 'numeric'],
            'expected_close_date' => ['required', 'date'],
            'lead_value' => ['required', 'numeric'],
            'competitor' => ['nullable', 'max:255', 'string'],
            'status' => ['required', 'max:255', 'string'],
            'lost_reason' => ['required', 'max:255', 'string'],
            'notes' => ['required', 'max:255', 'string'],
            'closed_at' => ['required', 'date'],
            'potential_id' => ['required', 'exists:potentials,id'],
        ];
    }
}
