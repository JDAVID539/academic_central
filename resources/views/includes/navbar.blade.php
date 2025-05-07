<nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #1f1f1f;">
    <link href="../assets/css/login.css" rel="stylesheet" />

    <!-- Logo -->
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo2.png') }}" alt="Logo" width="175" height="75" class="d-inline-block align-text-top">
    </a>

    <!-- Botón de colapso para dispositivos móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenido del navbar -->
   <!-- filepath: vsls:/resources/views/includes/navbar.blade.php -->
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Iniciar sesión</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('colegiio.create') }}">Registrar colegio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('contact.create') }}">contactanos</a>
        </li>
    </ul>
</div>
</nav>
