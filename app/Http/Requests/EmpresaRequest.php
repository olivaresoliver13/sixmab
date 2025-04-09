<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
        if ($this->route('empresa')) {
            return [
                'nombre' => 'required|max:100|min:1',
                'siglas' => 'required|max:15|min:1',
                'email' => 'required|max:50|min:1',
                'direccion' => 'required|max:500|min:1',
                'pais_id' => 'required',
                'identificador' => 'required|max:20|min:1',
                'telefono1' => 'required|max:20|min:1',
            ];
        } else {
            return [
                'nombre' => 'required|max:100|min:1|unique:empresa,nombre',
                'siglas' => 'required|max:15|min:1|unique:empresa,siglas',
                'email' => 'required|max:50|min:1|unique:empresa,email',
                'direccion' => 'required|max:500|min:1',
                'pais_id' => 'required',
                'identificador' => 'required|max:20|min:1|unique:empresa,identificador',
                'telefono1' => 'required|max:20|min:1',
            ];
        }   
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'nombre.max' => 'El nombre debe tener como máximo 100 caracteres',
            'nombre.min' => 'El nombre debe tener como mínimo 1 caracter',
            'nombre.unique' => 'El nombre ya se encuentra registrado',

            'siglas.required' => 'La sigla es requerido',
            'siglas.max' => 'La sigla debe tener como máximo 15 caracteres',
            'siglas.min' => 'La sigla debe tener como mínimo 1 caracter',
            'siglas.unique' => 'La sigla ya se encuentra registrado',

            'email.required' => 'El email es requerido',
            'email.max' => 'El email debe tener como máximo 50 caracteres',
            'email.min' => 'El email debe tener como mínimo 1 caracter',
            'email.unique' => 'El email ya se encuentra registrado',

            'direccion.required' => 'La dirección es requerido',
            'direccion.max' => 'La dirección debe tener como máximo 500 caracteres',
            'direccion.min' => 'La dirección debe tener como mínimo 1 caracter',

            'pais_id.required' => 'El país es requerido',

            'identificador.required' => 'El identificador es requerido (Debe seleccionar el país para que se pueda mostrar)',
            'identificador.max' => 'El identificador debe tener como máximo 20 caracteres',
            'identificador.min' => 'El identificador debe tener como mínimo 1 caracter',
            'identificador.unique' => 'El identificador ya se encuentra registrado',

            'telefono1.required' => 'El teléfono es requerido (Debe seleccionar el país para que se pueda mostrar)',
            'telefono1.max' => 'El teléfono debe tener como máximo 20 caracteres',
            'telefono1.min' => 'El teléfono debe tener como mínimo 1 caracter',
        ];
    }
}