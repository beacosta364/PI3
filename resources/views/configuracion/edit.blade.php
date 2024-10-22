@extends('layouts.plantilla')

@section('contenido')
<div>
    <h2>Editar IP</h2>
    <form action="{{ route('configuracion.update') }}" method="POST">
        @csrf
        @method('PUT')
        <label for="ip">IP:</label>
        <input type="text" name="ip" value="{{ $configuracion->ip }}" required>
        <button type="submit">Actualizar</button>
    </form>
</div>
@endsection
