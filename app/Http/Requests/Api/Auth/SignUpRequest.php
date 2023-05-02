<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SignUpRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullName' => 'required',
            'password' => 'required',
            'email' => 'required|string|email|unique:users',
            'gender' => 'required',
            'dob' => 'required',
            'completeAddress' => 'required',
            'city' => 'required',
            'postalCode' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phoneNumber' => 'required',
            'avatar' => 'required',
            'regionId'=> 'required',
            'emergencyContactName'=> 'required',
            'emergencyContactRelation'=> 'required',
            'emergencyContactNumber'=> 'required',
            'bio'=> 'required',
            'deviceIdentifire'=> 'required',
            'deviceName'=> 'required',
            'fcmToken'=> 'required',
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
