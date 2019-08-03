<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Multiplaza! | Toda tu vida</title>

    <!-- Bootstrap -->
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ asset('switchery/dist/switchery.min.css') }}" rel="stylesheet">  
    <!-- bootstrap-progressbar -->
    <link href="{{asset('bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->
    {{-- <link href="{{ asset('google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet"> --}}

    <!-- Custom Theme Style -->
    {{-- <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet"> --}}
    <!-- JQVMap -->
    {{-- <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/> --}}

    
    

    {{-- radio swutch toggle --}}
    <link href="{{ asset('css2/custom.min.css') }}" rel="stylesheet">

    <link href="{{ asset('bootstrap-toggle\css\bootstrap-toggle.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href=" {{ asset('DataTables-1.10.18/css/dataTables.bootstrap.min.css') }} "/>
    {{-- <link rel="stylesheet" type="text/css" href=" {{ asset('DataTables/dataTables.bootstrap.min.css') }} "/> --}}

        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.css">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/administrador" class="site_title"><i class="fa fa-xing fa-1x"></i> <span>XiomiSystem</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src=" {{ asset('/imagenes/avatar.jpg') }}" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{{\Auth()->user()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Administrador <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('categorias.index') }}">Categorias</a></li>
                      <li><a href="{{ route('subcategorias.index') }}">Sub-Categorias</a></li>
                      <li><a href="{{ route('locales.index') }}">Locales</a></li>
                      <li><a href="{{ route('palabrasClaves.index') }}">Palabras Claves</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Otros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('configuraciones.index') }}">Configuraciones</a></li>
                      <li><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                      <!--<li><a href="{{ route('roles.index') }}">Roles</a></li>-->
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('/imagenes/avatar.jpg') }} " alt="...">{{\Auth()->user()->name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    {{--<li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> --}}
                    <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        @yield('contenido')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="https://xiomisystem.com/">XiomiSystem</a> - Desarrollo para sus sistemas
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('skycons/skycons.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('moment/min/moment.min.js')}}"></script>
    <script src="{{asset('bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('js2/custom.min.js')}}"></script>
    {{-- radio swutch toggle --}}
    <script src= "{{ asset('bootstrap-toggle\js\bootstrap-toggle.min.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script> --}}
    {{-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> --}}
    {{-- <script src="http://www.bootstraptoggle.com/js/bootstrap-toggle.js"></script> --}}
 
    <script type="text/javascript" src=" {{ asset('DataTables-1.10.18/js/jquery.dataTables.min.js') }} "></script>
    {{-- <script type="text/javascript" src=" {{ asset('DataTables/dataTables.min.js') }} "></script> --}}
    {{-- <script type="text/javascript" src=" {{ asset('DataTables-1.10.18/js/dataTables.bootstrap.min.js') }} "></script> --}}

        <!-- Latest compiled and minified JavaScript -->
    <script src="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.js"></script>

    <script src="{{ asset('jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>


    <script src="{{ asset('switchery/dist/switchery.min.js') }} "></script>

    @stack('script')
  </body>
</html>
