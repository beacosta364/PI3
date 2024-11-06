@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <h1>Detalles del Producto: {{ $producto->nombre }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nombre: {{ $producto->nombre }}</h5>
            <p class="card-text">Descripción: {{ $producto->descripcion }}</p>
            <p class="card-text">Cantidad: {{ $producto->cantidad }}</p>
            <!-- <p class="card-text">Precio: ${{ number_format($producto->precio, 2) }}</p> -->
            @if ($producto->imagen)
                <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid">
            @endif

            <p class="card-text">Categoría: {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
        </div>
    </div>
    
    <a href="{{ route('productos.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
</div>
@endsection



