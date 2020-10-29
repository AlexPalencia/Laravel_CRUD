@extends("../layouts.plantilla")

@section("cabecera")
	
	Editar Registros

@endsection

@section("contenido")

	<form method="post" action="{{url('/productos', $productos->id)}}" enctype="multipart/form-data">
	
		<table class="table">
		
			<tr>
			<td>Nombre: </td>
			<td>
	
				<input type="text" name="NombreArticulo" value="{{$productos->NombreArticulo}}">
		<!-- añadimos un token para poder ingresar registros ya que Laravel está protegido contra la manipulación de datos-->
				{{csrf_field()}} 
				
				
				<!--editamos el registro por PUT-->
				<input type="hidden" name="_method" value="PUT">
			
			</td>
			<td NOWRAP>
				@foreach($errors->get('NombreArticulo') as $error)
			
					<li>{{$error}}</li>
				
				@endforeach
			</tr>
			
			<tr>
			<td>Sección: </td>
			<td>
	
				<input type="text" name="Seccion" value="{{$productos->Seccion}}">
		
				
			
			</td>
			<td NOWRAP>
				@foreach($errors->get('Seccion') as $error)
			
					<li>{{$error}}</li>
				
				@endforeach
			</tr>
			
			<tr>
			<td>Precio: </td>
			<td>
	
				<input type="text" name="Precio" value="{{$productos->Precio}}">
		
			
			</td>
			<td NOWRAP>
				@foreach($errors->get('Precio') as $error)
			
					<li>{{$error}}</li>
				
				@endforeach
			</td>
			</tr>
			
			<tr>
			<td>PaisOrigen: </td>
			<td>
	
				<input type="text" name="PaisOrigen" value="{{$productos->PaisOrigen}}">
		
			
			</td>
			<td >
				@if($errors->has('PaisOrigen'))
				 {{'Este campo es requerido'}}
				@endif
			</td>
			</tr>
			
			
			<tr>
			<td>Imagen: </td>
			<td>
	
				<img src="{{url('/images/'.$productos->ruta)}}" class="imagen"/>
				<input name="examinar" type="file" />
				<!--<div class="custom-file mb-3">
				  <input type="file" class="custom-file-input" id="customFile" name="examinar">
				  <label class="custom-file-label" for="customFile">Cambiar Imagen</label>
				</div>-->
					
				
			
			</td>
			</tr>
			
			
			<tr>
			<td>
			
				<input type="submit" class="btn btn-info" name="enviar" value="Actualizar">
				
			</td>
			
			<!--<td>
			
				<input type="reset" name="borrar" value="Limpiar">
			</td>-->
			
			
			
			
	</form>
	
	
	<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
 	
	<form method="post" action="{{url('/productos', $productos->id)}}">
	{{csrf_field()}} 
			<td>
				<!--borramos el registro-->
				<input type="hidden" name="_method" value="DELETE"> 
				
				<input type="submit" class="btn btn-danger" name="eliminar" value="Eliminar registro">
			</td>	
				</table>
	</form>
	
	<!-- contamos los errores si algún campo queda vacío y los muestra-->
	@if(count($errors)>0)
	<ul class="alert alert-danger">	
		@foreach($errors->all() as $error)
		
		<li>{{$error}}</li>
		
		@endforeach
	</ul>
	
	
	@endif
	

	@endsection
	
	@section("pie")
	
	@endsection