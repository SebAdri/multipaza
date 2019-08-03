@extends('cabecera')

@section('contenido')
{{-- <form> --}}
<div class="form-control">
<div class="x_title">
  <h2>Locales</h2>
  <div class="clearfix"></div>
</div>
<a href="{{ route('locales.create') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
	<table id="tablaLista" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Nombre</th>
				<th>Descripción</th>
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
						<button class="btn btn-default btn-imagen" data-titulo="Imagen del local" data-imagen="{{ asset($local->foto_principal) }}">Ver Imagen</button>
					</td>
					<td>
						<button class="btn btn-default btn-imagen" data-titulo="Imagen de la ubicación" data-imagen="{{ asset($local->foto_ubicacion) }}">Ver Imagen</button>
					</td>
					<td>{{$local->estado == 1?"Activo":"Inactivo"}}</td>
					<td>
						<button class="btn btn-success detalles-locales" data-titulo="Detalles de {{$local->nombre}}." data-detalles="{{$local->subcategorias->pluck('nombre')}}" data-palabras="{{$local->palabrasClaves->pluck('palabras')}}"><i class='fa fa-list'></i> Detalles</button>
						<a class="btn btn-info" href="{{ route('locales.edit', $local->id) }}"><i class="fa fa-edit"></i>  Editar</a>
		                <form style="display: inline" method="POST" action="{{ route('locales.destroy', $local->id) }}">
		                    {!! csrf_field() !!}
		                    {!! method_field('DELETE') !!}
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar{{$local->id}}"><i class="fa fa-trash"></i>  Eliminar</button>
  							<div class="modal fade" id="modalEliminar{{$local->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
							@include('modalEliminar-part')
		                </form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
{{-- </form> --}}
</div>
@include('modalDetalle-part')
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
		$(".detalles-locales").click(function(){
	      var detalles = ($(this).data('detalles'));
	      $(".modal-title").text($(this).data('titulo'));
	      $(".modal-content").addClass("panel-success");
	      $(".div-detalles").append("<div class='col-sm-12'><label>SUB-CATEGORIAS</label></div>");
	      if(detalles.length == 0)
	      {
	        $(".div-detalles").append("<div style='text-align=center' class='col-sm-12'><i class='fa fa-close'></i> NO SE ENCONTRARON DATOS</div>");
	      }else
	      {
	        for (i = 0; i < detalles.length; i++) {
	          $(".div-detalles").append("<div style='text-align=center' class='col-sm-3'><i class='fa fa-check'></i> "+detalles[i]+"</div>");
	        }
	      }
	      var palabras = ($(this).data('palabras'));
	      $(".div-detalles").append("<div class='col-sm-12'><label>PALABRAS CLAVES</label></div>");
	      if(palabras.length == 0)
	      {
	        $(".div-detalles").append("<div style='text-align=center' class='col-sm-12'><i class='fa fa-close'></i> NO SE ENCONTRARON DATOS</div>");
	      }else
	      {
	        for (i = 0; i < detalles.length; i++) {
	          $(".div-detalles").append("<div style='text-align=center' class='col-sm-3'><i class='fa fa-check'></i> "+palabras[i]+"</div>");
	        }

	      }
	      $('#myModal').modal('show');
	    });
	} );
	
</script>
@endpush