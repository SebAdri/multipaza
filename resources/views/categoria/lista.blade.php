@extends('cabecera')

@section('contenido')
<form>
{!! csrf_field() !!}
<div class="x_title">
  <h2>Categorias <small>Multiplaza</small></h2>
  <div class="clearfix"></div>
</div>
<a href="{{ route('categorias.create') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
	<table id="tablaCategoria" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Imagen</th>
				{{-- <th>Estado</th> --}}
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($categorias as $categoria)
				<tr>
					<td>{{$categoria->id}}</td>
					<td>{{$categoria->nombre}}</td>
					<td>{{$categoria->descripcion}}</td>
					<td>
						<!-- Trigger the Modal -->
						<img id="myImg" src="{{ asset($categoria->imagen) }}" alt="Snow" style="width:100%;max-width:300px">
						{{-- <img src="{{ asset($categoria->imagen) }}" class="img-responsive img-rounded" alt="Responsive image"> --}}
					</td>
					{{-- <td>{{$categoria->estado == 1?"Activo":"Inactivo"}}</td> --}}
					<td>
						<a class="btn btn-info" href="{{ route('categorias.edit', $categoria->id) }}"><i class="fa fa-edit"></i>  Editar</a>
		                <form style="display: inline" method="POST" action="{{ route('categorias.destroy', $categoria->id) }}">
		                      {!! csrf_field() !!}
		                      {!! method_field('DELETE') !!}
		                      <button type="submit" class="btn btn-danger">Eliminar</button>
		                </form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</form>

<script type="text/javascript">
	function deleteCat(id) {
		if (confirm('Esta seguro que desea eliminar?')) {
			var formulario = document.createElement('form');
			var action = "{{ route('categorias.destroy', '?') }}";
			action = action.replace('?', id);
			formulario.setAttribute('method', 'POST');
			formulario.setAttribute('action', action);

			var csrf = document.createElement('div');
			csrf.innerHtml = '{{ csrf_field() }}'.trim();
			var method = document.createElement('div');
			method.innerHtml = '{{ method_field('DELETE')}}'.trim();

			formulario.appendChild(csrf);
			formulario.appendChild(method);
			formulario.submit();
		}
	}
</script>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
@stop
@push('script')
<script type="text/javascript">
	$(document).ready( function () {
    	$("#tablaCategoria").DataTable({
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