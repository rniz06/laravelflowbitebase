<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
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
            'email' => ['required', 'max:40'],
            'nickname' => 'required|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El campo tiene un limite de 40 caracteres',
            'email.required' => 'El Email es requerido',
            'email.max' => 'El campo tiene un limite de 40 caracteres',
            'nickname.required' => 'El Nickname es requerido',
            'email.max' => 'El campo tiene un limite de 20 caracteres',
        ];
    }
}
