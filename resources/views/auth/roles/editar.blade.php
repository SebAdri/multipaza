@extends('cabecera')

@section('contenido')
<form method="POST" action="{{ route('roles.update', $rol->id) }}">
  {!! csrf_field() !!}
  {!! method_field('PUT') !!}
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Modificar Rol</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          {{-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> --}}
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="nombre" id="first-name" required="required" value="{{$rol->name}}" class="form-control col-md-7 col-xs-12">
                @if ($errors->has('nombre'))
                <span class="invalid-feedback errors" role="alert">
                  <strong>{{ $errors->first('nombre') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripción <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="descipcion" name="descripcion" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <label>Asigne los permisos</label>
            <table class="table table-condensed">
              <thead>
                <tr>
                  <th>Modulos</th>
                  <th>Permisos</th>
                </tr>
              </thead>
              <tbody>
                @foreach($modulos as $modulo)
                  <tr>
                    <td>{{$modulo}}</td>
                    @foreach($permisos as $permiso)
                      @if($permiso->modulo == $modulo)
                        @if ($rol->hasPermissionTo($permiso->name))
                          <td><label for="{{$permiso->id}}"><input type="checkbox" id="{{$permiso->id}}" checked class="js-switch" name="permiso[]" value="{{$permiso->name}}"/> {{strstr($permiso->name,'_', true)}} </label></td>
                          
                        @else
                          <td><label for="{{$permiso->id}}"><input type="checkbox" id="{{$permiso->id}}" class="js-switch" name="permiso[]" value="{{$permiso->name}}"/> {{strstr($permiso->name,'_', true)}} </label></td>
                        @endif
                      @endif
                    @endforeach
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="ln_solid"></div>
            <div class="row form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="/administrador/categorias" class="btn btn-primary" type="button" id="volver" name="volver">Volver</a>
              </div>
            </div>
          {{-- </form> --}}
        </div>
      </div>
    </div>
  </div>
</form>
@stop
@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#toggle-two').bootstrapToggle();
    $('#toggle-two').bootstrapToggle({
        // alert('asd');
        on: 'Enabled',
        off: 'Disabled'
      });
  });

</script>
@endpush