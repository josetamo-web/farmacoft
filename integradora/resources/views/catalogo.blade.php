@extends('layouts.app')

@section('titulo', 'Catálogo de Medicamentos - Farmacoft')

@section('contenido')
<section id="catalogo" style="padding: 20px;">
    <h1>Medicamentos Destacados</h1>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>Medicamento</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($medicines as $medicine)
                <tr>
                    <td><strong>{{ $medicine->nombre }}</strong></td>
                    <td>{{ $medicine->descripcion }}</td>
                    <td>Bs. {{ number_format($medicine->precio, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Por el momento no hay medicamentos en el catálogo.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</section>
@endsection