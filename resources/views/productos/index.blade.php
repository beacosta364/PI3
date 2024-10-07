@extends('layouts.plantilla')

@section('contenido')
<section class="container-tabla">
    <h2 class="titulo-tabla">Productos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Categoría</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>
                    @if ($producto->imagen)
                        <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-producto">
                    @else
                        Sin imagen
                    @endif
                </td>
                @if ($producto->categoria)
                <td>{{ $producto->categoria->nombre }}</td> <!-- Asumiendo que tienes una relación con la categoría -->
                @else Sin categoria
                @endif
                <td>
                    <a href="{{ route('productos.show', [$producto->id]) }}">
                        <img src="img/view.png" alt="" class="icono-accion">
                    </a>
                    <a href="{{ route('productos.edit', [$producto->id]) }}">
                        <img src="img/edit.png" alt="" class="icono-accion">
                    </a>
                    @can('productos.destroy')
                    <form action="{{ route('productos.destroy', [$producto->id]) }}" method="POST" onsubmit="return confimarEliminacion()">
                        @csrf
                        @method('DELETE')
                        <input type="image" src="img/delete.png" alt="Eliminar" class="icono-accion">
                    </form>
                    @endcan
                    <script>
                        function confimarEliminacion() {
                            return confirm('¿Seguro deseas eliminar?'); // Muestra el mensaje de confirmación
                        }
                    </script>
                </td>

            </tr>
            @endforeach          
        </tbody>
    </table>
</section>
@endsection
