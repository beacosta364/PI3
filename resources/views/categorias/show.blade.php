@extends('layouts.plantilla')

@section('contenido')
<div class="categoria-detalle-container">
    <h2 class="titulo">Detalles de la Categoría</h2>
    <table class="detalle-tabla">
        <tbody>
            <tr>
                <td><strong>ID:</strong></td>
                <td class="detalle">{{ $categoria->id }}</td>
            </tr>
            <tr>
                <td><strong>Nombre:</strong></td>
                <td class="detalle">{{ $categoria->nombre }}</td>
            </tr>
            <tr>
                <td><strong>Descripción:</strong></td>
                <td class="detalle">{{ $categoria->descripcion }}</td>
            </tr>
            <tr>
                <td><strong>Estado:</strong></td>
                <td class="detalle">{{ $categoria->status == 1 ? 'Activo' : 'Inactivo' }}</td>
            </tr>
        </tbody>
    </table>
    <div class="btn-container">
        <a class="btn-volver" href="{{ route('categorias.index') }}">Volver a la lista de categorías</a>
    </div>
</div>
@endsection
