<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
 
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="dark" data-background-color="dark" data-image="../assets/img/sidebar-1.jpg">
      
      <div class="logo">
        <a href="{{route('school.dashboard')}}" class="simple-text logo-mini">
          AC
        </a>
        <a href="{{route('school.dashboard')}}" class="simple-text logo-normal">
          academic_central
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="desative ">
            <a href="{{route('colegio.dashboard')}}">
              <i class="now-ui-icons design_app"></i>
              <p>inicio</p>
            </a>
          </li>
          <li>
            <a href="{{route('users.index')}}">
              <i class="now-ui-icons education_atom"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li>
            <a href="{{route('profile.colegio')}}">
              <i class="now-ui-icons users_single-02"></i>
              <p>perfil de usuario</p>
            </a>
          </li>

          <li>
            <a href="{{route('courses.index')}}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>cursos</p>
            </a>
          </li>
          
          
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #7b6d6d;">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">academic_central</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <div class="navbar">
              <form>
                  <div class="input-group no-border">
                      <input type="text" value="" class="form-control" placeholder="Search...">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <i class="now-ui-icons ui-1_zoom-bold"></i>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
            <ul class="navbar-nav">
              <li class="nav-item">
                @if (session('user_type') === 'school')
  <li class="nav-item">
    <a class="nav-link text-success" href="#">
      <i class="now-ui-icons business_bank"></i>
      <p><span class="d-lg-none d-md-block">Sesión colegio activa</span></p>
    </a>
  </li>
@elseif (Auth::check())
  <li class="nav-item">
    <a class="nav-link text-success" href="#">
      <i class="now-ui-icons users_single-02"></i>
      <p><span class="d-lg-none d-md-block">Sesión usuario activa</span></p>
    </a>
  </li>
@else
  <li class="nav-item">
    <a class="nav-link text-danger" href="#">
      <i class="now-ui-icons ui-1_lock-circle-open"></i>
      <p><span class="d-lg-none d-md-block">No autenticado</span></p>
    </a>
  </li>
@endif

<!-- Mostrar nombre -->
<li class="nav-item">
  <a class="nav-link text-white" href="#">
    <i class="now-ui-icons users_single-02"></i>
    <p class="d-none d-lg-block">
      Hola, {{ session('user_type') === 'school' ? session('school_name') : Auth::user()->name }}
    </p>
  </a>
</li>

<!-- Botón de cerrar sesión -->
<li class="nav-item">
  <form action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-dark btn-sm">
      <i class="now-ui-icons media-1_button-power"></i> Cerrar Sesión
    </button>
  </form>
</li>
      
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
  <script>
    $(document).ready(function() {
      if (document.getElementById('chartBig1')) { // Reemplaza 'chartBig1' con el id real del canvas
        demo.initDashboardPageCharts();
      }
    });
  </script>
  
</body>

</html>