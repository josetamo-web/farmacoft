@extends('layouts.app')

@section('content')
    <div style="padding: 20px;">
        <h2>Registrar Herramienta</h2>

        @if ($errors->any())
            <div style="color: red; background-color: #fee; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/herramientas/nuevo') }}" method="POST">
            @csrf

            <div>
                <label for="nombre">Nombre de la herramienta:</label><br>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
            </div>

            <br>

            <div>
                <label for="precio">Precio en Bs:</label><br>
                <input type="number" id="precio" name="precio" value="{{ old('precio') }}">
            </div>

            <br>

            <button type="submit">Registrar herramienta</button>
        </form>

        <br>
        <a href="{{ url('/herramientas') }}">⬅ Volver al inventario</a>
    </div>
@endsection