@extends("../layouts.plantilla")

@section("cabecera")
	
	Leer Registros

@endsection

@section("contenido")
<form>
	<table class="table" border=1>
	<tr>
		<td>Nombre del artículo</td>
		<td>Precio</td>
		<td>País de Origen</td>
		<td>Imagen</td>
	</tr>
	@foreach($productos as $producto)
		<tr> 
		<td><a href="{{route('productos.edit', $producto->id)}}">{{$producto->NombreArticulo}}</a></td>
		<td>{{$producto->Precio}}</td>
		<td>{{$producto->PaisOrigen}}</td>
		<td><img src="{{url('/images/'.$producto->ruta)}}" class="imagen"/></td>
		
		<td><a href="{{route('productos.show', $producto->id)}}">Generar PDF</a>
		</tr>
		
	@endforeach
	</table>
<!--paginación-->	
{{ $productos->links() }}	
	<a href="{{route('productos.create')}}" class="btn btn-link">Añadir un nuevo registro</a>
	
</form>
@endsection
	
	@section("pie")
	
	@endsection