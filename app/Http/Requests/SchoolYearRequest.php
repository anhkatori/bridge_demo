<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

class SchoolYearRequest extends FormRequest
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
            'time_start' => 'required',
            'time_end' => 'required',
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
            'time_start.required' => 'time_start is required',
            'time_end.required' => 'time_end is required',
        ];
    }
}
