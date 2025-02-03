@extends('Layout.Admin_Layout')

@section('Pedidos')
@php
$pedidos = $Datos->groupBy('id_pedido');
$pedidos2 = $Datos2->groupBy('id_pedido');
@endphp

@if ($errors->has('error'))
    <input type="hidden" id="Entrega_E" value="true">
@endif

@if (session('success'))
    <input type="hidden" id="Entrega_A" value="true">
@endif

<div class="container bg-white rounded shadow p-4 my-4">

    <!-- Encabezado -->
    <h1 class="text-center mb-4">Panel de Administración de Pedidos</h1>

    <!-- Card para mostrar ganancias totales -->
    <div class="card mt-4 mb-2">
        <div class="card-body text-center">
            <h5 class="card-title">Ganancias Totales</h5>
            <p class="card-text"><strong>${{$total_mes}}</strong></p>
        </div>
    </div>

    <div class="row">
        <!-- Pedidos por entregar -->

        <div class="col-md-6">
            <h3>Pedidos por Entregar</h3>
            @foreach ($pedidos as $pedido => $productos)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title">Pedido #{{ $productos->first()->id_pedido }}</h5>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <p class="card-text">Cliente: {{ $productos->first()->nombre_persona}} {{$productos->first()->apellidop_persona}} {{$productos->first()->apellidom_persona}}</p>
                                <p class="card-text">Fecha de Pedido: {{ $productos->first()->fecha_pedido }}</p>
                            </div>
                            <div class="col">
                                <p class="card-text"><strong>Ganancia: ${{ $productos->first()->monto_pedido }}</strong></p>
                            </div>
                        </div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pedidoModal{{ $productos->first()->id_pedido }}">Ver Detalles</button>
                    </div>
                </div>

                <div class="modal fade" id="pedidoModal{{ $productos->first()->id_pedido }}" tabindex="-1" aria-labelledby="pedidoModalLabel{{ $productos->first()->id_pedido }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pedidoModalLabel{{ $productos->first()->id_pedido }}">Detalles del Pedido #{{ $productos->first()->id_pedido }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Productos:</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover rounded">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                            <tr>
                                                <td>{{ $producto->nombre_producto }}</td>
                                                <td>{{ $producto->cantidad_producto_pedido }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                                <form action="{{route('Entregar_Pedido', $productos->first()->id_pedido)}}" method="post" id="update-form-{{ $productos->first()->id_pedido }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="btn btn-success ms-3" onclick="confirmEntrega('{{  $productos->first()->id_pedido }}')">
                                        Marcar como Entregado
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>            
            @endforeach
        </div>

        <!-- Pedidos entregados -->
        <div class="col-md-6">
            <h3>Pedidos Entregados</h3>
            @foreach ($pedidos2 as $pedido => $productos)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">Pedido #{{ $productos->first()->id_pedido }}</h5>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p class="card-text">Cliente: {{ $productos->first()->nombre_persona}} {{$productos->first()->apellidop_persona}} {{$productos->first()->apellidom_persona}}</p>
                            <p class="card-text">Fecha de Pedido: {{ $productos->first()->fecha_pedido }}</p>
                        </div>
                        <div class="col">
                            <p class="card-text"><strong>Ganancia: ${{ $productos->first()->monto_pedido }}</strong></p>
                        </div>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pedidoModal{{ $productos->first()->id_pedido }}">Ver Detalles</button>
                </div>
            </div>

            <div class="modal fade" id="pedidoModal{{ $productos->first()->id_pedido }}" tabindex="-1" aria-labelledby="pedidoModalLabel{{ $productos->first()->id_pedido }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pedidoModalLabel{{ $productos->first()->id_pedido }}">Detalles del Pedido #{{ $productos->first()->id_pedido }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5>Productos:</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover rounded">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->nombre_producto }}</td>
                                            <td>{{ $producto->cantidad_producto_pedido }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>            
        @endforeach
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/Admin_alerts.js')}}"></script>
@endsection