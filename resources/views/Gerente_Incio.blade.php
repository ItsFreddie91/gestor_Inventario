@extends('Layout/Gerente_Layout')

@section('Contenido')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.tailwindcss.css">
<link rel="stylesheet" href="">
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h3 class="text-lg font-semibold mb-4">Rendimiento Mensual</h3>
        <div class="overflow-x-auto">
            <table id="example" class="table-auto min-w-full bg-white border border-gray-300 rounded-lg shadow-md display nowrap" style="width:100%">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Producto</th>
                        <th class="px-4 py-2 text-left">Foto</th>
                        <th class="px-4 py-2 text-left">Categoría</th>
                        <th class="px-4 py-2 text-left">Stock</th>
                        <th class="px-4 py-2 text-left">Precio</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($Productos as $producto)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $producto['nombre_producto'] }}</td>
                            <td class="px-4 py-3">
                                <img src="{{ asset($producto['foto_producto']) }}" class="w-16 h-16 object-cover rounded" alt="No se cargo la Imagen">
                            </td>
                            <td class="px-4 py-3">{{ $producto['categoria'] }}</td>
                            <td class="px-4 py-3">{{ $producto['cantidad'] }} pz.</td>
                            <td class="px-4 py-3">${{ $producto['precio_producto'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.tailwindcss.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
<script>
    new DataTable('#example', {
        responsive: true,
        lengthChange: false
    });
</script>

@endsection
