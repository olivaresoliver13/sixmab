<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        if ($this->route('usuario')) {
            return [
                'name' => 'required|max:50|min:1',
                'email' => 'min:1|max:50|required_with:email_confirmation|same:email_confirmation',
                'email_confirmation' => 'max:50|min:1',
                'password' => 'nullable|min:8|max:100|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'nullable|max:20|min:8',
                'status' => 'required',
                'privilege' => 'required',
                'role_id' => 'required',
                'empresa_id' => 'required',
            ];
        } else {
            return [
                'name' => 'required|max:50|min:1|unique:users,name',
                'email' => 'min:1|max:50|required_with:email_confirmation|same:email_confirmation|unique:users,email',
                'email_confirmation' => 'max:50|min:1',
                'password' => 'nullable|min:8|max:100|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'nullable|max:20|min:8',
                'status' => 'required',
                'privilege' => 'required',
                'role_id' => 'required',
                'empresa_id' => 'required',
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

            'email.required' => 'El email es requerido',
            'email.max' => 'El email debe tener como máximo 50 caracteres',
            'email.min' => 'El email debe tener como mínimo 1 carácter',
            'email.unique' => 'El email ya se encuentra registrado',
            'email.same' => 'El email y la confirmación deben coincidir',

            'email_verified_at.max' => 'La confirmación del email debe tener como máximo 20 caracteres',
            'email_verified_at.min' => 'La confirmación del email debe tener como mínimo 8 carácter',

            'password.required' => 'La contraseña es requerido',
            'password.max' => 'La contraseña debe tener como máximo 100 caracteres',
            'password.min' => 'La contraseña debe tener como mínimo 8 carácter',
            'password.unique' => 'El email ya se encuentra registrado',
            'password.same' => 'La contraseña y la confirmación deben coincidir',

            'password_confirmation.max' => 'La confirmación del password debe tener como máximo 20 caracteres',
            'password_confirmation.min' => 'La confirmación del password debe tener como mínimo 8 carácter',

            'status.required' => 'El estado es requerido',

            'privilege.required' => 'El privilegio es requerido',

            'role_id.required' => 'El rol es requerido',

            'empresa_id.required' => 'La empresa es requerida',
        ];
    }
}