<div class="modal" id="myModalLocal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:rgb(0,158,199);border-color:rgb(0,158,199);">
                <h3 class="modal-title"><strong id="tituloP">Multiplaza</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4" id="result">
		      	<div class="col-lg-12">
		      		<div class="row">
		      			<div class="col-lg-6"><img class="img-modal img-local" src=""/></div>
		      			{{-- <div class="col-lg-6"><img class="img-modal img-local" src=""/></div> --}}
		      			<div class="col-lg-6"><img class="img-modal img-ubicacion" src=""/></div>
		      		</div>
		      	</div>
		      	<br>
		      	<br>
		      	<div class="col-lg-12">
		      		<div class="offset-lg-6">
		      			<h5><b id="texto"></b></h5>
		      		</div>
		      	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:rgb(112,111,111);border-color:rgb(112,111,111);">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
{{-- <div class="modal fade" id="myModalLocal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-full" role="document">
	    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
		    <div class="modal-body">
		      	<div class="col-lg-12">
		      		<div class="row">
		      			<div class="col-lg-6"><img class="img-modal img-local" src=""/></div>
		      			<div class="col-lg-6"><img class="img-modal img-ubicacion" src=""/></div>
		      		</div>
		      	</div>
		      	<br>
		      	<div class="col-lg-12">
		      		<div class="col-lg-offset-6">
		      			<p><b>Torre A, Planta Baja, entre Banco Continental y Complot</b></p>
		      		</div>
		      	</div>
		    </div>
	  </div>
	</div>
</div> --}}


<!-- <select>
	<option data-tipo="local" data-imagen={asset(imagen)} data-ubicacion=asset(ubicacion)></option>	
	<option data-tipo="palabra">Palabra</option>	
</select>
//dentro de tu documen ready

$(".btn-buscar").click(function(){
	mete dentro de los inputs del form los datos de la seleccion
	if(local)
	{
		pegar en el modal title el nombre del local
		llamar al modal de los locales
		pegar dentro de los input los tag de la imagenes
	}else
	{
		lo de siempre
	}

}) -->


	