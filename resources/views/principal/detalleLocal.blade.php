@extends('principal.categorias3')
@section('contenido')
<main id="main">
      <section id="portfolio"  class="section-bg" >
        <div class="container">

          <header class="section-header">
            <a href="{{$volver}}" class="btn btn-primary" style="background-color: rgb(243,146,0);border-color: rgb(243,146,0);">
              <i class="fa fa-chevron-left"></i>
            </a>
            <button type="button" data-tipo="buscador" class="btn btn-primary boton" style="background-color: rgb(243,146,0);border-color: rgb(243,146,0);">
            <i class="fa fa-search"></i>
            </button>
            <button type="button" data-tipo="filtro" class="btn btn-primary boton" style="background-color: rgb(243,146,0);border-color: rgb(243,146,0);">
              <i class="fa fa-filter"></i>
            </button>
            <br>
            <h3 class="section-title" style="color:rgb(0,158,199);">Nuestros Locales</h3>
          </header>

          <div class="row">
            <div class="col-lg-12">
              <ul id="portfolio-flters">
                <li style="background: rgb(243,146,0);color:white;">{{App\SubCategoria::find($id)->nombre}} 
              </ul>
            </div>
          </div>

        <div class="row portfolio-container">
          @foreach($localesDependientes as $local)

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure style="width: 350px; height: 290px">
                <img id="imgLocal" src="{{asset($local->foto_principal)}}" class="img-fluid btn-buscar" alt="" data-fotoUbi="{{asset($local->foto_ubicacion)}}" data-ubicacion="{{$local->ubicacion}}" data-referencia="{{$local->referencia}}" data-titulo="{{$local->nombre}}">
              </figure>

              <div class="portfolio-info" style="width: 350px; height: 55px; padding: 15px;">
                <h4>{{-- <a href="#"> --}}{{$local->nombre}}{{-- </a> --}}</h4>
                <p>{{$local->ubicacion}}</p>
                {{-- <a href="#" class="link-details" title="Más Detalles"><i class="fa fa-map-marker fa-2x" style="background: transparent;"></i></a>  --}}
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- #portfolio -->

  </main>
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
        $(".btnBuscar").click(function(){
          $("#idBusqueda").val($(".select-buscar option:selected").val());
          $("#tipoBusqueda").val($(".select-buscar option:selected").attr("data-tipo"));
          if($(".select-buscar option:selected").attr("data-tipo") == "local")
          {
            $(".img-local").attr("src", $(".select-buscar option:selected").attr("data-imagen"));
            $(".img-ubicacion").attr("src", $(".select-buscar option:selected").attr("data-ubicacion"));
            $("#tituloP").text($(".select-buscar option:selected").attr("data-titulo"));
            $("#texto").text($(".select-buscar option:selected").attr("data-ubicacionDes")+'. '+$(".select-buscar option:selected").attr("data-referencia"));
            // $(".img-local").attr("src", $(".select-buscar option:selected").attr("data-imagen"));
            // $(".img-ubicacion").attr("src", $(".select-buscar option:selected").attr("data-ubicacion"));
            $('#myModalLocal').modal('show');
          }else
          {
            $("#buscar").submit();  
          }
        });

        //busca cuando hacemos click en la magen
        $(".btn-buscar").click(function(){
          // alert($(this).data('titulo'));
          $(".img-local").attr("src", $(this).attr("src"));
          $(".img-ubicacion").attr("src", $(this).data('fotoUbi'));
          $("#texto").text($(this).data('ubicacion')+'. '+$(this).data('referencia'));
          $("#tituloP").text($(this).data('titulo'));
          
          $('#myModalLocal').modal('show');
          $(document).find("#dummy");
        });
      });
    </script>  
@endsection