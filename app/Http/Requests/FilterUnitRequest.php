<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FilterUnitRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string',
            'sqm' => 'string',
            'other_type' => 'in:resale,developer',
            'project_state' => 'in:unit,launche',
            'type' => 'integer|exists:types,id',
            'developer' => 'integer|exists:developers,id',
            'bathroom' => 'integer|min:0',
            'bed' => 'integer|min:0',
            'min_price' => 'numeric|min:0',
            'max_price' => 'numeric|min:0',
        ];
    }
}
