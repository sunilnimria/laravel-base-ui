<?php

namespace App\Http\Requests\Student;

use App\Traits\ApiErrorResponse;
use Illuminate\Foundation\Http\FormRequest;

class StudentCreate extends FormRequest
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
            'admission_no' => 'required|string|unique:students,admission_no',
        'name' => 'required|string|min:3',
        'father_name' => 'required|string|min:3',
        'mother_name' => 'required|string|min:3',
        'mobile_no' => 'required|string|min:10|max:12',
        // 'password' => 'string|min:8',
        'gender' => 'required|string',
        'dob' => 'required',
        'reg_date' => 'required',
        // 'reg_class' => 'required|numeric|exists:my_classes,id',
        'my_class_id' => 'required|numeric|exists:my_classes,id',
        'section_id' => 'required|numeric|exists:sections,id',
        'house_no' => 'required|string|min:3',
        'landmark' => 'required|string|min:3',
        'city' => 'required|string|min:3',
        'country_id' => 'required|numeric|exists:countries,id',
        'state_id' => 'required|numeric|exists:states,id',
        'district_id' => 'required|numeric|exists:districts,id',
        'pin_code' => 'required|numeric|min:100000|max:999999',
        'photo' => 'image|mimes:jpg,jpeg,png',
        'blood_group' => 'required|numeric|exists:blood_groups,id'
        ];
    }
    public function attributes()
    {
        return  [
            'my_class_id' => 'Class',
            'city' => 'City',
            'name' => 'Student Name',
        ];
    }
}
