@extends('cabecera')
@section('contenido')
<form method="POST" action="{{ route('locales.store') }}"   enctype="multipart/form-data">
  {!! csrf_field() !!}
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Crear Local</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12">
                @if ($errors->has('nombre'))
                  <span class="invalid-feedback errors" role="alert">
                    <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="ubicacion">Ubicación <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="ubicacion" name="ubicacion" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="foto_principal">Foto Principal
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="foto_principal" name="foto_principal" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="foto_ubicacion">Foto Ubicación
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="foto_ubicacion" name="foto_ubicacion" class="form-control col-md-7 col-xs-12">
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
            <div class="row form-group">
                <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="estado"> Estado <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="checkbox" class="js-switch" name="estado" id="estado" checked="checked"/>
                </div>
            </div>

            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="estado"> Categoria <span class="required">*</span>
                  </label>
              <select class="js-example-basic-multiple col-md-6 col-sm-6 col-xs-12" name="categorias[]" multiple="multiple">
                @foreach ($categorias as $categoria)
                  <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
                {{-- <option value="WY">Wyoming</option>
                <option value="PO">Pomelo</option>
                <option value="NA">Naranja</option>
                <option value="MA">Mandarina</option>
                <option value="TO">Toronja</option> --}}
              </select>
            </div>

            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="estado"> Subcategoria <span class="required">*</span>
                  </label>
              <select class="js-example-basic-multiple col-md-6 col-sm-6 col-xs-12" name="subcategorias[]" multiple="multiple">
                @foreach ($subcategorias as $subcategoria)
                  <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
                @endforeach
                {{-- <option value="WY">Wyoming</option>
                <option value="PO">Pomelo</option>
                <option value="NA">Naranja</option>
                <option value="MA">Mandarina</option>
                <option value="TO">Toronja</option> --}}
              </select>
            </div>
            

            
            <div class="row form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="/administrador/locales" class="btn btn-primary" type="button" id="volver" name="volver">Volver</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>
@stop
@push('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
           placeholder:"Escriba o haga click para buscar"
        });
    });

    
  </script>
@endpush