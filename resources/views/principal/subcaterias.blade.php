<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://kit.fontawesome.com/316714fe29.js"></script>
	<style>
		@keyframes fadein {
		    from {
		        opacity:0;
		    }
		    to {
		        opacity:1;
		    }
		}
		@-moz-keyframes fadein { /* Firefox */
		    from {
		        opacity:0;
		    }
		    to {
		        opacity:1;
		    }
		}
		@-webkit-keyframes fadein { /* Safari and Chrome */
		    from {
		        opacity:0;
		    }
		    to {
		        opacity:1;
		    }
		}
		@-o-keyframes fadein { /* Opera */
		    from {
		        opacity:0;
		    }
		    to {
		        opacity: 1;
		    }
		}		
		body
		{
			background: #f7f7f7;
			animation: fadein 4s;
		    -moz-animation: fadein 4s; /* Firefox */
		    -webkit-animation: fadein 4s; /* Safari and Chrome */
		    -o-animation: fadein 4s; /* Opera */
			overflow-y: auto;
		}
		::-webkit-scrollbar {
		  width: 20px;
		}
		::-webkit-scrollbar-track {
		  box-shadow: inset 0 0 5px grey; 
		  border-radius: 10px;
		}
		::-webkit-scrollbar-thumb {
		  background: red; 
		  border-radius: 10px;
		}
		::-webkit-scrollbar-thumb:hover {
		  background: #b30000; 
		}		
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
			<a href="inicio.html"><i style="color:rgb(243,146,0);" class="fa fa-arrow-circle-left fa-3x" aria-hidden="true"></i></a>
          	<i style="color:rgb(243,146,0);"  class="fas fa-search fa-3x"></i>
		<br><br>
		</div>
	</div>
	<div class="pricing-coop" style="height: 95%; width: 100%; overflow: auto; white-space: nowrap;overflow-y: hidden;">
		@foreach($subcategorias as $subcategoria)
			<div class="agileits-pricing-grid" style="background-color: rgb(243,146,0); height: 100%; width: 24%; display: inline-block; ">
				<a href="/locales/{{$subcategoria->id}}/{{$id}}"><img src="{{asset($subcategoria->imagen)}}" width="100%" height="85%"></a>
				<div class="wthree-pricing-info div-detalles" style="background-color: rgb(243,146,0);">
				    <h3>{{$subcategoria->nombre}}</h3>
				</div>
			</div>	
		@endforeach
	</div>
</body>
</html>