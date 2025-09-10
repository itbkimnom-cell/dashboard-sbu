<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToolLoanStoreRequest extends FormRequest
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
            'start_loan_date' => ['required', 'date'],
            'end_loan_date' => ['required', 'date'],
            'return_date' => ['required', 'date'],
            'quantity' => ['required', 'numeric'],
            'condition_out' => ['required', 'max:255', 'string'],
            'condition_in' => ['required', 'max:255', 'string'],
            'status' => ['required', 'max:255', 'string'],
            'notes' => ['nullable', 'max:255', 'string'],
            'tool_inventory_id' => ['required', 'exists:tool_inventories,id'],
            'borrowed_by' => ['required', 'exists:users,id'],
            'approved_borrowed_by' => ['nullable', 'exists:users,id'],
            'approved_returned_by' => ['nullable', 'exists:users,id'],
        ];
    }
}
