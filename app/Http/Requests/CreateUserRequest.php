<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'document_type' => 'required|string|in:CC,TI,CE,PSP',
            'number_document' => 'required|string|unique:users,number_document',
            'telephone' => 'nullable|string|max:20',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El campo nombre debe ser una cadena de caracteres.',
            'name.max' => 'El campo nombre no puede tener más de :max caracteres.',
            'last_name.required' => 'El campo apellido es obligatorio.',
            'last_name.string' => 'El campo apellido debe ser una cadena de caracteres.',
            'last_name.max' => 'El campo apellido no puede tener más de :max caracteres.',
            'document_type.required' => 'El campo tipo de documento es obligatorio.',
            'document_type.string' => 'El campo tipo de documento debe ser una cadena de caracteres.',
            'document_type.in' => 'El campo tipo de documento debe ser uno de los siguientes valores: CC, TI, CE, PSP.',
            'number_document.required' => 'El campo número de documento es obligatorio.',
            'number_document.string' => 'El campo número de documento debe ser una cadena de caracteres.',
            'number_document.unique' => 'El número de documento ya ha sido registrado.',
            'telephone.string' => 'El campo teléfono debe ser una cadena de caracteres.',
            'telephone.max' => 'El campo teléfono no puede tener más de :max caracteres.',
            'phone_number.required' => 'El campo número de teléfono es obligatorio.',
            'phone_number.string' => 'El campo número de teléfono debe ser una cadena de caracteres.',
            'phone_number.max' => 'El campo número de teléfono no puede tener más de :max caracteres.',
            'address.required' => 'El campo dirección es obligatorio.',
            'address.string' => 'El campo dirección debe ser una cadena de caracteres.',
            'address.max' => 'El campo dirección no puede tener más de :max caracteres.',
            'birthdate.required' => 'El campo fecha de nacimiento es obligatorio.',
            'birthdate.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo electrónico válida.',
            'email.unique' => 'El correo electrónico ya ha sido registrado.',
            'email.max' => 'El campo correo electrónico no puede tener más de :max caracteres.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'El campo contraseña debe ser una cadena de caracteres.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ];
    }
}
