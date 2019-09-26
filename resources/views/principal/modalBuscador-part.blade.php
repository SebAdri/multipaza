<div class="modal" role="dialog" id="buscadorModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{-- <div class="modal-header" style="background:color:rgb(0,158,199)"> --}}
      <div class="modal-header" style="background-color:rgb(0,158,199);border-color:rgb(0,158,199);">

        <h5 class="modal-title"  style="color:white;"><b>Buscar Locales</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Escriba o elija una palabra o local para buscar</p>
        <select class="js-example-basic-single js-example-responsive select-buscar" style="width: 100%" name="state">
          @foreach($palabrasClaves as $key=>$palabra)
            <option data-tipo="palabra" value="{{$palabra->id}}">{{$palabra->palabras}}</option>          
          @endforeach
          @foreach($locales as $key=>$local)
            <option data-tipo="local" data-titulo="{{$local->nombre}}" data-imagen="{{asset($local->foto_principal)}}" data-ubicacion="{{asset($local->foto_ubicacion)}}" value="{{$local->id}}" data-ubicacionDes="{{$local->ubicacion}}" data-referencia="{{$local->referencia}}">{{$local->nombre}}</option>          
          @endforeach
        </select>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btnBuscar" style="background-color:rgb(0,158,199);border-color:rgb(0,158,199);">Buscar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
<form method="GET" id="buscar" action="/buscar">
  <input type="hidden" name="tipo" id="tipoBusqueda">
  <input type="hidden" name="id" id="idBusqueda">
</form>  
</div>
