<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SemillaRequest extends FormRequest
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
            'nombre' => 'required|max:255',
            'envase' => 'nullable|max:255',
            'info' => 'nullable|max:255',
            'subtipo_id' => 'required',
            'unidad_medida_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'subtipo_id.required' => 'Debe seleccionar un tipo.',
            'unidad_medida_id.required' => 'Debe seleccionar una unidad de medida',
            'info.max' => 'La información no debe contener más de 255 caracteres.',
        ];
    }
}
