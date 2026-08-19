@extends('layouts.app')

@section('content')
    <div style="padding: 20px;">
        <p>Ferretería El Tornillo es tu tienda local de confianza, especializada en herramientas de alta calidad para construcción y mantenimiento.</p>

        <p><strong>Hay {{ count($herramientas) }} herramientas en el inventario.</strong></p>

        <p><a href="{{ url('/herramientas/nuevo') }}"> Registrar nueva herramienta</a></p>

        <hr>

        <ul>
            @foreach ($herramientas as $herramienta)
                <li>
                    <strong>{{ $herramienta->nombre }}</strong> - {{ $herramienta->precio }} Bs
                </li>
            @endforeach
        </ul>

        <hr>
        <p><em>Inventario atendido por jose fernando tamo mejia</em></p>
    </div>
@endsection