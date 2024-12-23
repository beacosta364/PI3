<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">


    <!-- <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/estilos-tablas.css">
    <link rel="stylesheet" href="css/estilos-formularios.css"> -->


    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos-tablas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos-show-productos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos-formularios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos-categoria-detalle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Scripts -->
    <!-- este script esta generando problemas con el hamburguer -->
    <!-- arreglarlo o cambiar los estilos para el area  de perfil de usuario-->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    @vite(['resources/js/app.js'])
  


</head>
<body>
  <!-- slidebar   -->
   <aside class="slidebar" id="slidebar">
    <!-- <span><h1>ABY</h1></span> -->
    <span class="logooo"><img src="{{asset('img/ABY.png')}}" alt="LOGO"></span>
    
    <!-- Logo Empresa -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn profile">
         <span><img src="{{asset('img2/LogoLaPapa.png')}}" alt="Logo"></span>
         <p>La Papa</p>
        </div>
    </div>
    <!-- PERFIL -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn profile">
         <span><img src="{{asset('img/Admin.png')}}" alt="avatar"></span>
         <p>{{Auth::User()->name}}</p>
        </div>
        <div class="element-slidebar-content">
            <a href="{{route('profile.edit')}}">Perfil</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <input type="submit" value="Salir"class=logout-link>
            </form>

        </div>
    </div>
    <!-- Gestion del sistema -->
    
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
         <span><img src="{{asset('img/GestionDelSistema.png')}}" alt="Gestion del sistema"></span>
         <p>Gestion del sistema</p>
        </div>
        <div class="element-slidebar-content">
         <a href="{{ route('gestioninventarios') }}">Gestion de inventarios</a>
         <!-- <a href="{{ route('gestionusuarios') }}">Gestion de usuarios</a> -->
         <!-- <a href="{{ route('controlacceso') }}">Control de acceso</a> -->
          
         <a href="{{ route('configuracion.control') }}">Ir a la gestión de alarma y acceso</a>

         @can('usuarios.index')
         <a href="{{ route('users.index') }}">Lista de usuarios registrados</a>
         @endcan

         <a href="{{ route('productos.agotados') }}" class="btn btn-warning">Ver Productos Agotados o Por Agotarse</a>
         <!-- <a href="{{ route('alarma') }}">Gestion de Alarma</a> -->
         <!-- <a href="">Proveedores</a> -->
        </div>
    </div>
    <!--Categoria Productos-->
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
            <span><img src="{{asset('img/Categoria.png')}}" alt="Gestion del categorias"></span>
            <p>Categorias</p>
        </div>
        <div class="element-slidebar-content">
            <a href="{{ route('categorias.index') }}">Todas</a>
            
            @can('categorias.create')
            <a href="{{ route('categorias.create') }}">Agregar</a>
            @endcan
        </div>
    </div>


    <!-- Gestion de Productos -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
            <span><img src="{{ asset('img/Productos.png') }}" alt="Gestion de productos"></span>
            <p>Productos</p>
        </div>
        <div class="element-slidebar-content">
            <a href="{{ route('productos.index') }}">Todos</a>
            
            @can('productos.create')
            <a href="{{ route('productos.create') }}">Agregar</a>
            @endcan
        </div>
    </div>


    <!-- Monitoreo y seguridad -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
         <span><img src="{{asset('img/MonitoreodeSeguridad.png')}}" alt="Monitoreo y seguridad"></span>
         <p>Monitoreo y seguridad</p>
        </div>
        <div class="element-slidebar-content">
            @can('auditoria.view')
            <a href="">Auditoria</a>
            @endcan

            @can('notificaciones.view')
            <a href="">Notificaciones</a>
            @endcan

            @can('estadisticas.view')
            <a href="">analisis y estadisticas</a>
            @endcan

        </div>
    </div>
    <!-- Configuración y soporte -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
         <span><img src="{{asset('img/ConfiguracionyReportes.png')}}" alt="Configuración y soporte"></span>
         <p>Configuración y soporte</p>
        </div>
        <div class="element-slidebar-content">
            <a href="{{ route('configuracion.create') }}">Configuración</a>
            <a href="">Soporte y documentación</a>

        </div>
        <!-- Reportes -->  
        @can('reportes.inventarios')  
        <div class="element-slidebar">
            <div class="element-slidebar-btn">
                <span><img src="{{asset('img/Reportes.png')}}" alt="Reportes"></span>
                <p>Reportes</p>
            </div>
            <div class="element-slidebar-content"> 
                @can('reportes.inventarios')         
                <a href="">Reportes de inventarios</a>
                @endcan

                @can('reportes.movimientos')
                <a href="{{ route('movimientos.reportes') }}">Reportes de movimientos</a>
                @endcan

                @can('reportes.proveedores')
                <a href="">Reportes de proveedores</a>  
                @endcan  

                @can('reportes.financieros')
                <a href="">Reportes financieros</a>
                @endcan
            </div>
                
        </div>
        @endcan
           
    </div>
   </aside>

   <!-- main -->
   <main class="main">
    <!-- header -->
    <header class="header">
        <!-- <h2>dashboard</h2> -->
        <button id="menu-toggle" class="menu-hamburger">☰</button>
    </header>

    
    <!-- aqui se coloca todos los elementos cambiantes  -->

       @yield('contenido')

   </main>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>