@extends('cabecera')

@section('contenido')
<form method="POST" action="{{ route('subcategorias.update', $subcategoria->id) }}"   enctype="multipart/form-data">
  {!! csrf_field() !!}
  {!! method_field('PUT') !!}
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Editar Sub-Categoria</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" value = "{{$subcategoria->nombre}}">
                @if ($errors->has('nombre'))
                  <span class="invalid-feedback errors" role="alert">
                    <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripion <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="descipcion" name="descripcion" required="required" class="form-control col-md-7 col-xs-12" value = "{{$subcategoria->descripcion}}">
              </div>
            </div>
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Elegir foto <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="imagen" name="imagen" class="form-control col-md-7 col-xs-12">
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
                @if ($subcategoria->estado)
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="checkbox" class="js-switch" name="estado" id="estado" checked/>
                  </div>
                @else
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="checkbox" class="js-switch" name="estado" id="estado"/>
                  </div>
                @endif
            </div>
            <div class="row form-group">
              <label style="text-align: right;" class="control-label col-md-3 col-sm-3 col-xs-12" for="categorias">Categorias <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="checkbox">
                @foreach ($categorias as $categoria)
                  @if($subcategoria->categorias->contains($categoria->id))
                    <label>
                      <input type="checkbox" checked class="flat" value="{{$categoria->id}}" name="categorias[]"> {{$categoria->nombre}}
                    </label>
                  @else
                     <label>
                      <input type="checkbox" class="flat" value="{{$categoria->id}}" name="categorias[]"> {{$categoria->nombre}}
                    </label>                 
                  @endif  
                @endforeach
                </div>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="row form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Grabar</button>
                <a href="/administrador/subcategorias" class="btn btn-primary" type="button" id="volver" name="volver">Volver</a>
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
    $("#volver").click(function(){
      $.ajax({
        url: "{{url()->current()}}",
        success: function(){
          window.location.replace("{{url()->previous()}}");
        }
      })
    });
  </script>
@endpush