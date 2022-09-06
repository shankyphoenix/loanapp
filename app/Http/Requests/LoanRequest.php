<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class LoanRequest extends FormRequest
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
                'loan_type_id' => 'required',
                'loan_amount' => 'required|integer',
                'tenure' => 'required|integer',
                'interest' => 'required|numeric',
            ];
    }
    public function failedValidation(Validator $validator)
    {
        $response = [
            'status' => false,
            'message' => 'Validation Error',
            'data' => $validator->errors()
        ];
        throw new HttpResponseException(response()->json($response));
    }
}
