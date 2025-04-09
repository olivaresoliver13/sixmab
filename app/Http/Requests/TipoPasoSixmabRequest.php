<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoPasoSixmabRequest extends FormRequest
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
        if ($this->route('tipo_pasosixmab')) {
            return [
                'nombre' => 'required|max:50|min:1',
                'descripcion' => 'required|max:500|min:1',
                'orden' => 'required|max:10|min:1',
            ];
        } else {
            return [
                'nombre' => 'required|max:50|min:1|unique:tipo_paso_sixmab,nombre',
                'descripcion' => 'required|max:500|min:1|unique:tipo_paso_sixmab,descripcion',
                'orden' => 'required|max:10|min:1|unique:tipo_paso_sixmab,orden',
            ];
        }   
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'nombre.max' => 'El nombre debe tener como máximo 50 caracteres',
            'nombre.min' => 'El nombre debe tener como mínimo 1 caracter',
            'nombre.unique' => 'El nombre ya se encuentra registrado',

            'descripcion.required' => 'La descripción es requerido',
            'descripcion.max' => 'La descripción debe tener como máximo 500 caracteres',
            'descripcion.min' => 'La descripción debe tener como mínimo 1 caracter',
            'descripcion.unique' => 'La descripción ya se encuentra registrada',

            'orden.required' => 'El orden es requerido',
            'orden.max' => 'El orden debe tener como máximo 10 caracteres',
            'orden.min' => 'El orden debe tener como mínimo 1 caracter',
            'orden.unique' => 'El orden ya se encuentra registrado',
        ];
    }
}