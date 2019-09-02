<div class="container">

 <div class="modal fade bd-example-modal-lg" id="myModal">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header panel-heading">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row div-detalles">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn cerrar" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

{{--   <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Detalles</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categorias as $categoria)
      <tr>
        <td>{{$categoria->nombre}}</td>
        <td><button class="btn btn-info detalles" data-titulo="Detalles de la categoria {{$categoria->nombre}}" data-detalles="{{$categoria->subcategoria->pluck('nombre')}}">Detalles</button></td>
      </tr>
      @endforeach
    </tbody>
  </table> --}}
  
</div>

{{-- @push('script') --}}
<script type="text/javascript">
  $(document).ready(function(){
    $(".detalles").click(function(){
      var detalles = ($(this).data('detalles'));
      $(".modal-title").text($(this).data('titulo'));
      $(".modal-content").addClass("panel-success");
      if(detalles.length == 0)
      {
        $(".div-detalles").append("<div style='text-align=center' class='col-sm-12'><i class='fa fa-close'></i> NO SE ENCONTRARON DATOS</div>");
      }else
      {
        for (i = 0; i < detalles.length; i++) {
          $(".div-detalles").append("<div style='text-align=center' class='col-sm-3'><i class='fa fa-check'></i> "+detalles[i]+"</div>");
        }  
      }

      $('#myModal').modal('show');
    });
    $('#myModal').on('hidden.bs.modal', function (e) {
      $(".div-detalles").empty();
      $(".modal-content").removeClass("panel-success");
    })
    $(".cerrar").click(function(){
      $(".div-detalles").empty();
      $(".modal-content").removeClass("panel-success");
    });
    $(".btn-imagen").click(function(){
      // alert("LLEGA?");
      $(".modal-title").text($(this).data('titulo'));
      $(".div-detalles").append("<div class='col-sm-12'><img width='100%' src="+$(this).data('imagen')+"></div>");
      $('#myModal').modal('show');
    });
  });
</script>
{{-- @endpush --}}