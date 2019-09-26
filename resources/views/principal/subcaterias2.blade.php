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

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>


  <main id="main">


    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 style="color:rgb(0,158,199);" class="section-title">Categorias</h3>
        </header>

        <div class="row portfolio-container">
        	@foreach($categorias as $categoria)

        	<div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
        		<div class="portfolio-wrap">
        			<figure>
        				<img src="{{asset($categoria->imagen)}}"class="img-fluid" alt="">
        				<a href="img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
        				<a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
        			</figure>

        			<div class="portfolio-info">
        				<h4 ><a style="color:rgb(112,111,111);" href="#">{{$categoria->nombre}}</a></h4>
        				{{-- <p>{{$categoria->descripcion}}</p> --}}
        			</div>
        		</div>
        	</div>
        	@endforeach

        </div>

      </div>
    </section><!-- #portfolio -->

  </main>

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

</body>
</html>
