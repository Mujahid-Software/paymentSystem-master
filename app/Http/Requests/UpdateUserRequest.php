<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Status;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->route('user')->id],
            'phone' => ['string', 'max:255', 'unique:users,phone,' . $this->route('user')->id],
            'status_id' => 'in:' . implode(',', array_diff(array_keys(User::STATUSES), [Status::ADMIN])),
            'permissions' => ['sometimes', 'array'],
            'permissions.*' => ['exists:' . Permission::class . ',name'],
        ];
    }
}
