@extends('cabecera')
            
@section('contenido')
<form method="POST" action="{{ route('configuraciones.store') }}"   enctype="multipart/form-data">
  {!! csrf_field() !!}
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Cargar Configuración</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Saludo inicial <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="saludo_inicial" name="saludo_inicial" required="required" class="form-control col-md-7 col-xs-12">
                @if ($errors->has('saludo_inicial'))
                  <span class="invalid-feedback errors" role="alert">
                    <strong>{{ $errors->first('saludo_inicial') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Elegir foto <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="imagen" name="imagen" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha  
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="fecha" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" value=
                "{{date('Y-m-d')}}" disabled="">
              </div>
            </div>


            <div class="ln_solid"></div>
            <div class="row form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="/administrador/configuraciones" class="btn btn-primary" type="button" id="volver" name="volver">Volver</a>
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
    $("#volver").click(function(){
      $.ajax({
        url: "{{url()->current()}}",
        success: function(){
          window.location.replace("{{url()->previous()}}");
        }
      })
    });
    $(document).ready(function(){
      
      $('#select').multipleSelect()
    });
    
  </script>
@endpush