@extends('Layout.Gerente_Layout')
@section('Reportes')
<div class="space-y-4">
    <!-- Reporte de Productos y Movimientos -->
    <div class="border rounded-lg shadow-sm">
        <h2>
            <button class="flex justify-between w-full px-4 py-3 text-left text-gray-700 hover:bg-gray-50 focus:outline-none" type="button" data-collapse-target="products-form">
                Reporte de Productos y Movimientos
            </button>
        </h2>
        <div id="products-form" class="p-4 bg-white">
            <form action="{{route('reportes_movimientos.pdf')}}" method="GET" target="_blank">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div>
                            <input name="Sucursal_1" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->sucursal_id}}" hidden>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Fecha de Inicio
                            </label>
                            <input type="date" name="Fecha_inicio" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Fecha de Fin
                            </label>
                            <input type="date" name="Fecha_fin" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Tipo de Movimiento
                            </label>
                            <select name="Movimiento" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Selecciona un Tipo de Movimiento</option>
                                <option value="1">Entradas</option>
                                <option value="2">Salidas</option>
                                <option value="3">General</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Generar Reporte
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Reporte de Ventas -->
    <div class="border rounded-lg shadow-sm">
        <h2>
            <button class="flex justify-between w-full px-4 py-3 text-left text-gray-700 hover:bg-gray-50 focus:outline-none" type="button" data-collapse-target="sales-form">
                Reporte de Ventas
            </button>
        </h2>
        <div id="sales-form" class="p-4 bg-white">
            <form action="{{route('reporte_ventas.pdf')}}" method="GET" target="_blank">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Fecha de Inicio
                            </label>
                            <input type="date" name="Fecha_inicio_ventas" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" >
                        </div>
                            <input name="Sucursal_2" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->sucursal_id}}" hidden required>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Fecha de Fin
                            </label>
                            <input type="date" name="Fecha_fin_ventas" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Generar Reporte
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection