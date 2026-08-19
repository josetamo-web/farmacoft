@extends('layouts.app')

@section('titulo', 'Farmacoft - Inicio')

@section('contenido')
<div class="contenedor-doble">
    <section id="inicio">
        <h1>Bienvenido a Farmacoft</h1>
        <p>En Farmacoft nos preocupamos por tu salud y la de tu familia.</p>
        <hr>
    </section>

    <section id="servicios">
        <h1>Nuestros Servicios</h1>
        <ul>
            <li><strong>Atencion Rapida:</strong> Compra sin largas filas.</li>
            <li><strong>Receta Medica:</strong> Registro seguro de tus recetas.</li>
            <li><strong>Orientacion:</strong> Asesoramiento sobre dosis y uso.</li>
            <li><strong>Comprobantes:</strong> Boletas y facturas claras.</li>
        </ul>
        <hr>
    </section>
</div>

<section id="catalogo">
    <h1>Medicamentos Destacados</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Medicamento</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <!-- es un como un bucle o if -->
            @forelse ($medicines as $medicine)
            <tr>
                <td>{{ $medicine->nombre }}</td>
                <td>{{ $medicine->descripcion }}</td>
                <td>Bs. {{ number_format($medicine->precio, 2) }}</td>
            </tr>
            <!-- es como el else -->
            @empty
            <tr>
                <td colspan="3">No hay medicamentos registrados por el momento.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <hr>
</section>

<section id="nosotros">
    <h1>Sobre Nosotros</h1>
    <p>Farmacia comprometida con la salud de nuestra comunidad.</p>
    <hr>
</section>

<section id="contacto">
    <h1>Formulario de Contacto</h1>

    @if(session('exito'))
    <p><strong>{{ session('exito') }}</strong></p>
    @endif

    @if(session('error'))
    <p><strong>{{ session('error') }}</strong></p>
    @endif
    <!-- si el usuario esta logueado lo oculta -->
    @guest
    <p><em>Debes <a href="{{ url('/login') }}">iniciar sesión o registrarte como cliente</a> para poder enviar una consulta.</em></p>
    @endguest

    <form id="form-pedido" action="{{ route('contacto.store') }}" method="POST">
        @csrf

        <p>
            <label for="nombre">Tu Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
        </p>

        <p>
            <label for="correo">Tu Correo:</label><br>
            <input type="email" id="correo" name="correo" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
        </p>

        <p>
            <label for="mensaje">Tu Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
        </p>

        <button type="submit">Enviar</button>
    </form>
    <hr>
</section>
@endsection