@extends('cabecera')

@section('contenido')
<form method="POST" action="{{ route('usuarios.update', $user->id) }}">
  {!! csrf_field() !!}
  {!! method_field('PUT') !!}
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_content">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Editar Usuario</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <div class="row form-group">
                    <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="nombre" readonly id="first-name" required="required" value="{{$user->name}}" class="form-control col-md-7 col-xs-12">
                      @if ($errors->has('nombre'))
                      <span class="invalid-feedback errors" role="alert">
                        <strong>{{ $errors->first('nombre') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row form-group">
                    <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Correo <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="correo" readonly name="correo" required="required" value="{{$user->email}}" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rol <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12" name="role" placeholder="Seleccione un rol">
                  <option value="" disabled>Seleccione un rol</option>
                  @foreach ($roles as $rol)
                    @if ($rol->name == $user->getRoleNames())
                      <option value="{{$rol->name}}" selected>{{$rol->name}}</option>
                    @else
                      <option value="{{$rol->name}}">{{$rol->name}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>

            
            <div class="ln_solid"></div>
            <div class="row form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="/administrador/usuarios" class="btn btn-primary" type="button" id="volver" name="volver">Volver</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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