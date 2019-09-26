	<div class="modal fade bd-example-modal-lg" tabindex="-1" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			<div id="the-basics">
				<div class="btn-group" id="palabras-filtro" hidden>
				</div>
				<input class='typeahead form-control' focus type='text' id="buscador-datos">
			</div>
			<br><br><br><br><br><br><br><br>
			<div class="keyboard-tarjeta">
			    <div class="keyboard-alpha text-center w-100 pt-2 pb-2">
	            <div class="col-12 text-center">
	                <button class="keyboard-key" id="key-Q">Q</button>
	                <button class="keyboard-key" id="key-W">W</button>
	                <button class="keyboard-key" id="key-E">E</button>
	                <button class="keyboard-key" id="key-R">R</button>
	                <button class="keyboard-key" id="key-T">T</button>
	                <button class="keyboard-key" id="key-Y">Y</button>
	                <button class="keyboard-key" id="key-U">U</button>
	                <button class="keyboard-key" id="key-I">I</button>
	                <button class="keyboard-key" id="key-O">O</button>
	                <button class="keyboard-key" id="key-P">P</button>
	            </div>
	            <div class="col-12 text-center">
	                <button class="keyboard-key" id="key-A">A</button>
	                <button class="keyboard-key" id="key-S">S</button>
	                <button class="keyboard-key" id="key-D">D</button>
	                <button class="keyboard-key" id="key-F">F</button>
	                <button class="keyboard-key" id="key-G">G</button>
	                <button class="keyboard-key" id="key-H">H</button>
	                <button class="keyboard-key" id="key-J">J</button>
	                <button class="keyboard-key" id="key-K">K</button>
	                <button class="keyboard-key" id="key-L">L</button>
	            </div>
	            <div class="col-12 text-center">
	                <button class="keyboard-key" id="key-Z">Z</button>
	                <button class="keyboard-key" id="key-X">X</button>
	                <button class="keyboard-key" id="key-C">C</button>
	                <button class="keyboard-key" id="key-V">V</button>
	                <button class="keyboard-key" id="key-B">B</button>
	                <button class="keyboard-key" id="key-N">N</button>
	                <button class="keyboard-key" id="key-Nn">Ñ</button>
	                <button class="keyboard-key" id="key-M">M</button>
	                <button class="keyboard-key-borrar" id="key-borrar">BORRAR</button>
	            </div>
			    </div>
			</div>    

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
	        <button type="button" class="btn btn-primary buscar-datos">BUSCAR</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script>
		$(document).ready(function() {
			datos = "";
			elemento = "";
			filtro = [];
			$(".boton").click(function(){
				$("#palabras-filtro").prop('hidden', true);
				$('.typeahead').typeahead('destroy');
				option = $(this).attr("data-tipo");
				var datos = [];
				if(option == "buscador")
				{
					$("#buscador-datos").attr('placeholder', 'Busqueda de datos');
					$.ajax({
						headers: {
							'X-CSRF-TOKEN' : $('meta[name = "csrf-token"]').attr('content')
						},
						url:'{{ route('getLocalesPalabras')}}',
						method: 'get',
						data: {
						option:option
						},
						dataType: 'json',
						success:function(reponse){
							// console.log(reponse);
						}
					})
					.done(function (response){
						console.log('ok success')
							// datos = response;
							console.log('dentrode success');
							query = response;
							console.log(query);
							$.each(query, function() {
								$.each(this, function(k, v) {
									if(k == "nombre" || k == "palabras")//remplazar name por el nombre de la columna que viene de la base, ejemplo palabra, local
									{
										datos.push(v);
									}
								});
							});
					})
					.fail(function(){
						alert('ocurrio un error interno, contacte con sebas');
					});
 					//Hacer un ajax para traer todos los datos de las palabras y los locales
					// query = [{'id': '1', 'name':'Hamburguesa', 'tipo':'palabra'}, {'id': '2', 'name':'Rondina', 'imagen': 'ruta', 'mapa': 'ruta-mapa', 'tipo':'local'}];
					// query = datos[0];
					console.log('aqui');

					
				}else
				{
					$("#buscador-datos").attr('placeholder', 'Filtre los locales por palabras claves');
					$("#palabras-filtro").prop('hidden', false);
					$.ajax({
						headers: {
							'X-CSRF-TOKEN' : $('meta[name = "csrf-token"]').attr('content')
						},
						url:'{{ route('getLocalesPalabras')}}',
						method: 'get',
						data: {
						material:option
						},
						dataType: 'json',
						success:function(reponse){
							// console.log(reponse);
						}
					})
					.done(function (response){
						console.log('ok success');
						// query = [{'id': '1', 'name':'Hamburguesas'}, {'id': '2', 'name':'Barberia'}];
						query = response;
						$.each(query, function() {
							$.each(this, function(k, v) {
								if(k == "palabras")//remplazar name por el nombre de la columna que viene de la base, ejemplo palabra, local
								{
									datos.push(v);
								}
							});
						});
					})
					.fail(function(){
						alert('ocurrio un error interno, contacte con sebas');
					});
				}
				$('#the-basics .typeahead').typeahead({
					hint: true,
					highlight: true,
					minLength: 1
				},
				{
					name: 'buscar',
					source: substringMatcher(datos)
				});
				$("#exampleModal").modal();
				//$('#id').select2('open');
			});
			var substringMatcher = function(strs) {
			  return function findMatches(q, cb) {
			    var matches, substringRegex;

			    // an array that will be populated with substring matches
			    matches = [];

			    // regex used to determine if a string contains the substring `q`
			    substrRegex = new RegExp(q, 'i');

			    // iterate through the pool of strings and for any string that
			    // contains the substring `q`, add it to the `matches` array
			    $.each(strs, function(i, str) {
			      if (substrRegex.test(str)) {
			        matches.push(str);
			      }
			    });

			    cb(matches);
			  };
			};
			$(".keyboard-key").click(function(){
				valor = ($('.tt-input').typeahead('val'));
				$("#datos").val($(this).text());
				$('#the-basics .typeahead').typeahead('val', valor+$(this).text());
				$('#the-basics .typeahead').typeahead('open');

			});
			$("#key-borrar").click(function(){
				let str = ($('.tt-input').typeahead('val'));
				str = str.substring(0, str.length - 1);
				$('#the-basics .typeahead').typeahead('val', str);
			});
			//$('.typeahead').on('typeahead:selected', function(evt, item) {
    		//	alert(option);
    			//$(".filtro").append("<h5><span class='badge badge-secondary'>"+item+"</span></h5>")
			//});
			$('#the-basics .typeahead').typeahead({
			    name: 'identifier',
			    local: datos
			}).on('typeahead:selected', function (obj, datum) {
				if(option== "filtro")
				{
					if(filtro.indexOf(datum) === -1)
					{
						filtro.push(datum)
						$("#palabras-filtro").append("<button type='button' style='margin: 4px' class='btn btn-primary'>"+datum+" <span class='badge badge-light remove' data-filtro='"+datum+"'>X</span></button>");						
					}
					$('#the-basics .typeahead').typeahead('val', '');
				}else{
					elemento = datum;
				}
			});
			$(document).on('click', '.remove',function(){
				var eliminar = $(this).data('filtro');
				if(filtro.indexOf(eliminar) > -1){
					$(this).parent().remove();
					var index = filtro.indexOf(eliminar);
					filtro.splice(index , 1);
				}
			});
			$(".buscar-datos").click(function(){
				if(option== "filtro")
				{
					var ids = query.map(function (q) {
						if (filtro.indexOf(q.name) > -1) {
							return q.id;
						}
					});
					console.log(ids);
				}else
				{
				    $.each(query, function(key, val) {
			    	if(val.nombre == elemento)
				    	{
				            $(".img-local").attr("src", '{{asset('')}}'+val.foto_principal);
				            $(".img-ubicacion").attr("src",'{{asset('')}}'+val.foto_ubicacion);
				            $("#tituloP").text(elemento);
				            $("#texto").text(val.ubicacion +". "+ val.referencia);
				            $('#exampleModal').modal('toggle');
				            $('#myModalLocal').modal('show');
				            $('body').css('overflow','hidden');
				    		return
				    	}else if (val.palabras == elemento )
				    	{
      					    $("#idBusqueda").val(val.id);
      					    $("#tipoBusqueda").val('palabra');
				    		$("#buscar").submit();
				    		//alert('palabra')
				    		//console.log(val.id);
				    		//console.log(val.name);
				    		//console.log('Hacer la consulta');
				    	}
				    	$('#myModalLocal').on('hidden.bs.modal', function (e) {
				    		$('body').css('overflow','visible');
						})
				    })
				}				
			});
		});
	</script>