<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgroquimicoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'envase' => 'max:255',
            'info' => 'max:255',
            'subtipo_id' => 'required',
            'unidad_medida_id' => 'required',
            'ingrediente_activoT' => 'array',
            'ingrediente_activoT.*' => 'max:255',
            'concentracionT' => 'array',
            'concentracionT.*' => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'subtipo_id.required' => 'Debe seleccionar un tipo.',
            'unidad_medida_id.required' => 'Debe seleccionar una unidad de medida',
            'ingrediente_activoT.*.max' => 'El ingrediente activo no debe contener más de 255 caracteres.',
        ];
    }
}
