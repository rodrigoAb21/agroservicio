<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tecnico' => 'required|max:255',
            'empresa' => 'max:255',
            'telf1' => 'nullable|digits_between:7,8',
            'telf2' => 'nullable|digits_between:7,8',
        ];
    }

    public function messages()
    {
        return [
            'telf1.digits_between' => 'El Teléfono 1 debe contener entre 7 y 8 dígitos',
            'telf2.digits_between' => 'El Teléfono 2 debe contener entre 7 y 8 dígitos',
        ];
    }
}
