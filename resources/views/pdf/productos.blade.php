<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <!-- <link rel="stylesheet" href="{{public_path('css/tabla.pdf.css') }}"> -->
    <link rel="stylesheet" href="{{ base_path('public/css/tabla-pdf.css') }}">
    <link rel="stylesheet" href="{{ base_path('public/css/footer-pdf.css') }}">

</head>
<body>
    <div class="logo-container">
        <img src="{{ base_path('public/img/LogoABY.jpeg') }}" alt="Logo" class="logo">
    </div>
    <h1>Listado de Productos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>{{ $producto->categoria_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <p>Reporte generado el: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
    </footer>
</body>
</html> 

