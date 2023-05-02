<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SendOtpRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'otpType' => 'starts_with:RESET_NUMBER_OTP,SIGNUP_NUMBER_OTP,RESET_EMAIL_OTP,SIGNUP_EMAIL_OTP',
            'phoneNumber' => 'required_if:otpType,SIGNUP_NUMBER_OTP,RESET_NUMBER_OTP|exists:users,phoneNumber',
            'email' => 'required_if:otpType,SIGNUP_EMAIL_OTP,RESET_EMAIL_OTP|email|exists:users,email',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ], 422));
    }
}
