
@extends('layouts.plantilla')

@section('contenido')

<div class="container">
    <h1>Gestión de Inventarios</h1>

    <!-- Formulario para movimiento de productos -->
    <form action="{{ route('movimientos.store') }}" method="POST" onsubmit="return validateQuantity()">
        @csrf
        <div class="form-group">
            <label for="producto_id">Seleccione un Producto:</label>
            <select name="producto_id" id="producto_id" class="form-control" required onchange="updateAvailableQuantity()">
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}" data-quantity="{{ $producto->cantidad }}">
                        {{ $producto->nombre }} - Cantidad disponible: {{ $producto->cantidad }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tipo_movimiento">Tipo de Movimiento:</label>
            <select name="tipo_movimiento" id="tipo_movimiento" class="form-control" required>
                <option value="ingreso">Ingreso</option>
                <option value="salida">Extracción</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción (opcional):</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Movimiento</button>
    </form>

    <hr>
</div>

<script>
    function updateAvailableQuantity() {
        const selectedOption = document.querySelector('#producto_id option:checked');
        const availableQuantity = selectedOption.getAttribute('data-quantity');
        document.getElementById('cantidad').setAttribute('max', availableQuantity);
    }

    function validateQuantity() {
        const selectedOption = document.querySelector('#producto_id option:checked');
        const availableQuantity = parseInt(selectedOption.getAttribute('data-quantity'));
        const cantidad = parseInt(document.getElementById('cantidad').value);

        if (document.getElementById('tipo_movimiento').value === 'salida' && cantidad > availableQuantity) {
            alert('La cantidad solicitada supera la cantidad disponible.');
            return false; // Evita el envío del formulario
        }
        return true; // Permite el envío del formulario
    }
</script>

@endsection