<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plantilla/assets/images/favicon.png')}}">
    <title>Software Agricola</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('plantilla/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('plantilla/material/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('plantilla/material/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <style rel="stylesheet">
        th{
            white-space: nowrap;
        }
    </style>
    @stack('arriba')
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand ligh" href="{{url('/')}}">
                        <!-- Logo icon -->
                        <b class="light-logo">
                            <i class="fa fa-seedling"></i>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <b class="light-logo"> SOFTWARE</b>
                        </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0);"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0);"><i class="ti-menu"></i></a> </li>

                        
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->nombre}}</a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i>
                                                Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li hidden class="{{ Request::is('insumos*') ? 'nav-item active' : 'nav-item' }}">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-biohazard"></i>
                                <span class="hide-menu"> Agroquimicos</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">

                                <li class="{{ Request::is('insumos/agroquimicos*') ? 'nav-item active' : 'nav-item' }}">
                                    <a href="{{url('insumos/agroquimicos')}}" >
                                        <i class="fa fa-biohazard"></i>
                                        <span>  Herbicidas</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('insumos/semillas*') ? 'nav-item active' : 'nav-item' }}">
                                    <a href="{{url('insumos/semillas')}}" >
                                        <i class="fa fa-leaf"></i>
                                        <span>   Insecticidas</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('insumos/semillas*') ? 'nav-item active' : 'nav-item' }}">
                                    <a href="{{url('insumos/semillas')}}" >
                                        <i class="fa fa-leaf"></i>
                                        <span>  Fungicidas</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('insumos/semillas*') ? 'nav-item active' : 'nav-item' }}">
                                    <a href="{{url('insumos/semillas')}}" >
                                        <i class="fa fa-leaf"></i>
                                        <span>  Fertilizantes</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="{{ Request::is('insumos/agroquimicos*') ? 'nav-item active' : 'nav-item' }}">
                            <a href="{{url('insumos/agroquimicos')}}" >
                                <i class="fa fa-biohazard"></i>
                                <span class="hide-menu">  Agroquimicos</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('insumos/semillas*') ? 'nav-item active' : 'nav-item' }}">
                            <a href="{{url('insumos/semillas')}}" >
                                <i class="fa fa-leaf"></i>
                                <span class="hide-menu">  Semillas</span>
                            </a>
                        </li>


                        <li class="{{ Request::is('destinatarios*') ? 'nav-item active' : 'nav-item' }}">
                            <a href="{{url('destinatarios')}}" >
                                <i class="fa fa-map-signs"></i>
                                <span class="hide-menu"> Destinatarios</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('proveedores*') ? 'nav-item active' : 'nav-item' }}">
                            <a href="{{url('proveedores')}}" >
                                <i class="fa fa-industry"></i>
                                <span class="hide-menu"> Proveedores</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('ingresos*') ? 'nav-item active' : 'nav-item' }}">
                            <a href="{{url('ingresos')}}" >
                                <i class="fa fas fa-dolly"></i>
                                <span class="hide-menu"> Ingresos</span>
                            </a>
                        </li>


                        <li class="{{ Request::is('salidas*') ? 'nav-item active' : 'nav-item' }}">
                            <a href="{{url('salidas')}}" >
                                <i class="fas fa-cash-register"></i>
                                <span class="hide-menu"> Salidas</span>
                            </a>
                        </li>

                        <li class="{{ Request::is('config*') ? 'nav-item active' : 'nav-item' }}">
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-cogs"></i>
                                <span class="hide-menu"> Configuracion</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="{{ Request::is('config/unidades*') ? 'nav-item active' : 'nav-item' }}">
                                    <a href="{{url('config/unidades')}}" >
                                        <i class="fa fa-ruler"></i>
                                        <span> Unidades de Medida</span>
                                    </a>
                                </li>
                                <li  hidden class="{{ Request::is('config/tipoMaquinarias*') ? 'nav-item active' : 'nav-item' }}">
                                    <a href="{{url('config/tipoMaquinarias')}}" >
                                        <i class="fa fa-tools"></i>
                                        <span> Tipos de Maquinaria</span>
                                    </a>
                                </li>
                                <li hidden  class="{{ Request::is('config/tiposactividad*') ? 'nav-item active' :
                                'nav-item' }}">
                                    <a href="{{url('config/tiposactividad')}}" >
                                        <i class="fa fa-toolbox"></i>
                                        <span> Tipos de actividad</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('config/tipoAgroquimicos*') ? 'nav-item active' : 'nav-item'
                                }}">
                                    <a href="{{url('config/tipoAgroquimicos')}}" >
                                        <i class="fa fa-book-dead"></i>
                                        <span> Tipos Agroquimicos</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('config/tipoSemillas*') ? 'nav-item active' : 'nav-item' }}">
                                    <a href="{{url('config/tipoSemillas')}}" >
                                        <i class="fa fa-atlas"></i>
                                        <span> Tipos de Semilla</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid pt-3">
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                @yield('contenido')
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <script src="{{asset('plantilla/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('plantilla/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('plantilla/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('plantilla/material/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('plantilla/material/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('plantilla/material/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('plantilla/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('plantilla/assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('plantilla/material/js/custom.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Chart JS -->

    <script src="{{asset('plantilla/assets/plugins/Chart.js/Chart.min.js')}}"></script>
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('plantilla/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    @stack('scripts')
</body>

</html>
