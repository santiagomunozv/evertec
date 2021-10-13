<?php

namespace Modules\General\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
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
            'code' => ['required', Rule::unique('product')->ignore($this->get('id'), 'id')],
            'name' => 'required',
            'price' => 'required',
        );
        return $validacion;
    }
    public function messages()
    {
        $mensaje = array();
        $mensaje["code.required"] =  "El Código del producto es obligatorio";
        $mensaje["code.unique"] =  "El Código del producto debe ser único";
        $mensaje["name.required"] =  "El campo Nombre es obligatorio";
        $mensaje["price.required"] =  "El campo Precio es obligatorio";

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
