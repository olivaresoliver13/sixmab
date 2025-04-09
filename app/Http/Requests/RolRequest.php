<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest
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
        if ($this->route('role')) {
            return [
                'name' => 'required|max:50|min:1',
                'slug' => 'min:1|max:50|required',
                'description' => 'required|max:500|min:1',
            ];
        } else {
            return [
                'name' => 'required|max:50|min:1|unique:roles,name',
                'slug' => 'required|min:1|max:50|unique:roles,slug',
                'description' => 'required|max:500|min:1',
            ];
        }   
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El nombre debe tener como máximo 50 caracteres',
            'name.min' => 'El nombre debe tener como mínimo 1 carácter',
            'name.unique' => 'El nombre ya se encuentra registrado',

            'slug.required' => 'El slug es requerido',
            'slug.max' => 'El slug debe tener como máximo 50 caracteres',
            'slug.min' => 'El slug debe tener como mínimo 1 carácter',
            'slug.unique' => 'El slug ya se encuentra registrado',

            'description.required' => 'La descripción es requerida',
            'description.max' => 'La descripción debe tener como máximo 500 caracteres',
            'description.min' => 'La descripción debe tener como mínimo 1 carácter',
        ];
    }
}
