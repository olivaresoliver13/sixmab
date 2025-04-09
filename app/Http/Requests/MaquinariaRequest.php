<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaquinariaRequest extends FormRequest
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
        if ($this->route('maquinaria')) {
            return [
                'codigo' => 'required|max:100|min:1',
                'siglas' => 'required|max:15|min:1',
                'tipo_maquinaria_id' => 'required',
            ];
        } else {
            return [
                'codigo' => 'required|max:100|min:1|unique:maquinaria,codigo',
                'siglas' => 'required|max:15|min:1|unique:maquinaria,siglas',
                'tipo_maquinaria_id' => 'required',
            ];
        }   
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El código es requerido',
            'codigo.max' => 'El código debe tener como máximo 100 caracteres',
            'codigo.min' => 'El código debe tener como mánimo 1 caracteres',
            'codigo.unique' => 'El código ya se encuentra registrado',

            'siglas.required' => 'La sigla es requerido',
            'siglas.max' => 'La sigla debe tener como máximo 15 caracteres',
            'siglas.min' => 'La sigla debe tener como máximo 1 caracteres',
            'siglas.unique' => 'La sigla ya se encuentra registrado',

            'tipo_maquinaria_id.required' => 'El tipo de maquinaria es requerido',
        ];
    }
}
