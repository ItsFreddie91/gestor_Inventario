@extends('Layout.Tienda_Layout')

@section('Historial')
<div class="container my-5">
    <h2 class="mb-4 text-center">Pedidos Realizados</h2>

    <div class="accordion shadow" id="accordionExample">
        @php
            $pedidosAgrupados = $Datos->groupBy('id_pedido');
        @endphp
    
        @foreach ($pedidosAgrupados as $idPedido => $productos)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$idPedido}}" aria-expanded="false" aria-controls="flush-collapse{{$idPedido}}">
                    <p>Fecha del Pedido: {{ $productos->first()->fecha_pedido }}</p>
                    <br>
                    <div>
                        @if ($productos->first()->estado_pedido == "Por Entregar")
                            <p class="text-primary px-4">Estado: {{ $productos->first()->estado_pedido }}</p>
                        @else
                            <p class="text-success px-4">Estado: {{ $productos->first()->estado_pedido }}</p>
                        @endif
                    </div>
                </button>
            </h2>
            <div id="flush-collapse{{$idPedido}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre_producto }}</td>
                                    <td>{{ $producto->cantidad_producto_pedido }}</td>
                                    <td>${{ $producto->precio_producto }}</td>
                                    <td>${{ number_format($producto->cantidad_producto_pedido * $producto->precio_producto, 2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Total: $</td>
                                <td>{{$productos->first()->monto_pedido}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection
