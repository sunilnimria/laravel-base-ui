<?php

namespace App\Http\Requests\User;

use App\Traits\ApiErrorResponse;
use Illuminate\Foundation\Http\FormRequest;

class storeUserRequest extends FormRequest
{
    use ApiErrorResponse;

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
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'username' => 'required|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function attributes()
    {
        return  [
            'name' => 'User Name',
        ];
    }
}
