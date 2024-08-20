<?php

namespace App\Traits;


use App\Helpers\Qs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ApiErrorResponse
{

    public function failedValidation(Validator $validator)
    {

        $errors = $validator->errors();

        // $message = '';
        // if ($errors) {
        //     $message = Qs::validation_error($errors->getMessages());
        // }
        $arr = [
            'errors' => $errors,
            'message' => 'Please enter vailid data.',
        ];
        throw new HttpResponseException(Qs::jsonResponse('error', $arr));

    }
}
