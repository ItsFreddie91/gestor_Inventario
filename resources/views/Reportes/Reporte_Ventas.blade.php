<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos</title>
    <!-- Bootstrap básico para DomPDF -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/reporte_ventas.css')}}">
</head>
<body>
    <div class="report-header">
        <h1>Reporte de Ventas</h1>
        <p>Generado el {{ date('d/m/Y') }}</p>
    </div>

    <div class="table-container">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>Nombre Producto</th>
                    <th>Sucursal</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $producto)
                    <tr>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->nombre_sucursal }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>${{ is_numeric($producto->precio_producto) && is_numeric($producto->cantidad) ? $producto->precio_producto * $producto->cantidad : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="report-footer">
        <p>© {{ date('Y') }} - Sistema de Gestión de Inventario</p>
    </div>
</body>
</html>