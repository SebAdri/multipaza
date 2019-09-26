<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://kit.fontawesome.com/316714fe29.js"></script>
    <link href="{{asset('liberiasFrontEnd/css/style.css')}}" rel="stylesheet">
    <!-- Template Main Javascript File -->
    <script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
	<!-- Latest compiled and minified CSS -->

  	<script src="{{asset('liberiasFrontEnd/js/main.js')}}"></script>
  	<script src="{{asset('liberiasFrontEnd/lib/wow/wow.min.js')}}"></script>
	

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
		@foreach($locales as $local)

			<div class="row portfolio-container">

	          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
	            <div class="portfolio-wrap">
	              <figure>
	                <img src="{{asset($local->foto_principal)}}" class="img-fluid" alt="">
	                <a href="img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
	                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
	              </figure>

	              <div class="portfolio-info">
	                <h4><a href="#">{{$local->nombre}}</a></h4>
	                <p>App</p>
	              </div>
	            </div>
	          </div>

        	</div>
			{{-- <div class="agileits-pricing-grid" style="background-color: rgb(243,146,0); height: 100%; width: 24%; display: inline-block; ">
					<img src="{{asset($local->foto_principal)}}" width="100%" height="85%">
				<div class="wthree-pricing-info div-detalles" style="background-color: rgb(243,146,0);">
				    <h3>{{$local->nombre}}</h3>
				</div>
			</div>	 --}}
		@endforeach
	</div>
</body>
</html>