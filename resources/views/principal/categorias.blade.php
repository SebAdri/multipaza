<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{asset('liberiasFrontEnd/lib/jquery/jquery.min.js')}}"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://kit.fontawesome.com/316714fe29.js"></script>

     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
  
	<style>	
		.agileits-pricing-grid{
			flex: 1;
		    -webkit-box-flex: 1;
		    -moz-box-flex: 1;
		    width: 20%;
		    -webkit-flex: 1;
		    -ms-flex: 1;
		    margin: 0 5px;
		    transition: 0.5s all;
		    -webkit-transition: 0.5s all;
		}
		.div-detalles{
		    padding: 2em 0 0;
		    background: rgb(255 0 0);
		    text-align: center;
		    border-top-left-radius: 5px;
		    -webkit-border-top-left-radius: 5px;
		    -moz-border-top-left-radius: 5px;
		    -ms-border-top-left-radius: 5px;
		    -o-border-top-left-radius: 5px;
		    border-top-right-radius: 5px;
		    -webkit-border-top-right-radius: 5px;
		    -moz-border-top-right-radius: 5px;
		    -ms-border-top-right-radius: 5px;
		    -o-border-top-right-radius: 5px;
		}		
		.div-detalles h3{
			color: #FFF;
		    font-size: 1.5em;
		    margin: 0;
		    text-transform: uppercase;
		    letter-spacing: 1px;
		   	font-family: 'Montserrat', sans-serif;
		}
		div
		{
		    margin: 0;
		    padding: 0;
		    border: 0;
		    font-size: 100%;
		    font: inherit;
		    vertical-align: baseline;			
		}
		.div-cabecera
		{
			font-family: 'Montserrat', sans-serif; 
			color: rgb(112, 111, 111);
		}
		html, body
		{
    		height: 95%;
		}		
	</style>

</head>
<body>
	<div class="div-cabecera">
		<div style="float: left; text-align: center">
			<a href="/"><i style="color:rgb(243,146,0);" class="fa fa-arrow-circle-left fa-3x" aria-hidden="true"></i></a>
          	<i style="color:rgb(243,146,0);" data-toggle="modal" data-target="#myModal" class="filtro fas fa-filter fa-3x"></i>
		<br><br>
		</div>
	</div>
	<div class="pricing-coop" style="height: 95%; width: 100%; overflow: auto; white-space: nowrap;overflow-y: hidden;">
		@foreach($categorias as $categoria)
			<div class="agileits-pricing-grid" style="background-color: rgb(243,146,0); height: 100%; width: 24%; display: inline-block; ">
				<a href="/subcategoria/{{$categoria->id}}"><img src="{{asset($categoria->imagen)}}" width="100%" height="85%"></a>
				<div class="wthree-pricing-info div-detalles" style="background-color: rgb(243,146,0);">
				    <h3>{{$categoria->nombre}}</h3>
				</div>
			</div>	
		@endforeach
	</div>
	@include('principal.modalFiltro-part')
<script>
	$(document).ready(function(){

	})
</script>

</body>
</html>