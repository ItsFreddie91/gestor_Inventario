<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Almacén</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Almacenista.css')}}">
</head>
<body>

@if (session('Repartido'))
    <input type="hidden" id="Repartido_Suc" value="true">
@endif
<!-- Navbar con texto responsivo -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="fas fa-warehouse me-3"></i>
            <span class="d-none d-sm-inline">Sistema de Almacén</span>
            <span class="d-sm-none">Almacén</span>
        </a>
        <div class="ms-auto">
            <form action="{{route('Logout')}}" method="POST">
                @csrf
                <a class="logout-btn" onclick="this.closest('form').submit()" href="#">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    <span class="logout-text">Cerrar Sesión</span>
                </a>
            </form>
            
        </div>
    </div>
</nav>

<!-- El resto del contenido se mantiene igual -->
<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header gradient-custom text-white py-3">
                    <h4 class="mb-0 text-center fw-bold">
                        <i class="fas fa-box-open me-2"></i>
                        Registro de Producto
                    </h4>
                </div>
                <div class="card-body p-4">
                    <!-- Información del Producto -->
                    @if ($Producto)
                    <div class="producto-info">
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center">
                                <img src="{{asset($Producto['foto_producto'])}}" class="product-image" alt="Imagen del producto">
                            </div>
                            <div class="col-md-8">
                                <h4 class="mb-3 fw-bold" id="nombreProducto">{{$Producto['nombre_producto']}}</h4>
                                <p class="mb-2">
                                    <strong><i class="fas fa-barcode me-2 text-primary"></i>Código:</strong>
                                    <span class="ms-2" id="codigoProducto">{{$Producto['codigo_producto']}}</span>
                                </p>
                                <p class="mb-0">
                                    <strong><i class="fas fa-tags me-2 text-primary"></i>Categoría:</strong>
                                    <span class="category-badge ms-2" id="categoriaProducto">{{$Producto['nombre_categoria']}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-warning text-center">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        No se ha encontrado un producto con el código ingresado.
                    @endif

                    <!-- Formulario de Registro -->
                    <form action="{{route('Almacenista_Inicio')}}" method="GET">
                        @csrf
                        <div class="mb-4">
                            <label for="codigoBusqueda" class="form-label fw-bold">
                                <i class="fas fa-search me-2 text-primary"></i>Código del Producto
                            </label>
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" id="codigoBusqueda" name="Codigo" placeholder="Ingrese el código del producto" required>
                                <button class="btn btn-primary px-4" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>    

                    <form action="{{route('Repartir_Productos')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="cantidad" class="form-label fw-bold">
                                <i class="fas fa-cubes me-2 text-primary"></i>Cantidad
                            </label>
                            <input type="number" class="form-control form-control-lg" id="Cantidad" name="Cantidad" placeholder="Ingrese la cantidad" min="1" required>
                        </div>

                        @if ($Producto)
                            <input type="hidden" name="Prod_Id" value="{{$Producto['id_producto']}}">
                        @endif
                        <input type="hidden" name="Sucursal_Id" value="{{Auth::user()->sucursal_id}}">

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i>Registrar Entrada
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/Agregar_alerts.js')}}"></script>
</body>
</html>