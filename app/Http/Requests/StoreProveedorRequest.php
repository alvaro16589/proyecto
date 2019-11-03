<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
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
    {//['nombre','estado','celular','direccion']
        return [
            'Nombre' => 'required|max:50',
            'Telefono' => 'required|min:8|integer',
            'Direccion' => 'required|max:100'
        ];
    }
}
