@extends('layouts.plantilla')

@section('contenido')

<h3>Gestión de Alarma y Acceso</h3>

<!-- Controles electrónica -->
<section class="Controles">
    <!-- Control de acceso a bodega -->
    <div class="control-acceso">
        <h2>Control de acceso a bodega</h2>
        <button id="ingresarBodegaBtn">Ingresar a bodega</button>
        <button id="salirBodegaBtn">Salir de bodega</button>
        <p id="statusAcceso">Estado de la puerta: Desconocido</p>
    </div> 

    <!-- Control de estado de alarma -->
    <div class="control-alarma">
        <h2>Control de estado de alarma</h2>
        <button id="activarAlarmaBtn">Activar Alarma</button>
        <button id="desactivarAlarmaBtn">Desactivar Alarma</button>
        <p id="statusAlarma">Estado de alarma: Desconocido</p>
    </div>
</section>

<script>
    // Obtener la IP desde el controlador usando Blade
    const ipAddress = "{{ $configuracion->ip }}"; // Asigna la IP desde la base de datos

    console.log('IP desde la base de datos:', ipAddress);

    // Función para ingresar a la bodega (Encender LED 1)
    document.getElementById("ingresarBodegaBtn").addEventListener("click", function() {
        fetch(`http://${ipAddress}/on1`)
            .then(response => response.text())
            .then(data => {
                if (data === "LED 1 Encendido") {
                    document.getElementById("statusAcceso").textContent = "Estado de la puerta: Abierta";
                } else {
                    document.getElementById("statusAcceso").textContent = "Estado de la puerta: Desconocido";
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Función para salir de la bodega (Apagar LED 1)
    document.getElementById("salirBodegaBtn").addEventListener("click", function() {
        fetch(`http://${ipAddress}/off1`)
            .then(response => response.text())
            .then(data => {
                if (data === "LED 1 Apagado") {
                    document.getElementById("statusAcceso").textContent = "Estado de la puerta: Cerrada";
                } else {
                    document.getElementById("statusAcceso").textContent = "Estado de la puerta: Desconocido";
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Función para activar la alarma
    document.getElementById("activarAlarmaBtn").addEventListener("click", function() {
        fetch(`http://${ipAddress}/on2`)
            .then(response => response.text())
            .then(data => {
                if (data === "Alarma Activada") {
                    document.getElementById("statusAlarma").textContent = "Estado de la alarma: Activada";
                } else {
                    document.getElementById("statusAlarma").textContent = "Estado de la alarma: Desconocido";
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Función para desactivar la alarma
    document.getElementById("desactivarAlarmaBtn").addEventListener("click", function() {
        fetch(`http://${ipAddress}/off2`)
            .then(response => response.text())
            .then(data => {
                if (data === "Alarma Desactivada") {
                    document.getElementById("statusAlarma").textContent = "Estado de la alarma: Desactivada";
                } else {
                    document.getElementById("statusAlarma").textContent = "Estado de la alarma: Desconocido";
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>

@endsection
