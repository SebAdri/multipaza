@extends('cabecera')

@section('contenido')
{{-- <form> --}}
<div class="form-control">
<div class="x_title">
  <h2>Usuarios</h2>
  <div class="clearfix"></div>
</div>
<a href="{{ route('usuarios.create') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
	<table id="tablaRol" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Nombre</th>
				<th>Rol</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $usuario)
				<tr>
					<td>{{$usuario->id}}</td>
					<td>{{$usuario->name}}</td>
					<td>{{$usuario->roles->first()['name']}}</td>
					{{-- <td>
						@foreach ($usuario->permissions as $permiso)
							{{$permiso}}
						@endforeach
					</td> --}}
					<td>
						<a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fa fa-edit"></i>  Editar</a>
		                <form style="display: inline" method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
		                    {!! csrf_field() !!}
		                    {!! method_field('DELETE') !!}
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar{{$usuario->id}}"><i class="fa fa-trash"></i>  Eliminar</button>
  							<div class="modal fade" id="modalEliminar{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
							@include('modalEliminar-part')
		                </form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
{{-- </form> --}}
</div>
@stop
@push('script')
<script type="text/javascript">
	$(document).ready( function () {
    	$("#tablaRol").DataTable({
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