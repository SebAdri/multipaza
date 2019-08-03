@extends('cabecera')

@section('contenido')
<form method="POST" action="{{ route('palabrasClaves.update', $palabra->id) }}"   enctype="multipart/form-data">
  {!! csrf_field() !!}
  {!! method_field('PUT') !!}
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Modificar palabras claves</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="control-group">
              <div class="col-md-7 ml-md-3 col-md-offset-2">
                <label style="text-align: left;" class="control-label col-md-3 col-sm-3 col-xs-12" for="tags_1">Palabras Claves</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="tags_1" name="tags_1" type="text" class="tags form-control" value="{{$palabra->palabras}}" />
                  <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                </div>
              </div>
            </div>

            <div class="x_title">
              <h2>Asocie las palabras claves al local</h2>
              <div class="clearfix"></div>
            </div>

            <div class="col-md-7 ml-md-3 col-md-offset-2">
              <div class="panel panel-default ">
                <div class="panel-heading">Locales</div>
                <div class="panel-body">
                  <div class="checkbox">
                    @foreach ($locales as $local)
                      <label>
                        @if ($palabra->locales->contains($local->id))
                          <input type="checkbox" class="flat" value="{{$local->id}}" checked="" name="locales[]"> {{$local->nombre}}
                        @else
                          <input type="checkbox" class="flat" value="{{$local->id}}" name="locales[]"> {{$local->nombre}}
                        @endif
                      </label>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="/administrador/palabrasClaves" class="btn btn-primary" type="button" id="volver" name="volver">Volver</a>
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