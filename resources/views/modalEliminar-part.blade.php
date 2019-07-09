<!-- Modal -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content panel-danger">
      <div class="modal-header panel-heading">
        <h2 class="modal-title" id="exampleModalLabel"><strong>ATENCIÓN</strong></h2>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
          {{-- <span aria-hidden="true">&times;</span> --}}
        {{-- </button> --}}
      </div>
      <div class="modal-body">
        <h4 class="modal-body">Está seguro que desea eliminar este registro. Esto podría afectar el funcionamiento el sistema?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger">Confirmar</button>
        {{-- <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>  Eliminar</button> --}}
      </div>
    </div>
  </div>
</div>