@extends('layouts.app')

@section('titulo', 'Servicios - Farmacoft')

@section('contenido')
<section id="contacto">
    <h1>Formulario de Contacto</h1>
    @if (session('exito'))
    <div class="aviso exito">
        {!! session('exito') !!}
    </div>
    @endif
    <!-- En Laravel el action apunta a una ruta definida -->
    <form id="form-pedido" novalidate action="{{ url('/contacto') }}" method="POST">
        @csrf <!-- Proteccion obligatoria de Laravel contra ataques CSRF -->
        <label for="nombre">tu Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">tu Correo:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="mensaje">tu Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

        <button type="submit">Enviar</button>
        <p id="error-pedido" class="aviso"></p>
    </form>
    <hr>
</section>
@endsection