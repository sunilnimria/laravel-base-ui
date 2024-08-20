<?php

namespace App\Http\Requests\Role;

use App\Traits\ApiErrorResponse;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateRoleRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            'name' => ['required','string','min:3', Rule::unique('roles', 'name')->ignore($request->id, 'id')],
            // 'name' => 'required|max:100|unique:roles,name,' . $request->id
        ];
    }

    public function attributes()
    {
        return  [
            'name' => 'Role Name',
        ];
    }

    public function messages()
    {
        return  [
            'name.requried' => 'Please give a role name.',
            'name.requried' => 'Please give a role name.',
            // 'name.string' => 'Role name should contain minimum three charector.',
            'name.min' => 'Role name should contain minimum three charector.',
        ];
    }
}
