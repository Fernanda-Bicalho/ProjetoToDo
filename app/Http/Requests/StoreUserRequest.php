<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ];
    }


    public function messages()
    {
       return [
        'name.required' => 'O campo nome é obrigatório!',
        'email.required' => 'O campo e-mail é obrigatório!',
        'email.email' => 'O e-mail é invalido!',
        'password.required' => 'O campo senha é obrigatório!',
        'password.min' => 'O campo senha deve conter 6 caracteres ou mais!',
        'password.confirmed' => 'O campo confirmação de senha é obrigatório!',
       ];
    }
}
