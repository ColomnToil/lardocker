<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо к заполнению',
            'name.string' => 'Данные должны быть строчного типа',

            'email.required' => 'Это поле необходимо к заполнению',
            'email.string' => 'Данные должны быть строчного типа',
            'email.unique' => 'Пользователь с таким email уже существует',

            'password.required' => 'Это поле необходимо к заполнению',
            'password.string' => 'Данные должны быть строчного типа',

            'role.required' => 'Это поле необходимо к заполнению',
            'role.integer' => 'Данные должны быть числом',
        ];
    }
}
