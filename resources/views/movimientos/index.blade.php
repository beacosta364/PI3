<!-- lo que se esta usando es gestioninventarios.blade.php y no este -->
@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <h1>Reportes de Movimientos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Tipo de Movimiento</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movimientos as $movimiento)
            <tr>
                <td>{{ $movimiento->producto->nombre }}</td>
                <td>{{ $movimiento->cantidad }}</td>
                <td>{{ $movimiento->tipo_movimiento }}</td>
                <td>{{ $movimiento->descripcion }}</td>
                <td>{{ $movimiento->created_at }}</td>
                <td>{{ $movimiento->Usuario->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
