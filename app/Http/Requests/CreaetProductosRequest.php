<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreaetProductosRequest extends FormRequest
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
			'examinar' => 'required|image'
			
        ];
    }
	
	
	public function messages()
	{
		return [
			'NombreArticulo.required' => ':attribute es requerido',
			'Precio.required'  => ':attribute es requerido',
			'Seccion.required'  => ':attribute es requerido',
			'PaisOrigen.required'  => ':attribute es requerido',
			'examinar.required'  => 'Debe seleccionar una imagen',
		];
	}
}
