<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //con eso se habilita la modificación de los registros de la base de datos
	//para evitar el error de MassAsignement
	
	protected $fillable=["NombreArticulo", "Seccion", "Precio", "PaisOrigen", "ruta"];
}
