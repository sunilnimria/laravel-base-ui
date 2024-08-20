<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\ApiErrorResponse;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
    public function rules(Request $request, User $user): array
    {
        return [
            'name' => 'required|max:50',
            // 'email' => 'required|max:100|email|unique:admins,email,' . $request->email,
            'email' => ['required','max:100','email', Rule::unique('users','email')->ignore($request->id, 'id') ],
            // 'username' => ['required','max:100','string', Rule::unique('admins','username')->ignore($request->id, 'id') ],
            'password' => 'nullable|min:6|confirmed',
        ];
    }

    public function attributes()
    {
        return  [
            'name' => 'User Name',
        ];
    }

    public function messages()
    {
        return  [
        ];
    }
}
