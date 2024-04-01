<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerrainFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'superficie' => ['required', 'integer'],
            'description' => ['nullable', 'string'],
            'zone_id' => ['required', 'exists:zones,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Le champ :attribute est obligatoire.',
            'integer' => 'Le champ :attribute doit être un entier.',
            'exists' => 'La zone n\'existe pas.',
            'string' => 'Le champ :attribute doit être une chaîne de caractères.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
