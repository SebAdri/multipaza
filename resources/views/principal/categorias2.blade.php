<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Multiplaza! | Toda tu vida</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  {{-- <link href="{{asset('liberiasFrontEnd/img/favicon.png')}}" rel="icon"> --}}
  {{-- <link href="{{asset('liberiasFrontEnd/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> --}}
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('liberiasFrontEnd/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('liberiasFrontEnd/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('liberiasFrontEnd/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('liberiasFrontEnd/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('liberiasFrontEnd/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('liberiasFrontEnd/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('liberiasFrontEnd/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('liberiasFrontEnd/select2/css/select2.min.css')}}" rel="stylesheet">

    <style>
      .modal-full {
          min-width: 83%;
          margin: auto;
      }

      .modal-full .modal-content {
          min-height: 100vh;
      }
    .img-modal 
    {
      max-width: 98%;
      max-height: 20%;
      width: auto;
      height: auto; 
    }
    .img-fluid {
      max-width: 350px;
      height: 240px;
    }
    </style>

    
</head>

<body>
  <main id="main">


    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
        	<a id="" href="{{$volver}}" class="btn btn-primary" style="background-color: rgb(243,146,0);border-color: rgb(243,146,0);">
              <i class="fa fa-chevron-left"></i>
            </a>
          <button type="button" data-tipo="buscador" class="btn btn-primary lupa" style="background-color: rgb(243,146,0);border-color: rgb(243,146,0);" data-toggle="modal" data-target="#buscadorModal">
            <i class="fa fa-search"></i>
          </button>
          <button type="button" data-tipo="filtro" class="btn btn-primary" style="background-color: rgb(243,146,0);border-color: rgb(243,146,0);" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-filter"></i>
          </button>
            
          	<h3 style="color:rgb(0,158,199);" class="section-title">{{$titulo}}</h3>
        </header>

        <div class="row portfolio-container">
        	@foreach($categorias as $categoria)

        	<div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
        		<div class="portfolio-wrap">
        			<figure>
        				@if ($direccion == "locales")
							<img src="{{asset($categoria->imagen)}}"class="img-fluid" alt="" onclick="javascript:window.location='/{{$direccion}}/{{$categoria->id}}/{{$titulo}}';">
        				@else
							<img src="{{asset($categoria->imagen)}}"class="img-fluid" alt=""onclick="javascript:window.location='/{{$direccion}}/{{$categoria->id}}';"/>
        				@endif
        			</figure>

        			<div class="portfolio-info">
                <br>
        				<h4>
        					@if ($direccion == "locales")
        						<a style="color:rgb(112,111,111);"href="/{{$direccion}}/{{$categoria->id}}/{{$titulo}}">{{$categoria->nombre}}</a>
        					@else
        						<a style="color:rgb(112,111,111);"href="/{{$direccion}}/{{$categoria->id}}">{{$categoria->nombre}}</a>
        					@endif
        				</h4>
        				{{-- <p>{{$categoria->descripcion}}</p> --}}
        			</div>
        		</div>
        	</div>
        	@endforeach

        </div>

      </div>
    </section><!-- #portfolio -->

  </main>
  @include('principal.modalFiltro-part')
  @include('principal.modalBuscador-part')
  @include('principal.modalLocal-part')
  <!--==========================
    Footer
  ============================-->
  {{-- <footer id="footer">
    <div class="footer-top">
      <div class="container">
        
      </div>
    </div>

    <div class="container">

    </div>
  </footer> --}}<!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="{{asset('liberiasFrontEnd/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/jquery/jquery-migrate.min.js')}}"></script>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
  <script src="{{asset('liberiasFrontEnd/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/lightbox/js/lightbox.min.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('liberiasFrontEnd/contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('liberiasFrontEnd/js/main.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/select2/js/select2.min.js')}}"></script>
  <script type="text/javascript">
      $(document).ready(function() {
      // alert("LLEGA");
        $("#volver").click(function(){
          $.ajax({
            url: "{{url()->current()}}",
            success: function(){
              window.location.replace("{{url()->previous()}}");
            }
          })
        });
        $('.js-example-basic-single').select2();
        $(".js-example-responsive").select2({
          width: 'resolve' // need to override the changed default
        });
        $(".js-example-basic-multiple-limit").select2({
          maximumSelectionLength: 100
        });
        
        $(".btnBuscar").click(function(){
          $("#idBusqueda").val($(".select-buscar option:selected").val());
          $("#tipoBusqueda").val($(".select-buscar option:selected").attr("data-tipo"));
          if($(".select-buscar option:selected").attr("data-tipo") == "local")
          {
            $(".img-local").attr("src", $(".select-buscar option:selected").attr("data-imagen"));
            $(".img-ubicacion").attr("src", $(".select-buscar option:selected").attr("data-ubicacion"));
            $("#tituloP").text($(".select-buscar option:selected").attr("data-titulo"));
            $("#texto").text($(".select-buscar option:selected").attr("data-ubicacionDes")+'. '+$(".select-buscar option:selected").attr("data-referencia"));
            $('#myModalLocal').modal('show');
          }else
          {
            $("#buscar").submit();  
          }
        })

      });

    </script>
</body>
</html>
