<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalidaRequest extends FormRequest
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
            'fecha' => 'required|date',
            'nro_nota' => 'nullable|numeric|integer',
            'total' => 'required|numeric|min:1',
            'tipo' => 'required',
            'destinatario_id' => 'required',
            'idInsumoT' => 'required|array|min:1',
            'idInsumoT.*' => 'numeric|min:1',
            'cantidadT' => 'required|array',
            'cantidadT.*' => 'numeric',
            'precioT' => 'required|array',
            'precioT.*' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'destinatario_id.required' => 'Debe seleccionar a un destinatario.',
            'total.min' => 'El total no puede ser menor a 1.',
            'nro_nota.numeric' => 'El número de nota debe ser un número entero.',
            'nro_nota.integer' => 'El número de nota debe ser un número entero.',
            'idInsumoT.required' => 'Debe ingresar al menos un insumo.',
            'cantidadT.required' => 'Debe ingresar al menos una cantidad.',
            'precioT.required' => 'Debe ingresar al menos un precio.',
            'idInsumoT.*.numeric' => 'Seleccione un insumo válido.',
            'cantidadT.*.numeric' => 'La cantidad debe ser un número válido > 0.',
            'precioT.*.numeric' => 'El precio debe ser un número válido > 0.',
        ];
    }
}
