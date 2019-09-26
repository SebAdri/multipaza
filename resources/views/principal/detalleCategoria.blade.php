@extends('principal.categorias3')

@section('contenido')
<main id="main">
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
        	<a id="" href="{{$volver}}" class="btn btn-primary" style="background-color: rgb(243,146,0);border-color: rgb(243,146,0);">
              <i class="fa fa-chevron-left"></i>
          </a>
          <button type="button" data-tipo="buscador" class="btn btn-primary boton" style="background-color: rgb(243,146,0);border-color: rgb(243,146,0);">
            <i class="fa fa-search"></i>
          </button>
          <button type="button" data-tipo="filtro" class="btn btn-primary boton" style="background-color: rgb(243,146,0);border-color: rgb(243,146,0);">
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
    </section>
  </main>
@endsection