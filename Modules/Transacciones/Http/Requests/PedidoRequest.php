<?php

namespace Modules\Transacciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
            'document_type' => 'required|string',
            'document_number' => 'required|numeric',
            'customer_name' => 'required|string',
            'customer_last_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_mobile' => 'required|numeric',
        );
        return $validacion;
    }
    public function messages()
    {
        $mensaje = array();
        $mensaje["product_id.required"] =  "El campo Producto es obligatorio";
        $mensaje["price.required"] =  "El campo Precio es obligatorio";
        $mensaje["document_type.required"] =  "El campo Tipo de documento es obligatorio";
        $mensaje["document_number.required"] =  "El campo Documento es obligatorio";
        $mensaje["customer_name.required"] =  "El campo Nombre es obligatorio";
        $mensaje["customer_last_name.required"] =  "El campo Apellido es obligatorio";
        $mensaje["customer_email.required"] =  "El campo Correo es obligatorio";
        $mensaje["customer_email.email"] =  "El campo Correo no tiene un formato válido";
        $mensaje["customer_mobile.required"] =  "El campo Teléfono es obligatorio";

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
