@extends('cabecera')

@section('contenido')
{{-- <form> --}}
<div class="form-control">
<div class="x_title">
  <h2>Palabras Claves</h2>
  <div class="clearfix"></div>
</div>
<a href="{{ route('palabrasClaves.create') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
	<table id="tablaPalabraCalve" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Palabra</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($palabras as $palabra)
				<tr>
					<td>{{$palabra->id}}</td>
					<td>{{$palabra->palabras}}</td>
					<td>
						<button class="btn btn-success detalles" data-titulo="Palabra {{$palabra->palabras}} asociada a los sgtes. locales:" data-detalles="{{$palabra->locales->pluck('nombre')}}"><i class='fa fa-list'></i> Detalles</button>
						<a class="btn btn-info" href="{{ route('palabrasClaves.edit', $palabra->id) }}"><i class="fa fa-edit"></i>  Editar</a>
		                <form style="display: inline" method="POST" action="{{ route('palabrasClaves.destroy', $palabra->id) }}">
		                	{!! csrf_field() !!}
		                    {!! method_field('DELETE') !!}
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar{{$palabra->id}}"><i class="fa fa-trash"></i>  Eliminar</button>
  							<div class="modal fade" id="modalEliminar{{$palabra->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
							@include('modalEliminar-part')
		                </form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
{{-- </form> --}}
@include('modalDetalle-part')
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