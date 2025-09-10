<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToolInventoryUpdateRequest extends FormRequest
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
            'purchase_date' => ['required', 'date'],
            'purchase_price' => ['required', 'numeric'],
            'location_store' => ['required', 'max:255', 'string'],
            'quantity' => ['required', 'numeric'],
            'status' => ['required', 'max:255', 'string'],
            'picture' => ['nullable', 'max:255', 'string'],
            'notes' => ['required', 'max:255', 'string'],
            'tool_category_id' => ['required', 'exists:tool_categories,id'],
            'created_by' => ['required', 'exists:users,id'],
        ];
    }
}
