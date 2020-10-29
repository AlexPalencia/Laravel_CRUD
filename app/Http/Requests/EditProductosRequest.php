<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //cambiamos el valor de false a true para que se pueda autorizar la función
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             //array clave:valor para la validación de los campos
            'NombreArticulo'=>'required|alpha','Seccion'=>'required|alpha',
            'Precio'=>'required|numeric', 'PaisOrigen'=>'required|alpha',
            'examinar' => 'image'
            
        ];
    }

    public function messages()
    {
        return [
            'NombreArticulo.required' => ':attribute es requerido para la actualización',
            'Precio.required'  => ':attribute es requerido para la actualización',
            'Seccion.required'  => ':attribute es requerido para la actualización',
            'PaisOrigen.required'  => ':attribute es requerido para la actualización',
            'examinar'  => ':attribute debe ser una imagen',
        ];
    }
}
