<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

class AuthRequest extends FormRequest
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
            'email' => 'required|string|email',
            'password' => 'required|string',
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
            'email.required' => 'email is required',
            'email.email' => 'email is email',
            'password.required' => 'password is required',
        ];
    }
}
