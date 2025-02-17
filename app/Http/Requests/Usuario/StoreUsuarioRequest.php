<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|unique:users,email|max:40',
            'nickname' => 'required|unique:users,nickname|max:20',
            'password' => 'required|min:8|max:20'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El campo tiene un limite de 40 caracteres',
            'email.required' => 'El Email es requerido',
            'email.unique' => 'El Email ya esta en uso',
            'email.max' => 'El campo tiene un limite de 40 caracteres',
            'nickname.required' => 'El Nickname es requerido',
            'nickname.unique' => 'El Nickname ya esta en uso',
            'email.max' => 'El campo tiene un limite de 20 caracteres',
            'password.required' => 'La Contraseña es requerida',
            'password.min' => 'El campo debe contener al menos 20 caracteres',
            'password.max' => 'El campo tiene un limite de 20 caracteres',
        ];
    }
}
