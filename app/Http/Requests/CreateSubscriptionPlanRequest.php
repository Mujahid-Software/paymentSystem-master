<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubscriptionPlanRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'association_name' => 'required|string|max:255',
            'status_id' => 'required|exists:statuses,id',
            'price' => 'required|numeric|min:0',
            'features' => 'nullable|array',
            'features.*.name' => 'required_with:features|string|max:255',
            'features.*.status_id' => 'required_with:features|exists:statuses,id',
        ];
    }
}
