<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PromoteurFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required', 'max:254', 'string'],
            'tel' => ['required', 'numeric'],
            'email' => [
                'required', 'email', 'lowercase', 'max:254',
                Rule::unique('promoteurs')->ignore($this->route('promoteur'))
            ],
            'bp' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Le champ :attribute est obligatoire.',
            'email' => 'L\'adresse email n\'est pas valide.',
            'max' => 'Le champ :attribute ne doit pas dépasser :max caractères.',
            'numeric' => 'le champ :attribute doit être un nombre.',
            'unique' => 'l\'email existe déjà.',
            'lowercase' => 'l\'email doit être en minuscule',
            'string' => 'Le champ :attribute doit être une chaîne de caractères.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
