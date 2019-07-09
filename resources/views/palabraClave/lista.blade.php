@extends('cabecera')

@section('contenido')
<form>
{!! csrf_field() !!}
<div class="x_title">
  <h2>Palabras Claves <small>Multiplaza</small></h2>
  <div class="clearfix"></div>
</div>
<a href="{{ route('palabrasClaves.create') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
	<table id="tablaPalabraCalve" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Palabra</th>
				<th>Locales</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($palabras as $palabra)
				<tr>
					<td>{{$palabra->id}}</td>
					<td>{{$palabra->palabras}}</td>
					<td>
						@foreach ($palabra->locales as $local)
							<ul class="list-group">
							  <li class="list-group-item">{{$local->nombre}}</li>
							</ul>
						@endforeach
					</td>
					<td>
						<a class="btn btn-info" href="{{ route('palabrasClaves.edit', $palabra->id) }}"><i class="fa fa-edit"></i>  Editar</a>
		                <form style="display: inline" method="POST" action="{{ route('palabrasClaves.destroy', $palabra->id) }}">
		                      {!! csrf_field() !!}
		                      {!! method_field('DELETE') !!}
		                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>  Eliminar</button>
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
    	$("#tablaPalabraCalve").DataTable({
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