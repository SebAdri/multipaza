@extends('cabecera')

@section('contenido')
<form>
{!! csrf_field() !!}
<div class="x_title">
  <h2>Configuración</h2>
  <div class="clearfix"></div>
</div>
@if (App\Configuracion::count()>0)
	<a href="{{ route('configuraciones.index') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
@else
	<a href="{{ route('configuraciones.create') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
@endif
	<table id="tablaConfiguracion" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Saludo</th>
				<th>Foto Principal</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@isset ($configuracion)
				<tr>
					<td>{{$configuracion->id}}</td>
					<td>{{$configuracion->saludo_inicial}}</td>
					<td>
						<img id="myImg" src="{{ asset($configuracion->fondo_principal) }}" alt="Snow" style="width:100%;max-width:300px">
					</td>
					<td>
						<a class="btn btn-info" href="{{ route('configuraciones.edit', $configuracion->id) }}"><i class="fa fa-edit"></i>  Editar</a>
		                {{-- <form style="display: inline" method="POST" action="{{ route('configuraciones.destroy', $configuracion->id) }}">
		                      {!! csrf_field() !!}
		                      {!! method_field('DELETE') !!}
		                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>  Eliminar</button>
		                </form> --}}
					</td>
				</tr>
			@endisset
		</tbody>
	</table>
</form>
@stop
@push('script')
<script type="text/javascript">
	$(document).ready( function () {
    	$("#tablaConfiguracion").DataTable({
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