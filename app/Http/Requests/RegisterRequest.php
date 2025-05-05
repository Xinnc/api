<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255', 'regex:/^[А-Я]{1}+[А-я]+$/u'],
            'last_name' => ['required', 'string', 'max:255', 'regex:/^[А-Я]{1}+[А-я]+$/u'],
            'patronymic' => ['string', 'max:255', 'regex:/^[А-Я]{1}+[А-я]+$/u'],
            'role' => ['sometimes', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Password::min(3)->mixedCase()->numbers()],
        ];
    }

}
