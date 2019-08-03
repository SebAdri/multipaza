@extends('cabecera')

@section('contenido')
{{-- <form> --}}
<div class="form-control">
<div class="x_title">
  <h2>Roles</h2>
  <div class="clearfix"></div>
</div>
<a href="{{ route('roles.create') }}" class="btn btn-primary col-md-offset-11" role="button"> <i class="fa fa-plus"></i>  Agregar</a>
	<table id="tablaRol" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Nombre</th>
				<th>Decripción</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($roles as $rol)
				<tr>
					<td>{{$rol->id}}</td>
					<td>{{$rol->name}}</td>
					<td>{{$rol->descripcion}}</td>
					{{-- <td>
						@foreach ($rol->permissions as $permiso)
							{{$permiso}}
						@endforeach
					</td> --}}
					<td>
						<button class="btn btn-success detalles-rol" data-titulo="Detalles Rol" data-modulos="{{$rol->permissions->pluck('modulo')->unique()->values()}}"  data-permisos="{{$rol->permissions->pluck('name')}}"><i class='fa fa-list'></i> Detalles</button>
						<a class="btn btn-info" href="{{ route('roles.edit', $rol->id) }}"><i class="fa fa-edit"></i>  Editar</a>
		                <form style="display: inline" method="POST" action="{{ route('roles.destroy', $rol->id) }}">
		                    {!! csrf_field() !!}
		                    {!! method_field('DELETE') !!}
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar{{$rol->id}}"><i class="fa fa-trash"></i>  Eliminar</button>
  							<div class="modal fade" id="modalEliminar{{$rol->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
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
		$(".detalles-rol").click(function(){
	      var detalles = ($(this).data('modulos'));
	      var permisos = ($(this).data('permisos'));
	      $(".modal-title").text($(this).data('titulo'));
	      $(".div-detalles").append("<div class='col-sm-12'><label>MODULOS</label></div>");
	      if(detalles.length == 0)
	      {
	        $(".div-detalles").append("<div style='text-align=center' class='col-sm-12'><i class='fa fa-close'></i> NO SE ENCONTRARON DATOS</div>");
	      }else
	      {
	        for (i = 0; i < detalles.length; i++) {
	        	$(".div-detalles").append("<div class='col-sm-12'><label>"+detalles[i]+"</label></div>");
	        	for(j = 0; j < permisos.length; j++){
	        		bandera = permisos[j].split("_");
	        		if(bandera[1] == detalles[i]){
	        			$(".div-detalles").append("<div style='text-align=center' class='col-sm-3'><i class='fa fa-check'></i> "+bandera[0]+"</div>");	
	        		}
	        	}
	        }
	      }
	      $('#myModal').modal('show');
	    });
	} );
	
</script>
@endpush