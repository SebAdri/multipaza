@extends('cabecera')

@section('contenido')
<form method="POST" action="{{ route('usuarios.store') }}">
  {!! csrf_field() !!}
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Crear Usuario</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="nombre" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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
                <input type="text" id="correo" name="correo" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contraseña <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="password" id="contraseña" name="contraseña" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            {{-- <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirmar Contraseña <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="password" id="confirm_contraseña" name="confirm_contraseña" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div> --}}
            {{-- <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rol <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select required class="form-control col-md-7 col-xs-12" name="role" placeholder="Seleccione un rol">
                  <option selected value="">Seleccione un rol</option>
                  @foreach ($roles as $rol)
                    <option value="{{$rol->name}}">{{$rol->name}}</option>
                  @endforeach
                </select>
              </div>
            </div> --}}

            
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
</form>
@stop
