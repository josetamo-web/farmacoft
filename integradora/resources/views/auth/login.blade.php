@extends('layouts.app')

@section('titulo', 'Iniciar Sesión - Farmacoft')

@section('contenido')
<div style="max-width: 400px; margin: 40px auto;">
    <h2>Iniciar Sesión</h2>

    @if ($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Ingresar</button>
    </form>
    <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí como cliente</a></p>
</div>
@endsection