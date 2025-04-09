<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
        if ($this->route('noticia')) {
            return [
                'titulo' => 'required|max:50|min:1',
                'entradilla' => 'required|max:500|min:1',
                'texto1' => 'required|max:500|min:1',
                'texto2' => 'max:500|min:1',
                'texto3' => 'max:500|min:1',
                'texto4' => 'max:500|min:1',
                'texto5' => 'max:500|min:1',
                'autor' => 'required|max:64|min:1',
                'link' => 'required|max:64|min:1',
            ];
        } else {
            return [
                'titulo' => 'required|max:50|min:1|unique:noticia,titulo',
                'entradilla' => 'required|max:500|min:1|unique:noticia,entradilla',
                'texto1' => 'required|max:500|min:1',
                'texto2' => 'max:500|min:1',
                'texto3' => 'max:500|min:1',
                'texto4' => 'max:500|min:1',
                'texto5' => 'max:500|min:1',
                'autor' => 'required|max:64|min:1',
                'link' => 'required|max:64|min:1',
            ];
        }   
    }
    public function messages()
    {
        return [
            'titulo.required' => 'El titulo es requerido',
            'titulo.max' => 'El titulo debe tener como máximo 50 caracteres',
            'titulo.min' => 'El titulo debe tener como mínimo 1 caracter',
            'titulo.unique' => 'El titulo ya se encuentra registrado',

            'entradilla.required' => 'La entradilla es requerida',
            'entradilla.max' => 'La entradilla debe tener como máximo 500 caracteres',
            'entradilla.min' => 'La entradilla debe tener como mínimo 1 caracter',
            'entradilla.unique' => 'La entradilla ya se encuentra registrado',

            'texto1.required' => 'El Primer párrafo es requerido',
            'texto1.max' => 'El Primer párrafo debe tener como máximo 500 caracteres',
            'texto1.min' => 'El Primer párrafo debe tener como mínimo 1 caracter',
            'texto1.unique' => 'El Primer párrafo ya se encuentra registrado',

            'texto2.required' => 'El Segundo párrafo es requerido',
            'texto2.max' => 'El Segundo párrafo debe tener como máximo 500 caracteres',
            'texto2.min' => 'El Segundo párrafo debe tener como mínimo 1 caracter',
            'texto2.unique' => 'El Segundo párrafo ya se encuentra registrado',

            'texto3.required' => 'El Tercer párrafo es requerido',
            'texto3.max' => 'El Tercer párrafo debe tener como máximo 500 caracteres',
            'texto3.min' => 'El Tercer párrafo debe tener como mínimo 1 caracter',
            'texto3.unique' => 'El Tercer párrafo ya se encuentra registrado',

            'texto4.required' => 'El Cuarto párrafo es requerido',
            'texto4.max' => 'El Cuarto párrafo debe tener como máximo 500 caracteres',
            'texto4.min' => 'El Cuarto párrafo debe tener como mínimo 1 caracter',
            'texto4.unique' => 'El Cuarto párrafo ya se encuentra registrado',
            
            'texto5.required' => 'El Quinto párrafo es requerido',
            'texto5.max' => 'El Quinto párrafo debe tener como máximo 500 caracteres',
            'texto5.min' => 'El Quinto párrafo debe tener como mínimo 1 caracter',
            'texto5.unique' => 'El Quinto párrafo ya se encuentra registrado',

            'autor.required' => 'El autor es requerido',
            'autor.max' => 'El autor debe tener como máximo 64 caracteres',
            'autor.min' => 'El autor debe tener como mínimo 1 caracter',
            'autor.unique' => 'El autor ya se encuentra registrado',

            'link.required' => 'El link es requerido',
            'link.max' => 'El link debe tener como máximo 64 caracteres',
            'link.min' => 'El link debe tener como mínimo 1 caracter',
            'link.unique' => 'El link ya se encuentra registrado',
        ];
    }
}
