@extends('layouts.plantilla')

@section('contenido')
<div class="container-formulario">  
    <div class="card formulario">
        <h2>Editar Producto: {{ $producto->nombre }}</h2>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Campo Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" id="nombre" name="nombre" required value="{{ old('nombre', $producto->nombre) }}">
            </div>

            <!-- Campo Descripción -->
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>

            <!-- Campo Cantidad -->
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" id="cantidad" name="cantidad" required value="{{ old('cantidad', $producto->cantidad) }}">
            </div>

            <!-- Campo Min_Stock -->
            <div class="form-group">
                <label for="min_stock">Stock Mínimo</label>
                <input type="number" class="form-control" id="min_stock" name="min_stock" value="{{ old('min_stock', $producto->min_stock ?? '') }}">
            </div>

            <!-- Campo Imagen -->
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/*">
                @if ($producto->imagen)
                    <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid">                @endif
            </div>

            <!-- Campo Categoría -->
            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select id="categoria_id" name="categoria_id" required>
                    <option value="" disabled>Categoría:</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->categoria_id ? 'selected' : 'Sin categoria' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botón Guardar Cambios -->
            <div class="form-group">
                <button type="submit">Guardar Cambios</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

