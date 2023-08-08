<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'O campo de E-mail é obrigatório!',
            'email.email' => 'O E-mail inserido não é válido!',
            'password.required' => 'O campo de Senha é obrigatório!',
            'password.min' => 'O campo de Senha deve conter no mínimo 6 caracteres!',
        ];
    }

}
