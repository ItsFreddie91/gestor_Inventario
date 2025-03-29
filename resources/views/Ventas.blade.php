@extends('Layout.Almacenista_Layout')
@section('Vender')

<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-4">
        <header class="bg-blue-600 text-white p-4 rounded-t-lg">
            <h1 class="text-2xl font-bold">Sistema de Ventas</h1>
        </header>

        <div class="bg-white p-4 rounded-b-lg shadow-md">
            <!-- Contenedor principal con diseño responsive -->
            <div class="flex flex-col md:flex-row gap-4">

                <!-- Lado izquierdo: Foto y nombre del producto -->
                <div class="w-full md:w-1/2 bg-gray-50 p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Producto Actual</h2>

                    <div class="flex flex-col sm:flex-row gap-4 items-center">
                        <div class="w-full sm:w-1/2">
                            <img src="/api/placeholder/300/300" alt="Producto" class="w-full h-auto rounded-lg border border-gray-300" />
                        </div>
                        <div class="w-full sm:w-1/2">
                            <div class="mb-3">
                                <label class="block text-gray-700 mb-2">Nombre del Producto</label>
                                <label class="block text-gray-700 mb-2"></label>
                            </div>

                            <div class="mb-3">
                                <label class="block text-gray-700 mb-2">Precio</label>
                                <label class="block text-gray-700 mb-2"></label>
                            </div>

                            <div class="mb-3">
                                <input type="number" class="w-full p-2 border border-gray-300 rounded" placeholder="Buscar por Id"/>
                                <div class="mt-2">
                                    <button class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 w-full">
                                        Agregar Producto
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lado derecho: Lista de productos agregados -->
                <div class="w-full md:w-1/2 bg-gray-50 p-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Productos Agregados</h2>

                    <div class="overflow-auto max-h-96">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th
                                        class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Producto
                                    </th>
                                    <th
                                        class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Cantidad
                                    </th>
                                    <th
                                        class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Precio Unit.
                                    </th>
                                    <th
                                        class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Subtotal
                                    </th>
                                    <th
                                        class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Producto ejemplo 1 -->
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200">Laptop HP 15"</td>
                                    <td class="py-2 px-4 border-b border-gray-200">1</td>
                                    <td class="py-2 px-4 border-b border-gray-200">$899.99</td>
                                    <td class="py-2 px-4 border-b border-gray-200">$899.99</td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        <button class="text-red-600 hover:text-red-800">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                                <!-- Producto ejemplo 2 -->
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200">Mouse Inalámbrico</td>
                                    <td class="py-2 px-4 border-b border-gray-200">2</td>
                                    <td class="py-2 px-4 border-b border-gray-200">$24.99</td>
                                    <td class="py-2 px-4 border-b border-gray-200">$49.98</td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        <button class="text-red-600 hover:text-red-800">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                                <!-- Producto ejemplo 3 -->
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200">Teclado Mecánico</td>
                                    <td class="py-2 px-4 border-b border-gray-200">1</td>
                                    <td class="py-2 px-4 border-b border-gray-200">$79.99</td>
                                    <td class="py-2 px-4 border-b border-gray-200">$79.99</td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        <button class="text-red-600 hover:text-red-800">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sección inferior: Total de la compra -->
            <div class="mt-7 bg-gray-50 p-4 rounded-lg">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="w-full md:w-1/2 mb-4 md:mb-0">
                        <div class="flex justify-between border-b pb-2">
                            <span class="font-semibold">Subtotal:</span>
                            <span>$1,029.96</span>
                        </div>
                        <div class="flex justify-between border-b py-2">
                            <span class="font-semibold">Impuestos (16%):</span>
                            <span>$164.79</span>
                        </div>
                        <div class="flex justify-between py-2 text-lg font-bold">
                            <span>Total:</span>
                            <span>$1,194.75</span>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 flex justify-end">
                        <button class="bg-green-600 text-white py-3 px-6 rounded hover:bg-green-700 text-lg">
                            Finalizar Venta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection