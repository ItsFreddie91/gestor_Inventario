<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos</title>
    <!-- Bootstrap básico para DomPDF -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/productos_movimientos.css')}}">
</head>
<body>
    <div class="report-header">
        <h1>Reporte de Productos por movimientos</h1>
        <p>Generado el {{ date('d/m/Y') }}</p>
    </div>

    <div class="table-container">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>Nombre Producto</th>
                    <th>Cantidad</th>
                    <th>Sucursal</th>
                    <th>Movimiento</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $producto)
                <tr>
                    <td class="fw-bold">{{ $producto->nombre_producto }}</td>
                    <td>
                        <span class="badge-custom badge-quantity">
                            {{ $producto->cantidad }}
                        </span>
                    </td>
                    <td>{{ $producto->sucursal }}</td>
                    <td>
                        <span class="badge-custom {{ $producto->movimiento == 'Entrada de mercancia' ? 'badge-entrada' : 'badge-salida' }}">
                            {{ $producto->movimiento }}
                        </span>
                    </td>
                    <td>{{ $producto->fecha }}</td>
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