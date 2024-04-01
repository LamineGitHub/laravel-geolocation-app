<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required', 'max:225', 'string'],
            'superficie' => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Le champ :attribute est obligatoire.',
            'max' => 'Le nom :attribute ne doit pas dépasser :max caractères.',
            'integer' => 'la superficie doit être un nombre.',
            'string' => 'Le champ :attribute doit être une chaîne de caractères.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
