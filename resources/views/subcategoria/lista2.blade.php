@extends('cabecera')

@section('contenido')
{{-- <form> --}}
<div class="form-control">
<div class="x_title">
  <h2>Sub-Categorias <small>Multiplaza</small></h2>
  <div class="clearfix"></div>
</div>
<a href="{{ route('subcategorias.create') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
	<table id="tablaSubcategoria" class="table table-striped  table-hover">
		<thead>
			<tr>
				<th> </th>
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
				{{-- <tr> --}}
        		<tr>
        			<td class="clickable" data-toggle="collapse" data-target="#group-of-rows-{{$subcategoria->id}}" aria-expanded="false" aria-controls="group-of-rows-{{$subcategoria->id}}"> <i class="fa fa-plus-circle"> </i></td>
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
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar{{$subcategoria->id}}"><i class="fa fa-trash"></i>  Eliminar</button>
  							<div class="modal fade" id="modalEliminar{{$subcategoria->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
							@include('modalEliminar-part')
		                </form>
					</td>
				</tr>
		<tbody id="group-of-rows-{{$subcategoria->id}}" class="collapse">
			<tr>
				<td></td>
				<td>
					<label for="accounting">Categorias</label>
				</td>
				<td colspan="5">
					<label for="accounting">Descripción</label>
				</td>
			</tr>
			@foreach ($subcategoria->categorias as $categoria)
		        <tr>
		        	{{-- <td></td> --}}
		            <td colspan="2">{{$categoria->nombre}}</td>
		            <td colspan="5">{{$categoria->descripcion}}</td>
		        </tr>
			@endforeach
	    </tbody>
			@endforeach
		</tbody>
	</table>
{{-- </form> --}}
</div>
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
		/* fix = code from bootstrap 3 */
		// tbody.collapse.in {
		//   display: table-row-group;
		// }
	} );
	
</script>
@endpush