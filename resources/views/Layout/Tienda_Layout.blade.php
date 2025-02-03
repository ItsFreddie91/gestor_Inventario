<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <header class="bg-barra py-3 mb-3 border-bottom">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
            <div class="dropdown">
                <a href="#"
                    class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-body-emphasis text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('Img/Logo1.png')}}" alt="no se cargo" width="45px">
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="{{route('Index')}}">Inicio</a></li>
                    <li><a class="dropdown-item" href="{{route('Mis_compras')}}">Mis compras</a></li>
                </ul>
            </div>
    
            <div class="d-flex align-items-center">
                <form class="w-100 justify-content-center" action="{{route('Buscar_Producto')}}" method="GET" role="search">
                    <!-- Barra de búsqueda responsiva -->
                    <div class="input-group w-75 w-sm-100 shadow-sm">
                        <input 
                            type="search" 
                            class="form-control border-end-0" 
                            placeholder="Buscar productos..." 
                            aria-label="Buscar productos" 
                            aria-describedby="button-search"
                            name="busqueda"
                            autocomplete="off"
                        >
                    </div>
                </form>
            
                <div class="px-3">
                    <a href="{{route('Cart')}}" class="position-relative">
                        <i class="fa-solid fa-cart-shopping fa-2xl" style="color: #1f1f1f;"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ Cart::count() > 99 ? '99+' : Cart::count() }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </div>
            
                <div class="flex-shrink-0 dropdown">
                    <a href="" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('Img/usuario.png')}}" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="{{route('Cart')}}">Carrito de compras</a></li>
                        <li><a class="dropdown-item" href="{{route('Perfil')}}">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @auth
                            <form action="{{route('Logout')}}" method="POST">
                                @csrf
                                <li><a class="dropdown-item" href="#" onclick="this.closest('form').submit()">Cerrar Sesión</a></li>
                            </form>
                        @else
                            <li><a class="dropdown-item" href="{{route('Login')}}">Iniciar Sesión</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
            
        </div>
    </header>

    <main>
        @yield('Productos')
        
        @yield('Details')
        
        @yield('Cart')
        
        @yield('Checkout')

        @yield('Historial')

        @yield('Busqueda')

        @yield('Perfil')
    </main>
</body>
<script src="https://kit.fontawesome.com/a6395dc7b7.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>