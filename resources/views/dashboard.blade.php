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
         <div class="card">
            <div class="cabecera">
                <img src="{{ asset('img/Productos.png') }}" alt="">
                <div class="cabecera-text">
                </div>   
            </div>
            <a href="{{ route('productos.index') }}">Productos</a>
         </div>
           <!-- Configuración y soporte -->
           <div class="card">
            <div class="cabecera">
                <img src="img/Admin.png" alt="">
                <div class="cabecera-text">
                </div>
               
            </div>
            <a href="{{ route('gestionusuarios') }}">Gestion de usuarios</a>
        </div>   
        <!-- Reportes -->
        <div class="card">
            <div class="cabecera">
                <img src="img/Reportes.png" alt="">
                <div class="cabecera-text"> 
                </div>  
            </div>
            <a href="{{ route('movimientos.reportes') }}">Reportes de movimientos</a>
         </div>
    </section >
<!-- graficas -->
    <section class="container-graficas">
        <div class="card">
            <h3>Lista de productos por agotarse o agotados</h3>
            <div class="contenedor-imagen">
                <img src="img/vntasmes.png" alt="">
            </div>
            <p>Periodo : 2024</p>
        </div>
        
            <div class="card">
                <h3>grafica de productos mas usados o alguna grafica</h3>
                <h3>o en su defecto eliminar</h3>
                <div class="contenedor-imagen">
                    <img src="img/vntasmes.png" alt="">
                </div>
                <p>Periodo : 2024</p>
            </div>

    </section>

</h1>
@endsection