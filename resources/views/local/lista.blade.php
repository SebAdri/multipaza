@extends('cabecera')

@section('contenido')
<form>
{!! csrf_field() !!}
<div class="x_title">
  <h2>Locales <small>Multiplaza</small></h2>
  <div class="clearfix"></div>
</div>
<a href="{{ route('locales.create') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
	<table id="tablaLista" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Nombre</th>
				<th>Decripción</th>
				<th>Foto Principal</th>
				<th>Foto Ubicación</th>
				<th>Estado</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($locales as $local)
				<tr>
					<td>{{$local->id}}</td>
					<td>{{$local->nombre}}</td>
					<td>{{$local->ubicacion}}</td>
					<td>
						<img id="myImg" src="{{ asset($local->foto_principal) }}" alt="Snow" style="width:100%;max-width:300px">
					</td>
					<td>
						<img id="myImg" src="{{ asset($local->foto_ubicacion) }}" alt="Snow" style="width:100%;max-width:300px">
					</td>
					<td>{{$local->estado == 1?"Activo":"Inactivo"}}</td>
					<td>
						<a class="btn btn-info" href="{{ route('locales.edit', $local->id) }}"><i class="fa fa-edit"></i>  Editar</a>
		                <form style="display: inline" method="POST" action="{{ route('locales.destroy', $local->id) }}">
		                    {!! csrf_field() !!}
		                    {!! method_field('DELETE') !!}
		                    {{-- <button type="submit" class="btn btn-danger">Eliminar</button> --}}
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
    	$("#tablaLista").DataTable({
				"aaSorting":[[0,"asc"]],
				
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