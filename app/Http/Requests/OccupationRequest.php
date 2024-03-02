<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccupationRequest extends FormRequest
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
            'occupation_code' => 'required|unique:occupations|max:255',
            'occupation_name' => 'required|max:255',
            'description' => 'required|max:1500',
        ];


    }

    public function messages(): array
    {
        return [
            'occupation_code.required' => 'El código de ocupación es obligatorio.',
            'occupation_code.unique' => 'El código de ocupación ya ha sido utilizado.',
            'occupation_code.max' => 'El código de ocupación no puede ser mayor a :max caracteres.',
            'occupation_name.required' => 'El nombre de la ocupación es obligatorio.',
            'occupation_name.max' => 'El nombre de la ocupación no puede ser mayor a :max caracteres.',
            'description.required' => 'La descripción de la ocupación es obligatoria.',
            'description.max' => 'La descripción de la ocupación no puede ser mayor a :max caracteres.',
        ];
    }

}
