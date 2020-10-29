@extends("../layouts.plantilla")

@section("cabecera")
	
	Reporte del registro

@endsection

@section("contenido")

	<form>
	<table class="table" border=1>
	<tr>
		<td>Nombre del artículo</td>
		<td>Precio</td>
		<td>País de Origen</td>
		
	</tr>
	
		<tr> 
		<td>{{$productos->NombreArticulo}}</a></td>
		<td>{{$productos->Precio}}</td>
		<td>{{$productos->PaisOrigen}}</td>
		
		
		
		</tr>
		

	</table>
	<center><img src="{{url('/images/'.$productos->ruta)}}" class=""/></center>
	</form>

@endsection
	
	@section("pie")
	
	@endsection