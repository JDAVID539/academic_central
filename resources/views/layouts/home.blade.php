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
            <nav>
                <a href="/">Inicio</a>
                <a href="/caracteristicas">Características</a>
                <a href="/acerca-de">Acerca de</a>
            </nav>
        </header>

        <main>
            @yield('content') {{-- Aquí se insertará el contenido principal de la vista --}}
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} Academic Central</p>
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts') {{-- Aquí se insertarán los scripts específicos de la vista --}}
</body>
</html>

<style>
    /* Estilos generales para el layout de la página de inicio */
    body {
        font-family: 'Nunito', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .home-container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    header {
        background-color: #333;
        color: white;
        padding: 1em 0;
        text-align: center;
    }

    nav a {
        color: white;
        text-decoration: none;
        margin: 0 1em;
    }

    main {
        flex-grow: 1;
        padding: 20px;
    }

    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 1em 0;
    }
</style>