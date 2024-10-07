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
    


    <!-- Scripts -->
    <!-- este script esta generando problemas con el hamburguer -->
    <!-- arreglarlo o cambiar los estilos para el area  de perfil de usuario-->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    @vite(['resources/js/app.js'])
  


</head>
<body>
  <!-- slidebar   -->
   <aside class="slidebar" id="slidebar">
    <span><h1>ABY</h1></span>
    
    <!-- Logo Empresa -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn profile">
         <span><img src="{{asset('img/logoLaPapa.jpg')}}" alt="Logo"></span>
         <p>La Papa</p>
        </div>
    </div>
    <!-- PERFIL -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn profile">
         <span><img src="{{asset('img/face2.jpg')}}" alt="avatar"></span>
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
         <span><img src="{{asset('img/box1.png')}}" alt="Gestion del sistema"></span>
         <p>Gestion del sistema</p>
        </div>
        <div class="element-slidebar-content">
         <a href="{{ route('gestioninventarios') }}">Gestion del inventarios</a>
         <a href="{{ route('gestionusuarios') }}">Gestion de usuarios</a>
         <a href="{{ route('controlacceso') }}">Control de acceso</a>
         <a href="{{ route('alarma') }}">Gestion de Alarma</a>
         <!-- <a href="">Proveedores</a> -->
        </div>
    </div>
    <!--Categoria Productos-->
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
            <span><img src="{{asset('img/box1.png')}}" alt="Gestion del categorias"></span>
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
            <span><img src="{{ asset('img/box1.png') }}" alt="Gestion de productos"></span>
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
         <span><img src="{{asset('img/security.png')}}" alt="Monitoreo y seguridad"></span>
         <p>Monitoreo y seguridad</p>
        </div>
        <div class="element-slidebar-content">
            <a href="">Auditoria</a>
            <a href="">Notificaciones</a>
            <a href="">analisis y estadisticas</a>

        </div>
    </div>
    <!-- Configuración y soporte -->
    <div class="element-slidebar">
        <div class="element-slidebar-btn">
         <span><img src="{{asset('img/Configutration1.png')}}" alt="Configuración y soporte"></span>
         <p>Configuración y soporte</p>
        </div>
        <div class="element-slidebar-content">
            <a href="">Configuración</a>
            <a href="">Soporte y documentación</a>

        </div>
        <!-- Reportes -->
        <div class="element-slidebar">
            <div class="element-slidebar-btn">
             <span><img src="{{asset('img/Reports.png')}}" alt="Reportes"></span>
             <p>Reportes</p>
            </div>
            <div class="element-slidebar-content">
                <a href="">Reportes de inventarios</a>
                <a href="">Reportes de usuarios</a>
                <a href="">Reportes de proveedores</a>
                <a href="">Reportes financieros</a>
    
            </div>
        </div>
    </div>
   </aside>

   <!-- main -->
   <main class="main">
    <!-- header -->
    <header class="header">
        <h2>dasboard</h2>
        <button id="menu-toggle" class="menu-hamburger">☰</button>
    </header>

    
    <!-- aqui se coloca todos los elementos cambiantes  -->

       @yield('contenido')

   </main>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>