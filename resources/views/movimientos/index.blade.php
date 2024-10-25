<!-- este es para la vista de los movimientos de productos que se ha realizado -->
@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <h1>Reportes de Movimientos</h1>

    <div class="form-group">
        <label for="search">Buscar Movimiento Por Producto:</label>
        <input type="text" id="search" class="form-control" placeholder="Buscar por producto..." onkeyup="filterMovements()">
    </div>

    <div class="form-group">
        <label for="user_search">Buscar por Usuario:</label>
        <input type="text" id="user_search" class="form-control" placeholder="Buscar por usuario..." onkeyup="filterByUser()">
    </div>

    <div class="form-group">
        <label for="start_date">Fecha de Inicio:</label>
        <input type="datetime-local" id="start_date" class="form-control" onchange="filterByDateRange()">
    </div>

    <div class="form-group">
        <label for="end_date">Fecha de Fin:</label>
        <input type="datetime-local" id="end_date" class="form-control" onchange="filterByDateRange()">
    </div>

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
                <td>{{ $movimiento->created_at->format('d-m-Y H:i') }}</td>
                <td>{{ $movimiento->usuario->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Paginación personalizada -->
<div class="pagination">
    @if ($movimientos->onFirstPage())
        <span class="disabled">« Anterior</span>
    @else
        <a href="{{ $movimientos->previousPageUrl() }}">« Anterior</a>
    @endif

    @for ($i = 1; $i <= $movimientos->lastPage(); $i++)
        @if ($i == $movimientos->currentPage())
            <span class="current">{{ $i }}</span>
        @else
            <a href="{{ $movimientos->url($i) }}">{{ $i }}</a>
        @endif
    @endfor

    @if ($movimientos->hasMorePages())
        <a href="{{ $movimientos->nextPageUrl() }}">Siguiente »</a>
    @else
        <span class="disabled">Siguiente »</span>
    @endif
</div>

</div>

<script>
function filterMovements() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const productName = row.cells[0].textContent.toLowerCase();
        if (productName.includes(searchInput)) {
            row.style.display = ''; // Muestra la fila si coincide
        } else {
            row.style.display = 'none'; // Oculta la fila si no coincide
        }
    });
}

function filterByUser() {
    const userSearchInput = document.getElementById('user_search').value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const userName = row.cells[5].textContent.toLowerCase(); // Asumiendo que el nombre del usuario está en la sexta columna (índice 5)
        if (userName.includes(userSearchInput)) {
            row.style.display = ''; // Muestra la fila si coincide
        } else {
            row.style.display = 'none'; // Oculta la fila si no coincide
        }
    });
}

function filterByDateRange() {
    const startDateInput = document.getElementById('start_date').value;
    const endDateInput = document.getElementById('end_date').value;
    const rows = document.querySelectorAll('tbody tr');

    // Convertir las fechas ingresadas a objetos de fecha de JavaScript
    const startDate = startDateInput ? new Date(startDateInput) : null;
    const endDate = endDateInput ? new Date(endDateInput) : null;

    // Ajustar la fecha de fin para incluir todo el día
    if (endDate) {
        endDate.setHours(23, 59, 59, 999); // Establecer la hora a 23:59:59.999 para incluir todo el día
    }

    rows.forEach(row => {
        // Obtener la fecha del texto de la celda y convertirla
        const rowDateText = row.cells[4].textContent; // Asumiendo que la fecha está en la quinta columna (índice 4)
        const [day, month, yearTime] = rowDateText.split('-');
        const [year, time] = yearTime.split(' ');
        const rowDate = new Date(`${year}-${month}-${day}T${time}:00`); // Convertir al formato ISO

        // Comprobar si la fila debe ser mostrada según el rango de fechas
        const showRow = (startDate === null || rowDate >= startDate) && (endDate === null || rowDate <= endDate);
        row.style.display = showRow ? '' : 'none'; // Muestra o oculta la fila
    });
}
</script>
@endsection
