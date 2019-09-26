<!DOCTYPE html>
<html>
<head>
	<title>Prueba</title>
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
	{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="{{asset('liberiasFrontEnd/lib/jquery/jquery.min.js')}}"></script>

	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
  	<link href="{{asset('liberiasFrontEnd/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  	<script src="{{asset('liberiasFrontEnd/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

	{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
	<link rel="stylesheet" href="{{asset('liberiasFrontEnd/css2/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('liberiasFrontEnd/css2/skeleton.css')}}">
    <link rel="stylesheet" href="{{asset('liberiasFrontEnd/css2/custom.css')}}">
	


    <script src="{{asset('liberiasFrontEnd/typeahead.js')}}"></script>
    <script src="{{asset('liberiasFrontEnd/popper.min.js')}}"></script>
	

    <style>
    	.twitter-typeahead, .tt-hint, .tt-input, .tt-menu { width: 100%; }
    </style>
</head>
<body>
	<!-- Button trigger modal -->
	<button type="button" data-tipo="buscador" class="btn btn-primary boton">
	  Buscar
	</button>
	<button type="button" data-tipo="filtro" class="btn btn-primary boton">
	  Filtro
	</button>
	<!-- Modal -->
	<div class="modal fade  bd-example-modal-lg" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<input class='typeahead' type='text' id="buscador-datos">
			</div>
			<br><br><br><br><br><br><br><br>
		    <div class="keyboard">
		        <div class="row">
		            <div class="twelve columns">
		                <button class="keyboard-key" id="key-1">1</button>
		                <button class="keyboard-key" id="key-2">2</button>
		                <button class="keyboard-key" id="key-3">3</button>
		                <button class="keyboard-key" id="key-4">4</button>
		                <button class="keyboard-key" id="key-5">5</button>
		                <button class="keyboard-key" id="key-6">6</button>
		                <button class="keyboard-key" id="key-7">7</button>
		                <button class="keyboard-key" id="key-8">8</button>
		                <button class="keyboard-key" id="key-9">9</button>
		                <button class="keyboard-key" id="key-0">0</button>
		                
		            </div>
		        </div>


		        <div class="row">
		            <div class="twelve columns">
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
		        </div>

		        <div class="row">
		            <div class="twelve columns">
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
		        </div>

		        <div class="row">
		            <div class="twelve columns">
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
						material:option
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

					/*

					*/
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
				    	if(val.name == elemento && val.tipo == 'local')
				    	{
				    		console.log(val.id);
				    		console.log(val.name);
				    		console.log(val.imagen);
				    		console.log(val.mapa);
				    		console.log('Cargar datos en el modal y llamar');
				    		return
				    	}else if (val.name == elemento && val.tipo == 'palabra')
				    	{
				    		console.log(val.id);
				    		console.log(val.name);
				    		console.log('Hacer la consulta');
				    		return;
				    	}
				    	
				    })
				}				
			});
		});
	</script>
</body>
</html>