
@extends('layouts.plantilla')

@section('contenido')

<div class="container">
    <h1>Gestión de Inventarios</h1>

    
    <form action="{{ route('movimientos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="producto_id">Seleccione un Producto:</label>
            <select name="producto_id" id="producto_id" class="form-control" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">
                        {{ $producto->nombre }} - Cantidad disponible: {{ $producto->cantidad }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tipo_movimiento">Tipo de Movimiento:</label>
            <select name="tipo_movimiento" id="tipo_movimiento" class="form-control" required>
                <option value="entrada">Ingreso</option>
                <option value="salida">Extracción</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Movimiento</button>
    </form>

    <hr>
</div>
@endsection