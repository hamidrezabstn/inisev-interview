<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseFormRequest extends FormRequest
{  
    protected function failedValidation(Validator $validator)
    {
    throw new HttpResponseException(response()->error('Validation errors'));
    }
}
