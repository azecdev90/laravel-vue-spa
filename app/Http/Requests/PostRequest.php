<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'jobtitle' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
   throw new HttpResponseException(response()->json([
     'errors'      => $validator->errors()
   ]));
    }
}
