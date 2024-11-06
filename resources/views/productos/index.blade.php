@extends('layouts.plantilla')

@section('contenido')
<section class="container-tabla">
    <h2 class="titulo-tabla">Productos</h2>
    <div class="botones-superiores">
        <a href="{{ route('pdfProductos') }}" target="_blank" class="btn-generar-pdf">Generar PDF</a>
        @can('productos.create')
        <a href="{{ route('productos.create') }}" class="btn-agregar">Agregar Producto</a>
        @endcan
    </div>
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
                        <img src="img/Vista.png" alt="" class="icono-accion">
                    </a>
                    <a href="{{ route('productos.edit', [$producto->id]) }}">
                        <img src="img/Editar.png" alt="" class="icono-accion">
                    </a>
                    @can('productos.destroy')
                    <form action="{{ route('productos.destroy', [$producto->id]) }}" method="POST" onsubmit="return confimarEliminacion()">
                        @csrf
                        @method('DELETE')
                        <input type="image" src="img/Eliminar.png" alt="Eliminar" class="icono-accion">
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
    

    <!-- Paginación personalizada -->
    <div class="pagination">
        @if ($productos->onFirstPage())
            <span class="disabled">« Anterior</span>
        @else
            <a href="{{ $productos->previousPageUrl() }}">« Anterior</a>
        @endif

        @for ($i = 1; $i <= $productos->lastPage(); $i++)
            @if ($i == $productos->currentPage())
                <span class="current">{{ $i }}</span>
            @else
                <a href="{{ $productos->url($i) }}">{{ $i }}</a>
            @endif
        @endfor

        @if ($productos->hasMorePages())
            <a href="{{ $productos->nextPageUrl() }}">Siguiente »</a>
        @else
            <span class="disabled">Siguiente »</span>
        @endif
    </div>
</section>

@endsection
