<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevantamientoRequest extends FormRequest
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
        if ($this->route('levantamiento')) {
            return [
                'fecha_compra' => 'required|max:4|min:4',
                'fecha' => 'required|max:10|min:10',
                'nota' => 'max:500',
                'puente_defectuoso_oxidado' => 'required|max:500|min:1',
                'polo_levantado' => 'required',
                'oxidacion_fuerte' => 'required',
                'otro' => 'max:500',
                'tipo_trabajo_id' => 'required',
                'tipo_cuidado_id' => 'required',
                'vaso_cambiado_id' => 'required',
                'dano_fisico_id' => 'required',
                'fuga_id' => 'required',
                'desbordamiento_acido_id' => 'required',
                'nivel_bajo_electrolito_id' => 'required',
            ];
        } else {
            return [
                'bateria_id' => 'unique:levantamiento,bateria_id',
            ];
        }   
    }

    public function messages()
    {
        return [
            'fecha_compra.required' => 'La fecha de la compra es requerido',
            'fecha_compra.max' => 'La fecha de la compra debe tener como máximo 4 caracteres',
            'fecha_compra.min' => 'La fecha de la compra debe tener como mínimo 4 caracteres',

            'fecha.required' => 'La fecha es requerido',
            'fecha.max' => 'La fecha debe tener como máximo 10 caracteres',
            'fecha.min' => 'La fecha debe tener como mínimo 10 caracteres',

            'nota.max' => 'La nota debe tener como máximo 500 caracteres',

            'puente_defectuoso_oxidado.required' => 'El puente defectuoso/oxidado es requerido',
            'puente_defectuoso_oxidado.max' => 'El puente defectuoso/oxidado debe tener como máximo 500 caracteres',
            'puente_defectuoso_oxidado.min' => 'El puente defectuoso/oxidado debe tener como mínimo 1 caracter',

            'polo_levantado.required' => 'El polo levantado es requerido',
            'polo_levantado.max' => 'El polo levantado debe tener como máximo 500 caracteres',
            'polo_levantado.min' => 'El polo levantado debe tener como mínimo 1 caracter',

            'oxidacion_fuerte.required' => 'La oxidación fuerte es requerido',
            'oxidacion_fuerte.max' => 'La oxidación fuerte debe tener como máximo 500 caracteres',
            'oxidacion_fuerte.min' => 'La oxidación fuerte debe tener como mínimo 1 caracter',
            
            'otro.max' => 'El campo otro debe tener como máximo 500 caracteres',

            'tipo_trabajo_id.required' => 'El tipo de trabajo es requerido',

            'tipo_cuidado_id.required' => 'El tipo de cuidado es requerido',

            'vaso_cambiado_id.required' => 'Los vasos cambiados es requerido',

            'dano_fisico_id.required' => 'El daño físico es requerido',

            'fuga_id.required' => 'La fuga es requerido',

            'desbordamiento_acido_id.required' => 'El desbordamiento de ácido es requerido',

            'nivel_bajo_electrolito_id.required' => 'El nivel bajo electrólito es requerido',

            'bateria_id.unique' => 'El identificador de la batería ya se encuentra registrado',
        ];
    }
}