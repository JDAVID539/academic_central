<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - Inicio</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('styles') {{-- Aquí se insertarán los estilos específicos de la vista --}}
</head>
<body></body>
    <div class="home-container">
        <header>
            <nav class="navbar">
                <div class="navbar-brand">
                    <a href="/" class="navbar-item">Inicio</a>
                </div>
                <div class="navbar-menu">
                    <div class="navbar-start">
                        <a href="{{ route('register') }}" class="navbar-item">Registro</a>
                        <a href="/acerca-de" class="navbar-item">Acerca de</a>
                    </div>
                    <div class="navbar-end"> 
                        @auth
                            <a href="{{ route('dashboard') }}" class="navbar-item">Panel</a>
                            <a href="{{ route('logout') }}" class="navbar-item"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="navbar-item">Iniciar sesión</a>
                            <a href="{{ route('register') }}" class="navbar-item">Registrarse</a>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>

        <main>
            @yield('content') {{-- Aquí se insertará el contenido principal de la vista --}}
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} Academic Central</p>
        </footer>
    </div>
</body>
</html>


        