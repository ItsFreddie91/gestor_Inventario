<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel de Control</title>

    <!--Estilos-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    
    

</head>
<body class="fondo">

    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <ion-icon id="nube" name="briefcase"></ion-icon>
                <span class="botones_textos">Gestor</span>
            </div>
            <a class="boton" href="{{route('Agregar_Productos')}}">
                <ion-icon name="add-outline"></ion-icon>
                <span class="botones_textos">Agregar</span>
            </a>
        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a href="{{route('Admin_Inicio')}}">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <span class="botones_textos">Productos</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Agregar_Usuarios')}}">
                        <ion-icon name="person-outline"></ion-icon>
                        <span class="botones_textos">Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Pedidos')}}">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                        <span class="botones_textos">Pedidos</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Movimientos')}}">
                        <ion-icon name="swap-horizontal-outline"></ion-icon>
                        <span class="botones_textos">Entradas y Salidas</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Vista_Reportes')}}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span class="botones_textos">Reportes</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Vista_Sucursales')}}">
                        <ion-icon name="storefront-outline"></ion-icon>
                        <span class="botones_textos">Sucursales</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('Mostrar_Proveedores')}}">
                        <ion-icon name="subway-outline"></ion-icon>
                        <span class="botones_textos">Proveedores</span>
                    </a>
                </li>
                <form action="{{route('Logout')}}" method="POST">
                    @csrf
                    <li>
                        <a href="#" onclick="this.closest('form').submit()">
                            <ion-icon name="log-out-outline"></ion-icon>
                            <span class="botones_textos">Salir</span>
                        </a>
                    </li>
                </form>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>
            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span class="botones_textos">Dark Mode</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">
                            
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="usuario">
                <div class="info-usuario">
                    <div class="nombre-email">
                        @auth
                            <span class="nombre botones_textos">Sesión Iniciada</span>
                            <span class="email botones_textos">{{ Auth::user()->correo_usuario }}</span>
                        @else
                            <h5>No hay sesión</h5>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Contenido-->
    <main>

        @yield('Contenido')

        @yield('Pedidos')

        @yield('Agregar_Productos')

        @yield('Modificar_Productos')

        @yield('Agregar_Usuarios')

        @yield('Reportes')
        
        @yield('Sucursales')

        @yield('Modificar_Sucursal')

        @yield('Modificar_Usuarios')

        @yield('Modificar_Proveedores')

        @yield('Mostrar_Proveedores')

        @yield('Movimientos')
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('js/Sidebar.js')}}"></script>
</body>
</html>
