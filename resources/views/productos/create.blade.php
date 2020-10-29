@extends("../layouts.plantilla")

@section("cabecera")
	
	Insertar Registros

@endsection

@section("contenido")



	
	
	
	<form method="post" action="{{url('/productos')}}" enctype="multipart/form-data">
		<!--{!! Form::open(['url'=>'/productos','method'=>'post'])!!}-->
		
		<table>
		<tr>
		</tr>
		<td>
		<input name="examinar" type="file" />
		</td>
		</table>
		
	
		
		<table>
		
			<tr>
			<td>Nombre: </td>
			<td>
			
		
				<input type="text" name="NombreArticulo" >
		<!--añadimos un token para poder ingresar registros ya que Laravel está protegido-->
				{{csrf_field()}} 
			
			</td>
			<td NOWRAP>
			@foreach($errors->get('NombreArticulo') as $error)
		
				<li>{{$error}}</li>
			
			@endforeach
			
			</tr>
			
			
			<tr>
			<td>Sección: </td>
			<td>
	
				<input type="text" name="Seccion" >
		
				
			
			</td>
			<td NOWRAP>
			@foreach($errors->get('Seccion') as $error)
		
				<li>{{$error}}</li>
			
			@endforeach
			</tr>
			
			<tr>
			<td>Precio: </td>
			<td>
	
				<input type="text" name="Precio" >
		
			
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
	
				<input type="text" name="PaisOrigen" >
		
			
			</td>
			<td >
			@if($errors->has('PaisOrigen'))
			 {{'Este campo es requerido'}}
			@endif
			</td>
			
			</tr>
			
			<tr>
			<td>
			
				<input type="submit" class="btn btn-success" name="enviar" value="Enviar">
			</td>
			
			<td>
			
				<input type="reset" class="btn btn-Primary" name="borrar" value="Limpiar">
			</td>
			
			
			</table>
			<!--{!! Form::close()!!}-->		
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