<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Farmacoft')</title>
    <link rel="stylesheet" href="{{ asset('css/stylo.css') }}">
</head>

<body>

    <header>
        <div>
            <div>
                <h1>Farmacoft</h1>
                <p>Tu farmacia de confianza con atencion rapida y servicio a tu alcance</p>
            </div>

            <!-- Área de Usuario  -->
            <div class="user-bar">
                <button type="button" id="btn-tema" class="boton-modo">modo dia</button>
                <!-- este bloque se muestra si el usuario no ha iniciado sesión -->
                @guest
                <a href="{{ url('/login') }}">Iniciar Sesión</a>
                @endguest

                <!-- este bloque solo se muestra si el usuario está autenticado -->
                @auth
                <span>Hola, <strong>{{ Auth::user()->name }}</strong></span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Cerrar Sesión</button>
                </form>
                @endauth
            </div>
        </div>
    </header>

    <nav>
        <button type="button" class="hamburguesa" id="btn-menu">☰ menu</button>
        <!-- Opción exclusiva para administradores en el menú -->
        @auth
        <!--  condicional que evalúa si el usuario está logueado según su rol -->
        @if(Auth::user()->role === 'admin')
        <a href="{{ url('/admin/panel') }}">Panel Admin</a>
        @endif
        @endauth
        <a href="{{ url('/') }}">Inicio</a>
        <a href="{{ url('/servicios') }}">Servicios</a>
        <a href="{{ url('/catalogo') }}">Medicamentos</a>
        <a href="{{ url('/nosotros') }}">Sobre Nosotros</a>
        <a href="{{ url('/contacto') }}">Contacto</a>
    </nav>

    <main>
        <!-- Aquí se cargará el contenido de cada vista -->
        @yield('contenido')
    </main>

    <button id="btn-arriba" class="boton-arriba">↑</button>

    <footer>
        <p>&copy; {{ date('Y') }} Farmacoft - Todos los derechos reservados.</p>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>