<?php

namespace App\Http\Requests;

use App\Traits\ApiErrorResponse;
use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            // 'logo'=>'image|mimes:jpg,jpeg,png,svg',
            // 'fevicon'=>'image|mimes:jpg,jpeg,png,svg',
            'title'=>'required',
            'description'=>'required',
            'theme_color'=>'required',
            'email'=>'required',
            'copyright'=>'required'
        ];
    }

    public function attributes()
    {
        return  [
            'logo' => 'Logo',
            'fevicon' => 'Fevicon',
            'title' => 'Website Name',
            'description' => 'Description',
            'theme_color' => 'Theme Color',
            'email' => 'E-maiil ID',
            'copyright' => 'Copyright',
        ];
    }

    // protected function getValidatorInstance()
    // {
    //     $input = $this->all();

    //     $input['my_parent_id'] = $input['my_parent_id'] ? Qs::decodeHash($input['my_parent_id']) : NULL;

    //     $this->getInputSource()->replace($input);

    //     return parent::getValidatorInstance();
    // }
}
