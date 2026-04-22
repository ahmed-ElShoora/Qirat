<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Traits\ApiResponse;

class KycRequest extends FormRequest
{
    use ApiResponse;
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
        if($this->type == 'shares') {
            return [
                'type' => 'required|in:shares,broker',
                'front_id' => 'required|image|mimes:jpeg,png,jpg',
                'back_id' => 'required|image|mimes:jpeg,png,jpg',
                'selfie' => 'required|image|mimes:jpeg,png,jpg',
            ];
        } 
        return [
            'type' => 'required|in:shares,broker',
            'front_id' => 'required|image|mimes:jpeg,png,jpg',
            'back_id' => 'required|image|mimes:jpeg,png,jpg',
            'selfie' => 'required|image|mimes:jpeg,png,jpg',
            'cv' => 'required|file|mimes:pdf,doc,docx',
            'contract' => 'required|file|mimes:pdf,doc,docx',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {        
        $errors = $validator->errors()->all();
        throw new HttpResponseException($this->errorResponse(422, 'Validation failed', $errors));
    }
}
