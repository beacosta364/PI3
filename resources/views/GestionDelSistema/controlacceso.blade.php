@extends('layouts.plantilla')

@section('contenido')


<h3>todo el contenido de gestion de acceso a la bodega</h3>

<!-- Controles electonica -->
<section class="Controles">
        <!-- control de acceso a bodega -->
         <!-- <div> -->
            <div class="control-acceso">
            <h2>Control de acceso a bodega</h2>
            <button id="ingresarBodegaBtn">Ingresar a bodega</button>
            <button id="salirBodegaBtn">Salir de bodega</button>
            <p id="statusAcceso">Estado de la puerta: Desconocido</p>
            </div>
            <!-- Control de estado de alarma -->
         
            <!-- <div class="control-alarma">
                <h2>Control de estado de alarma</h2>
                <button id="activarAlarmaBtn">Activar Alarma</button>
                <button id="desactivarAlarmaBtn">Desactivar Alarma</button>
                <p id="statusAlarma">Estado de alarma: Desconocido</p>
            </div> -->
            
</section>

@endsection