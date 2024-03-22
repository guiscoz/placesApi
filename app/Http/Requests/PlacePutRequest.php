<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlacePutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $allStates = [
            'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO',
            'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI',
            'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'
        ];

        $name = ['required', 'min:3', 'max:30'];
        $city = ['required', 'min:3', 'max:30'];
        $state = ['required', 'in:' . implode(',', $allStates)];

        return [
            'name' => $name,
            'city' => $city,
            'state' => $state
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The field "name" cannot be empty.',
            'name.min' => 'The "name" field must be at least 3 characters long.',
            'name.max' => 'The "name" field can have a maximum of 30 characters.',
            'city.required' => 'The field "city" cannot be empty',
            'city.min' => 'The "city" field must be at least 3 characters long.',
            'city.max' => 'The "city" field can have a maximum of 30 characters.',
            'state.required' => 'The field "state" cannot be empty',
            'state.in' => 'There is no state with this acronym in Brazil',
        ];
    }
}
