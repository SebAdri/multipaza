@extends('cabecera')

@section('contenido')
<form>
{!! csrf_field() !!}
<div class="x_title">
  <h2>Sub-Categorias <small>Multiplaza</small></h2>
  <div class="clearfix"></div>
</div>
<a href="{{ route('subcategorias.create') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
	<table id="tablaSubcategoria" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Nombre</th>
				<th>Decripción</th>
				<th>Imagen</th>
				<th>Estado</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($subcategorias as $subcategoria)
				<tr>
					<td>{{$subcategoria->id}}</td>
					<td>{{$subcategoria->nombre}}</td>
					<td>{{$subcategoria->descripcion}}</td>
					<td>
						<img id="myImg" src="{{ asset($subcategoria->imagen) }}" alt="Snow" style="width:100%;max-width:300px">
					</td>
					<td>{{$subcategoria->estado == 1?"Activo":"Inactivo"}}</td>
					<td>
						<a class="btn btn-info" href="{{ route('subcategorias.edit', $subcategoria->id) }}"><i class="fa fa-edit"></i>  Editar</a>
		                <form style="display: inline" method="POST" action="{{ route('subcategorias.destroy', $subcategoria->id) }}">
		                    {!! csrf_field() !!}
		                    {!! method_field('DELETE') !!}
		                    <!-- Button trigger modal -->
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar"><i class="fa fa-trash"></i>  Eliminar</button>
		                    {{-- <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>  Eliminar</button> --}}
							@include('modalEliminar-part')
		                </form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</form>
@stop
@push('script')
<script type="text/javascript">
	$(document).ready( function () {
    	$("#tablaSubcategoria").DataTable({
				"aaSorting":[[0,"desc"]],
				
				language: {
                	"search": "Buscar:",
                	"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        			"infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
        			"lengthMenu":     "Mostrar _MENU_ registros",
        			"emptyTable": "No hay datos disponibles",
        			"paginate": {
            			"first": "Primero",
            			"last": "Último",
            			"next": "Siguiente",
            			"previous": "Anterior"
        			}
            	}
		});
	} );
	
</script>
@endpush