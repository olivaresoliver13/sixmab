<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoMaquinariaRequest extends FormRequest
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
        if ($this->route('tipo_maquinaria')) {
            return [
                'nombre' => 'required|max:50|min:1',
                'icono' => 'required|max:50|min:1',
            ];
        } else {
            return [
                'nombre' => 'required|max:50|min:1|unique:tipo_maquinaria,nombre',
                'icono' => 'required|max:50|min:1|unique:tipo_maquinaria,icono',
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

            'icono.required' => 'El icono es requerido',
            'icono.max' => 'El icono debe tener como máximo 50 caracteres',
            'icono.min' => 'El icono debe tener como mínimo 1 caracter',
            'icono.unique' => 'El icono ya se encuentra registrado',
        ];
    }
}