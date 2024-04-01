<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZoneFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required', 'max:224', 'string'],
            'localisation' => ['required', 'max:100'],
            'description' => ['nullable', 'string'],
            'region_id' => ['required', 'exists:regions,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Le champ :attribute est obligatoire.',
            'max' => 'Le champ :attribute ne doit pas dépasser :max caractères.',
            'exists' => 'Cette région n\'exist pas.',
            'string' => 'Le champ :attribute doit être une chaîne de caractères.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
