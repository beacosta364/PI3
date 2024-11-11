@extends('layouts.plantilla')

@section('contenido')


<section class="container-cards">
        <!-- Gestion del sistema -->
         <div class="card">
            <div class="cabecera">
                <img src="img/GestionDelSistema.png" alt=" ">
                <div class="cabecera-text">
                </div> 
            </div>
            <a href="{{ route('gestioninventarios') }}">Gestion del inventario</a>
         </div>
          <!-- Monitoreo y seguridad -->
         <!-- <div class="card">
            <div class="cabecera">
                <img src="{{ asset('img/Productos.png') }}" alt="">
                <div class="cabecera-text">
                </div>   
            </div>
            <a href="{{ route('productos.index') }}">Productos</a>
         </div> -->
         <div class="card">
            <div class="cabecera">
                <img src="{{ asset('img/Productos.png') }}" alt="">
                <div class="cabecera-text">
                {{ $numeroProductos }} productos registrados
                </div>
            </div>
            <a href="{{ route('productos.index') }}">
                Productos 
            </a>
        </div>
           <!-- Configuración y soporte -->
           <!-- <div class="card">
            <div class="cabecera">
                <img src="img/Admin.png" alt="">
                <div class="cabecera-text">
                </div>
               
            </div>
            <a href="{{ route('gestionusuarios') }}">Gestion de usuarios</a>
        </div>    -->
        <div class="card">
            <div class="cabecera">
                <img src="img/Admin.png" alt="">
                <div class="cabecera-text">
               {{ $numeroUsuarios }} usuarios registrados
                </div>
            </div>
            <a href="{{ route('gestionusuarios') }}">Gestion de usuarios </a>
        </div>
        <!-- Reportes -->
        <!-- <div class="card">
            <div class="cabecera">
                <img src="img/Reportes.png" alt="">
                <div class="cabecera-text"> 
                </div>  
            </div>
            <a href="{{ route('movimientos.reportes') }}">Reportes de movimientos</a>
         </div> -->
         <div class="card">
            <div class="cabecera">
                <img src="img/Reportes.png" alt="">
                <div class="cabecera-text"> 
                se han realizado {{ $numeroMovimientos }} movimientos este mes
                </div>  
            </div>
            <a href="{{ route('movimientos.reportes') }}">
                Reportes de movimientos 
            </a>
        </div>
    </section >
<!-- graficas -->
    <section class="container-graficas">
        <!-- <div class="card">
            <h3>Lista de productos por agotarse o agotados</h3>
            <div class="contenedor-imagen">
                <img src="img/vntasmes.png" alt="">
            </div>
            <p>Periodo : 2024</p>
        </div> -->
            <div class="card">
                <h3>Lista de productos por agotarse o agotados</h3>

                @if($productosAgotados->isEmpty())
                    <p>No hay productos por agotarse o agotados en este momento.</p>
                @else
                    <table class="tabla-productos">
                        <thead>
                            <tr>
                                <th>Nombre del Producto</th>
                                <th>Cantidad</th>
                                <th>Stock Mínimo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productosAgotados as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->cantidad }}</td>
                                    <td>{{ $producto->min_stock }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        
            <div class="card"> 
    <h3>Gráfica de productos más usados en el mes (Unidades retiradas)</h3>
    <div class="contenedor-imagen">
        <canvas id="graficaProductosMasUsados"></canvas>
    </div>
    <p>Periodo : {{ date('Y') }}</p>
</div>

<script>
    const labels = @json($productosLabels);
    const data = @json($productosValores);

    const ctx = document.getElementById('graficaProductosMasUsados').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Unidades retiradas',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
</script>


    </section>

</h1>
@endsection