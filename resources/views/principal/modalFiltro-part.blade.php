<form method="POST" action="{{ route('filtros') }}">
  {!! csrf_field() !!}
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
{{--<div class="modal" role="dialog" id="#exampl eModal">
  <div class="modal-dialog" role="document"> --}}
    <div class="modal-content">
      <div class="modal-header" style="background-color:rgb(0,158,199);border-color:rgb(0,158,199);">

        <h5 class="modal-title"  style="color:white;"><b>Filtrar Locales</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Escriba o elija palabras para filtrar los locales</p>
        <select class="js-example-responsive" multiple="multiple" style="width: 100%" name="palabras_id[]">
          @foreach($palabrasClaves as $key=>$palabra)
            <option data-tipo="palabra" value="{{$palabra->id}}" name="palabras[]">{{$palabra->palabras}}</option>          
          @endforeach
        </select>  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" style="background-color:rgb(0,158,199);border-color:rgb(0,158,199);">Buscar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:rgb(112,111,111);border-color:rgb(112,111,111);">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</form>  
