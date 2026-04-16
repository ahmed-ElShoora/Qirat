<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateUnitRequest extends FormRequest
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
            'primary_image' => 'required|image|mimes:jpeg,png,jpg,gif',

            'slider_images' => 'required|array',
            'slider_images.*' => 'image|mimes:jpeg,png,jpg,gif',

            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',

            'developer_id' => 'required|exists:developers,id',
            'type_id' => 'required|exists:types,id',

            'signatures' => 'required|array',
            'signatures.*' => 'exists:signatures,id',

            'other_type' => 'required|string|in:developer,resale',
            'project_state' => 'required|string|in:unit,launche',

            'developer_price' => 'required|numeric|min:0',
            'resale_price' => 'nullable|numeric|min:0',

            'down_payment_percentage' => 'required|numeric|min:0|max:100',
            'payment_percentage_per_year' => 'required|numeric|min:0|max:100',
            'pay_amount_per_years' => 'required|numeric|min:0',
            'years_count' => 'required|integer|min:0',

            'phone_number' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',

            'lng' => 'required|numeric',
            'lat' => 'required|numeric',

            'bed_number' => 'nullable|integer|min:0',
            'bathroom_number' => 'nullable|integer|min:0',

            'master_plan' => 'required|file|mimes:pdf',
            'digital_brochure' => 'nullable|file|mimes:pdf',
        ];
    }
}
