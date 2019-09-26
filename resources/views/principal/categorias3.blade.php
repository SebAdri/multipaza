<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Multiplaza! | Toda tu vida</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  
  <script src="{{asset('liberiasFrontEnd/lib/jquery/jquery.min.js')}}"></script>
  {{-- desde aqui librerias para el teclado --}}
  <link href="{{asset('liberiasFrontEnd/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <script src="{{asset('liberiasFrontEnd/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  {{--<link rel="stylesheet" href="{{asset('liberiasFrontEnd/css2/normalize.css')}}">--}}
  {{-- <link rel="stylesheet" href="{{asset('liberiasFrontEnd/css2/skeleton.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('/tauser-conti.min.css')}}">
  <script src="{{asset('liberiasFrontEnd/typeahead.js')}}"></script>
  <script src="{{asset('liberiasFrontEnd/popper.min.js')}}"></script>
  <style>
    .twitter-typeahead, .tt-hint, .tt-input, .tt-menu { width: 100%; }
  </style>
  {{-- hasta aqui librerias para el teclado --}}

  <!-- Google Fonts -->
  <link href="https://Fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <!-- Bootstrap CSS File -->
  <link href="{{asset('liberiasFrontEnd/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('liberiasFrontEnd/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('liberiasFrontEnd/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('liberiasFrontEnd/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('liberiasFrontEnd/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('liberiasFrontEnd/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('liberiasFrontEnd/css/style.css')}}" rel="stylesheet">
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
  <form method="GET" id="buscar" action="/buscar">
    <input type="hidden" name="tipo" id="tipoBusqueda">
    <input type="hidden" name="id" id="idBusqueda">
  </form>
  @yield('contenido')
  
  {{-- @include('principal.modalFiltro-part')
  @include('principal.modalBuscador-part')--}}
  @include('principal.modalLocal-part') 
  @include('principal.modalTeclado-part')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- JavaScript Libraries -->
  <script src="{{asset('liberiasFrontEnd/lib/jquery/jquery-migrate.min.js')}}"></script>
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
  <script src="{{asset('liberiasFrontEnd/contactform/contactform.js')}}"></script>
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
      //   $('.js-example-basic-single').select2();
      //   $(".js-example-responsive").select2({
      //     width: 'resolve' // need to override the changed default
      //   });
      //   $(".js-example-basic-multiple-limit").select2({
      //     maximumSelectionLength: 100
      //   });
        
      //   $(".btnBuscar").click(function(){
      //     $("#idBusqueda").val($(".select-buscar option:selected").val());
      //     $("#tipoBusqueda").val($(".select-buscar option:selected").attr("data-tipo"));
      //     if($(".select-buscar option:selected").attr("data-tipo") == "local")
      //     {
      //       $(".img-local").attr("src", $(".select-buscar option:selected").attr("data-imagen"));
      //       $(".img-ubicacion").attr("src", $(".select-buscar option:selected").attr("data-ubicacion"));
      //       $("#tituloP").text($(".select-buscar option:selected").attr("data-titulo"));
      //       $("#texto").text($(".select-buscar option:selected").attr("data-ubicacionDes")+'. '+$(".select-buscar option:selected").attr("data-referencia"));
      //       $('#myModalLocal').modal('show');
      //     }else
      //     {
      //       $("#buscar").submit();  
      //     }
      //   })

      });

    </script>
</body>
</html>
