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
<body>
    <div class="home-container">
        <header>
            <nav class="navbar" style="background: linear-gradient(90deg, #4b6cb7, #182848); color: rgb(211, 56, 56); padding: 1rem;">
                <div class="navbar-brand">
                    <a href="/" class="navbar-item" style="color: white; font-weight: bold;">Inicio</a>
                </div>
                <div class="navbar-menu">
                    <div class="navbar-start">
                        <a href="/acerca-de" class="navbar-item" style="color: white;">Acerca de</a>
                    </div>
                    <div class="navbar-end"> 
                        @auth
                            <a href="{{ route('dashboard') }}" class="navbar-item" style="color: white;">Panel</a>
                            <a href="{{ route('logout') }}" class="navbar-item" style="color: white;"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="navbar-item" style="color: white;">Iniciar sesión</a>
                            <a href="{{ route('register') }}" class="navbar-item" style="color: white;">Registrarse</a>
                        @endauth
                    </div>
                </div>
            </nav>
            <div class="home-images" style="display: flex; justify-content: center; gap: 1rem; margin-top: 1rem;">
                <img src="{{ asset('images/home1.jpg') }}" alt="Home Image 1" style="width: 45%; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <img src="{{ asset('images/home2.jpg') }}" alt="Home Image 2" style="width: 45%; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            </div>
        </header>

        <main>
            @yield('content') {{-- Aquí se insertará el contenido principal de la vista --}}
        </main>

        <footer style="text-align: center; margin-top: 2rem; padding: 1rem; background-color: #182848; color: white;">
            <p>&copy; {{ date('Y') }} Academic Central</p>
        </footer>
    </div>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #89f7fe, #66a6ff);
            animation: backgroundMove 10s infinite alternate;
        }

        .navbar {
            background: linear-gradient(90deg, #ff7e5f, #feb47b); /* Nuevo color cálido para el navbar */
            color: white;
        }

        @keyframes backgroundMove {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }
    </style>
</body>
</html>
{{-- Removed script for buttons --}}

        