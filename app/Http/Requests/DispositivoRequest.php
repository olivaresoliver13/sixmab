<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispositivoRequest extends FormRequest
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
        if ($this->route('dispositivo')) {
            return [
                'identificador' => 'required|max:255|min:1',
                'voltaje_max' => 'required|max:99|min:0',
                'voltaje_min' => 'required|max:99|min:0',
                'corriente_max' => 'required|max:999|min:-999',
                'corriente_min' => 'required|max:999|min:-999',
                'temperatura_max' => 'required|max:99|min:0',
                'temperatura_min' => 'required|max:99|min:0',
            ];
        } else {
            return [
                'identificador' => 'required|max:255|min:1|unique:dispositivo,identificador',
                'voltaje_max' => 'max:99|min:0',
                'voltaje_min' => 'max:99|min:0',
                'corriente_max' => 'max:999|min:-999',
                'corriente_min' => 'max:999|min:-999',
                'temperatura_max' => 'max:99|min:0',
                'temperatura_min' => 'max:99|min:0',
            ];
        }   
    }

    public function messages()
    {
        return [
            'identificador.required' => 'El identificador es requerido',
            'identificador.max' => 'El identificador debe tener como máximo 255 caracteres',
            'identificador.min' => 'El identificador debe tener como mínimo 1 caracter',
            'identificador.unique' => 'El identificador ya se encuentra registrado',

            'voltaje_max.max' => 'Voltaje máximo debe tener como máximo 99 caracteres',
            'voltaje_max.min' => 'Voltaje máximo debe tener como mínimo 0 caracter',
            
            'voltaje_min.max' => 'Voltaje mínimo debe tener como máximo 99 caracteres',
            'voltaje_min.min' => 'Voltaje mínimo debe tener como mínimo 0 caracter',

            'corriente_max.max' => 'Corriente máximo debe tener como máximo 999 caracteres',
            'corriente_max.min' => 'Corriente máximo debe tener como mínimo -999 caracter',

            'corriente_min.max' => 'Corriente mínima debe tener como máximo 999 caracteres',
            'corriente_min.min' => 'Corriente mínima debe tener como mínimo -999 caracter',

            'temperatura_max.max' => 'Temperatura máxima debe tener como máximo 99 caracteres',
            'temperatura_max.min' => 'Temperatura máxima debe tener como mínimo 0 caracter',

            'temperatura_min.max' => 'Temperatura mínima debe tener como máximo 99 caracteres',
            'temperatura_min.min' => 'Temperatura mínima debe tener como mínimo 0 caracter',
        ];
    }
}