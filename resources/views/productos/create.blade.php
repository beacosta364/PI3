@extends('layouts.plantilla')

@section('contenido')
<!-- Mostrar formulario para crear nuevo producto -->
<div class="container-formulario">
    <div class="card formulario">
        <h2>Crear Nuevo Producto</h2>
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Campo Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <!-- Campo Descripción -->
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>

            <!-- Campo Cantidad -->
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" id="cantidad" name="cantidad" required>
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
            </div>

            <!-- Campo Categoría -->
            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select id="categoria_id" name="categoria_id" required>
                    <option value=""disabled selected>categoria:</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botón Guardar -->
            <div class="form-group">
                <button type="submit">Guardar Producto</button>
            </div>
        </form>
    </div>
</div>
@endsection
