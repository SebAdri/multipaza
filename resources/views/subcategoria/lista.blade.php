@extends('cabecera')

@section('contenido')
{{-- <form> --}}
<div class="form-control">
<div class="x_title">
  <h2>Sub-Categorias</h2>
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
						<button class="btn btn-default btn-imagen" data-titulo="Imagen de la SubCategoria {{$subcategoria->nombre}}" data-imagen="{{ asset($subcategoria->imagen) }}">Ver Imagen</button>
					</td>
					<td>{{$subcategoria->estado == 1?"Activo":"Inactivo"}}</td>
					<td>
						{{-- <button class="btn btn-success detalles" data-titulo="SubCategoria {{$subcategoria->nombre}} esta asociada a las sgtes. categorias:" data-detalles="{{$subcategoria->categorias->pluck('nombre')}}"><i class='fa fa-list'></i> Detalles</button>--}}
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
			@endforeach
		</tbody>
	</table>
{{-- </form> --}}
@include('modalDetalle-part')
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
	} );
	
</script>
@endpush