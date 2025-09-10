<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InspectorReportUpdateRequest extends FormRequest
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
            'inspection_date' => ['required', 'date'],
            'file_report' => ['required', 'max:255', 'string'],
            'file_report_date' => ['required', 'date'],
            'file_bast' => ['required', 'max:255', 'string'],
            'file_bast_date' => ['required', 'date'],
            'inspector_user_id' => ['required', 'exists:users,id'],
            'administration_user_id' => ['required', 'exists:users,id'],
        ];
    }
}
