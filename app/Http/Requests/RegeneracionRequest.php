<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegeneracionRequest extends FormRequest
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
            'gravedad_especifica' => 'required|max:80|min:0',
            'voltaje' => 'required|max:120|min:0',
            'temperatura' => 'required|max:50|min:-10',
            'corriente_ac_dc' => 'required|max:150|min:0',
            'hora' => 'required',
            'corriente' => 'required|max:150|min:1',
            'voltaje_corte' => 'required|max:150|min:1',
            'tiempo_descarga' => 'required',
            'capacidad' => 'required|max:1000|min:0',
            'eficiencia' => 'required|max:100|min:1',
            'cca_cold_cranking_ampere' => 'max:1000|min:1',
            'impedancia' => 'max:100|min:1',
        ];  
    }

    public function messages()
    {
        return [
            'gravedad_especifica.required' => 'La gravedad específica es requerida',
            'gravedad_especifica.max' => 'La gravedad específica debe tener como máximo 80 caracteres',
            'gravedad_especifica.min' => 'La gravedad específica debe tener como mínimo 0 caracter',

            'voltaje.required' => 'El voltaje es requerido',
            'voltaje.max' => 'El voltaje debe tener como máximo 15 caracteres',
            'voltaje.min' => 'El voltaje debe tener como mínimo 1 caracter',

            'temperatura.required' => 'La temperatura es requerida',
            'temperatura.max' => 'La temperatura debe tener como máximo 50 caracteres',
            'temperatura.min' => 'La temperatura debe tener como mínimo -10 caracteres',

            'corriente_ac_dc.required' => 'La corriente (ac/dc) es requerido',
            'corriente_ac_dc.max' => 'La corriente (ac/dc) debe tener como máximo 150 caracteres',
            'corriente_ac_dc.min' => 'La corriente (ac/dc) debe tener como mínimo 1 caracter',

            'hora.required' => 'LA hora es requerida',

            'corriente.required' => 'La corriente es requerida',
            'corriente.max' => 'La corriente debe tener como máximo 150 caracteres',
            'corriente.min' => 'La corriente debe tener como mínimo 0 caracter',

            'voltaje_corte.required' => 'El voltaje de corte es requerido',
            'voltaje_corte.max' => 'El voltaje de corte debe tener como máximo 150 caracteres',
            'voltaje_corte.min' => 'El voltaje de corte debe tener como mínimo 1 caracter',

            'tiempo_descarga.required' => 'El tiempo de descarga es requerido',

            'capacidad.required' => 'La capacidad es requerido',
            'capacidad.max' => 'La capacidad debe tener como máximo 1000 caracteres',
            'capacidad.min' => 'La capacidad debe tener como mínimo 0 caracter',

            'eficiencia.required' => 'La eficiencia es requerida',
            'eficiencia.max' => 'La eficiencia debe tener como máximo 100 caracteres',
            'eficiencia.min' => 'La eficiencia debe tener como mínimo 1 caracter',

            'cca_cold_cranking_ampere.max' => 'El cca-cold cranking ampere debe tener como máximo 1000 caracteres',
            'cca_cold_cranking_ampere.min' => 'El cca-cold cranking ampere debe tener como mínimo 1 caracter',

            'impedancia.max' => 'La impedancia debe tener como máximo 100 caracteres',
            'impedancia.min' => 'La impedancia debe tener como mínimo 1 caracter',
        ];
    }
}
