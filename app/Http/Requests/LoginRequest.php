<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * This method controls who can send requests to this endpoint.
     * For general user login, typically any guest (non-authenticated user) should be able to attempt a login.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->check(); // Allow only if the user is not already authenticated.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * Here we define the fields required for a login attempt and specify the type of validation each field needs.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * Customize the error messages returned for validation failures.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'An email address is required to log in.',
            'email.email' => 'You must enter a valid email address.',
            'password.required' => 'A password is required to log in.',
        ];
    }
}
