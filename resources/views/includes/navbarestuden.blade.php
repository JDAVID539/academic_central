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
        <a href=" class="simple-text logo-mini">
          CT
        </a> <a href="" class="simple-text logo-normal">
          academic_central
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="desative">
            <a href="./dashboard.html">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href=">
              <i class="now-ui-icons education_atom"></i>
              <p></p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="now-ui-icons users_single-02"></i>
              <p>perfil de usuario </p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
          
          <li>
            <a href="./tables.html">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Tareas</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Typography</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
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
    <button type="submit" class="btn btn-danger btn-sm">
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
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>