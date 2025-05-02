<!-- filepath: c:\xampp\htdocs\academic_central\resources\views\includes\navbar.blade.php -->
<nav class="main-header navbar navbar-expand navbar-dark bg-dark">
   <!--estilopara loginnn-->
   <link href="../assets/css/login.css" rel="stylesheet" />

      <!-- Logo -->
      <a class="navbar-brand" href="#">
          <img src="{{ asset('images/logo.png') }}" alt="Logo" width="250" height="60" class="d-inline-block align-text-top">
      </a>

      <!-- Botón de colapso para dispositivos móviles -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Contenido del navbar -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Iniciar sesión</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('colegiio.create') }}">Registrar colegio</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
          </ul>
          <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
      </div>
  </div>
</nav>