<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos</title>
    <!-- Bootstrap básico para DomPDF -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Reseteo básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Configuración específica para DomPDF */
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-top: 2cm;
            margin-bottom: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        /* Header simplificado para DomPDF */
        .report-header {
            background-color: #4361ee;  /* Color sólido en lugar de gradiente */
            color: white;
            padding: 20px;
            margin-bottom: 30px;
            text-align: center;
        }

        .report-header h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .report-header p {
            font-size: 14px;
        }

        /* Tabla optimizada para DomPDF */
        .table-container {
            width: 100%;
            margin-bottom: 20px;
        }

        .table-custom {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
        }

        .table-custom thead th {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #333;
            font-weight: bold;
            font-size: 12px;
            padding: 10px;
            text-align: left;
            text-transform: uppercase;
        }

        .table-custom tbody td {
            border: 1px solid #dee2e6;
            padding: 10px;
            font-size: 12px;
            color: #333;
        }

        /* Badges simplificados para DomPDF */
        .badge-custom {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: normal;
        }

        .badge-quantity {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .badge-entrada {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .badge-salida {
            background-color: #ffebee;
            color: #c62828;
        }

        /* Footer */
        .report-footer {
            text-align: center;
            padding: 20px 0;
            font-size: 11px;
            color: #666;
            border-top: 1px solid #dee2e6;
            margin-top: 30px;
        }

        /* Utilidades adicionales */
        .text-center {
            text-align: center;
        }

        .fw-bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="report-header">
        <h1>Reporte General de Productos</h1>
        <p>Generado el {{ date('d/m/Y') }}</p>
    </div>

    <div class="table-container">
        <table class="table-custom">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre Producto</th>
                    <th>Categoría</th>
                    <th>Sucursal</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $producto)
                    <tr>
                        <td>{{ $producto->id_producto }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->categoria }}</td>
                        <td>{{ $producto->sucursal }}</td>
                        <td>{{ $producto->cantidad }}</td>
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