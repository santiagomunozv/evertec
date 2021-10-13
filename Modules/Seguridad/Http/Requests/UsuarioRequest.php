<?php

namespace Modules\Seguridad\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * 
     */
    public function rules()
    {
        $validacion = array(
            'login' => ['required', Rule::unique('users')->ignore($this->get('id'), 'id')],
            'password' => 'required',
            'role_id' => 'required',
        );
        return $validacion;
    }
    public function messages()
    {
        $mensaje = array();
        $mensaje["login.required"] =  "El Nombre de usuario es obligatorio";
        $mensaje["login.unique"] =  "El Nombre de usuario debe ser único";
        $mensaje["password.required"] =  "El campo Contraseña es obligatorio";

        return $mensaje;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
