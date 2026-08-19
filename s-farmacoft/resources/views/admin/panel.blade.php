@extends('layouts.app')

@section('titulo', 'Panel Admin - Farmacoft')

@section('contenido')
<div>
    <h2>Panel de Administración</h2>
    <p>Bienvenido al área de gestión de Farmacoft, <strong>{{ Auth::user()->name }}</strong>.</p>
    <hr>

    @if(session('exito'))
    <div>
        <p><strong>{{ session('exito') }}</strong></p>
    </div>
    @endif
    <!-- Formulario para Registrar Usuarios (Admin o Cliente) -->
    <div>
        <h3>Registrar Nuevo Usuario</h3>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <p>
                <label for="name">Nombre Completo:</label><br>
                <input type="text" id="name" name="name" required>
            </p>

            <p>
                <label for="email">Correo Electrónico:</label><br>
                <input type="email" id="email" name="email" required>
            </p>

            <p>
                <label for="password">Contraseña:</label><br>
                <input type="password" id="password" name="password" required>
            </p>

            <p>
                <label for="role">Rol del Usuario:</label><br>
                <select id="role" name="role" required>
                    <option value="cliente">Cliente</option>
                    <option value="admin">Administrador</option>
                </select>
            </p>

            <button type="submit">Crear Usuario</button>
        </form>
    </div>

    <hr>

    <!-- Formulario para Registrar Nuevo Medicamento -->
    <div>
        <h3>Registrar Nuevo Medicamento</h3>

        <form action="{{ route('medicines.store') }}" method="POST">
            @csrf

            <p>
                <label for="nombre">Nombre del Medicamento:</label><br>
                <input type="text" id="nombre" name="nombre" required>
            </p>

            <p>
                <label for="descripcion">Descripción:</label><br>
                <textarea id="descripcion" name="descripcion" rows="3" required></textarea>
            </p>

            <p>
                <label for="precio">Precio (Bs.):</label><br>
                <input type="number" step="0.01" id="precio" name="precio" required>
            </p>

            <p>
                <label for="stock">Cantidad / Stock:</label><br>
                <input type="number" id="stock" name="stock" required>
            </p>

            <button type="submit">Guardar Medicamento</button>
        </form>
    </div>

    <hr>

    <!-- Tabla de Gestión de Medicamentos Registrados -->
    <div>
        <h3>Lista de Medicamentos</h3>

        <table border="1">
            <thead>
                <tr>

                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($medicines as $medicine)
                <tr>
                    <form action="{{ route('medicines.update', $medicine->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <td>
                            <input type="text" name="nombre" value="{{ $medicine->nombre }}" required>
                        </td>
                        <td>
                            <input type="text" name="descripcion" value="{{ $medicine->descripcion }}" required>
                        </td>
                        <td>
                            <input type="number" step="0.01" name="precio" value="{{ $medicine->precio }}" required>
                        </td>
                        <td>
                            <input type="number" name="stock" value="{{ $medicine->stock }}" required>
                        </td>
                        <td>
                            <button type="submit">Actualizar</button>
                    </form>

                    <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este medicamento?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No hay medicamentos registrados todavía.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tabla de Mensajes de Contacto Recibidos -->
    <div>
        <h3>Mensajes de Contacto Recibidos</h3>

        <table border="1">
            <thead>
                <tr>

                    <th>Cliente</th>
                    <th>Correo</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                <tr>

                    <td>{{ $contact->nombre }}</td>
                    <td>{{ $contact->correo }}</td>
                    <td>{{ $contact->mensaje }}</td>
                    <td>{{ $contact->created_at->timezone('America/La_Paz')->format('d/m/Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No hay mensajes de contacto aún.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection