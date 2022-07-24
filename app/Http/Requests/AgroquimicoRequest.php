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
            'ingrediente_activoT' => 'nullable|array',
            'ingrediente_activoT.*' => 'max:255',
            'concentracionT' => 'nullable|array',
            'concentracionT.*' => 'max:255',
        ];
    }

    public function messages()
    {
        return [
            'subtipo_id.required' => 'Debe seleccionar un tipo.',
            'unidad_medida_id.required' => 'Debe seleccionar una unidad de medida',
            'info.max' => 'La información no debe contener más de 255 caracteres.',
            'ingrediente_activoT.*.max' => 'El ingrediente activo no debe contener más de 255 caracteres.',
            'concentracionT.*.max' => 'La concentración no debe contener más de 255 caracteres.',
        ];
    }
}
