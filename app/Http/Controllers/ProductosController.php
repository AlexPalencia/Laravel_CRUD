<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

use Carbon\Carbon;

// se importa el modelo
use App\Producto;


//se importa la clase para validar campos del formulario
use App\Http\Requests\CreaetProductosRequest;
use App\Http\Requests\EditProductosRequest;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       	//$productos=Producto::all();
		$productos=Producto::paginate(5);
		// capturar la fecha
		$fecha = Carbon::now();
		return view('productos.index',compact("productos","fecha"));
		 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	// capturar la fecha
		$fecha = Carbon::now();
        return view("productos.create",compact('fecha'));
		
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
	 
	 
    //public function store(Request $request)
	
	
	//creamos la clase CreateProductosRequest para validar en varios formularios y la pasamos 
	//como paramétro a la función 
	public function store(CreaetProductosRequest $request)
    {
       //return view("productos.insert");
	   
	   //validamos los campos del formulario especificando el tipo de validación
	   /* $this->validate(request(), ['Seccion'=>'required', 'Precio'=>'required',
									'NombreArticulo'=>'required', 'PaisOrigen'=>'required']);
		 */						  
	   
	   /* $producto=new Producto;
	   
	   $producto->NombreArticulo=$request->NombreArticulo;
	   $producto->Seccion=$request->Seccion;
	   $producto->Precio=$request->Precio;
	   $producto->PaisOrigen=$request->PaisOrigen;
	   
	   $producto->save(); */
	   
	   
	   
	   
	   $entrada=$request->all();
	   
	   if($archivo=$request->file('examinar')){
		   
		   $nombre=$archivo->getClientOriginalName();
		   
		   $archivo->move('images', $nombre);
		   
		   $entrada['ruta']=$nombre;
		   
	   }
	   
	   Producto::create($entrada);
	   
	   
	   
	   
	   //redireccionamos al index
	   return redirect("/productos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		// capturar la fecha
		$fecha = Carbon::now();

		$productos=Producto::findOrFail($id);
		$producto= \View::make('productos.show', compact("productos","fecha"))->render();
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($producto);
		return $pdf->stream();
		
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$productos=Producto::findOrFail($id);
		
		// capturar la fecha
		$fecha = Carbon::now();
		return view('productos.edit',compact('productos','fecha'));
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {

    	//creamos la clase EditProductosRequest para validar en varios formularios y la pasamos 
	//como paramétro a la función 
	public function update(EditProductosRequest $request, $id)
    {
        //return view("productos.update");
		
		$productos=Producto::findOrFail($id);
		
		//usamos fill para llenar los campos del modelo pero aún no se guardan porque hay operaciones por realizar
		$imagen=$productos->fill($request->all());
		if($archivo=$request->file('examinar')){
			
			//verificamos si hay una imagen 
			if($request->hasFile('examinar')){
				//borramos la imagen de la carpeta public	
				\File::delete(public_path('images/'.$productos->ruta));
				
			}
		   
		   $nombre=$archivo->getClientOriginalName();
		   
		   $archivo->move('images', $nombre);
		   
		   $imagen['ruta']=$nombre;
		   
	   } 
		
		$productos->update($request->all($imagen));
		//print_r($_POST);
		return redirect("/productos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return view("productos.delete");
		$productos=Producto::findOrFail($id);
		
		$productos->delete();
		
		return redirect("/productos");
    }
}
