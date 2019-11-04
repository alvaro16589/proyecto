<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticuloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //esta salida tiene por defecto el valor de false
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {  //'estado','nombre','descripcion','imagen','vencimiento','stok'
        return [
            'Nombre' => 'required',
            'Descripcion' => 'required',
            'Vencimiento' => 'required',
            'Cantidad' => 'required|max:200|min:0'
           
        ];
    }
}
