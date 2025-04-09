<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BateriaRequest extends FormRequest
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
        if ($this->route('bateria')) {
            return [
                'numero_bateria' => 'required|max:100|min:1',
                'siglas' => 'required|max:15|min:1',
                'tipo_bateria_id' => 'required',
                'cca_o_impedancia' => 'max:8',
                'composicion_quimica_id' => 'required',           
                'voltaje_nominal' => 'required|max:6|min:1',
                'capacidad_nominal' => 'required|max:8|min:1',
                'descarga_nominal' => 'required|max:8|min:1',
                'numero_serie' => 'required|max:50|min:1',
                'cantidad_celda' => 'required|max:24|min:1',
                'cantidad_temperatura' => 'required|max:10|min:1',
            ];
        } else {
            return [
                'numero_bateria' => 'required|max:100|min:1|unique:bateria,numero_bateria',
                'siglas' => 'required|max:15|min:1|unique:bateria,siglas',
                'tipo_bateria_id' => 'required',
                'cca_o_impedancia' => 'max:8',
                'composicion_quimica_id' => 'required',           
                'voltaje_nominal' => 'required|max:6|min:1',
                'capacidad_nominal' => 'required|max:8|min:1',
                'descarga_nominal' => 'required|max:8|min:1',
                'numero_serie' => 'required|max:50|min:1|unique:bateria,numero_serie',
                'cantidad_celda' => 'required|max:24|min:1',
                'cantidad_temperatura' => 'required|max:10|min:1',
            ];
        }   
    }

    public function messages()
    {
        return [
            'numero_bateria.required' => 'El número de la batería es requerido',
            'numero_bateria.max' => 'El número de la batería debe tener como máximo 100 caracteres',
            'numero_bateria.min' => 'El número de la batería debe tener como mínimo 1 caracter',
            'numero_bateria.unique' => 'El número de la batería ya se encuentra registrado',

            'siglas.required' => 'La sigla es requerido',
            'siglas.max' => 'La sigla debe tener como máximo 15 caracteres',
            'siglas.min' => 'La sigla debe tener como mínimo 1 caracter',
            'siglas.unique' => 'La sigla ya se encuentra registrado',

            'tipo_bateria_id.required' => 'El tipo de batería es requerido',
            
            'cca_o_impedancia.max' => 'El valor del tipo de batería debe tener como máximo 8 caracteres',

            'composicion_quimica_id.required' => 'El tipo de composición quimica es requerido',

            'voltaje_nominal.required' => 'El voltaje nominal es requerido',
            'voltaje_nominal.max' => 'El voltaje nominal debe tener como máximo 6 caracteres',
            'voltaje_nominal.min' => 'El voltaje nominal debe tener como mínimo 1 caracter',

            'capacidad_nominal.required' => 'La capacidad nominal es requerido',
            'capacidad_nominal.max' => 'La capacidad nominal debe tener como máximo 8 caracteres',
            'capacidad_nominal.min' => 'La capacidad nominal debe tener como mínimo 1 caracter',

            'descarga_nominal.required' => 'La descarga nominal es requerido',
            'descarga_nominal.max' => 'La descarga nominal debe tener como máximo 8 caracteres',
            'descarga_nominal.min' => 'La descarga nominal debe tener como mínimo 1 caracter',

            'numero_serie.required' => 'EL número de serie es requerido',
            'numero_serie.max' => 'EL número de serie debe tener como máximo 50 caracteres',
            'numero_serie.min' => 'EL número de serie debe tener como mínimo 1 caracter',
            'numero_serie.unique' => 'EL número de serie ya se encuentra registrado',

            'cantidad_temperatura.required' => 'La cantidad de temperatura es requerido',
            'cantidad_temperatura.max' => 'La cantidad de temperatura debe tener como máximo 10 caracteres',
            'cantidad_temperatura.min' => 'La cantidad de temperatura debe tener como mínimo 1 caracter',

            'cantidad_celda.required' => 'La cantidad de celdas es requerido',
            'cantidad_celda.max' => 'La cantidad de celdas debe tener como máximo 6 caracteres',
            'cantidad_celda.min' => 'La cantidad de celdas debe tener como mínimo 1 caracter',
        ];
    }
}
