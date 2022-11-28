<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

class ClassesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'school_id' => 'required',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => Response::HTTP_BAD_REQUEST,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ],Response::HTTP_BAD_REQUEST));
    }
    public function messages()
    {
        return [
            'name.required' => 'name is required',
            'school_id.required' => 'school_id is required',
        ];
    }
}
