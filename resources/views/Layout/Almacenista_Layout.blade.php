<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Almacén</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Almacenista.css')}}">
</head>
<body>

<!-- Navbar con texto responsivo -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="fas fa-warehouse me-3"></i>
            <span class="d-none d-sm-inline">Sistema de Almacén</span>
            <span class="d-sm-none">Almacén</span>
        </a>
        <div class="ms-auto d-flex align-items-center">
            <a class="nav-link-custom" href="{{route('Almacenista_Inicio')}}">
                <i class="fas fa-chart-line me-2"></i>
                <span class="nav-text">Ingresos</span>
            </a>
            <a class="nav-link-custom" href="{{route('Almacenista_Vender')}}">
                <i class="fas fa-cash-register me-2"></i>
                <span class="nav-text">Vender</span>
            </a>
            <form action="{{route('Logout')}}" method="POST">
                @csrf
                <a class="logout-btn" onclick="this.closest('form').submit()" href="#">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    <span class="nav-text">Cerrar Sesión</span>
                </a>
            </form>
        </div>
    </div>
</nav>

<main>
    @yield('Ingreso_Producto')
    @yield('Vender')
</main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/Agregar_alerts.js')}}"></script>
</body>
</html>