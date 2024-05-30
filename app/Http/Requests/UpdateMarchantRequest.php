<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMarchantRequest extends FormRequest
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
        $merchantId = $this->route('marchant'); // Assuming route model binding or the merchant ID is passed as a route parameter

        return [
            'name' => 'string|max:255',
            'identity_number' => [
                'string',
                'max:255',
                Rule::unique('marchants', 'identity_number')->ignore($merchantId),
            ],
            'phone' => 'string|max:20',
            'address' => 'nullable|string|max:255',
            'iban' => [
                'string',
                'max:34',
                Rule::unique('marchants', 'iban')->ignore($merchantId),
            ],
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('marchants', 'email')->ignore($merchantId),
            ],
            'commercial_registration_number' => [
                'string',
                'max:255',
                Rule::unique('marchants', 'commercial_registration_number')->ignore($merchantId),
            ],
            'commercial_registration_file' => 'nullable|string|max:255',
            'tax_number' => [
                'string',
                'max:255',
                Rule::unique('marchants', 'tax_number')->ignore($merchantId),
            ],
            'tax_file' => 'file|mimes:pdf,doc,docx|max:10240',
        ];
    }
}
