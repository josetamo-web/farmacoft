@extends('layouts.app')

@section('titulo', 'Registro de Cliente - Farmacoft')

@section('contenido')
<div>
    <h2>Crear Cuenta de Cliente</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <p>
            <label for="name">Nombre Completo:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </p>

        <p>
            <label for="email">Correo Electrónico:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </p>

        <p>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required>
        </p>

        <p>
            <label for="password_confirmation">Confirmar Contraseña:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </p>

        <button type="submit">Registrarme</button>
    </form>

    <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia Sesión aquí</a></p>
</div>
@endsection