@extends('Layout.Admin_Layout')
@section('Movimientos')

<div class="container mt-3 p-4 bg-white rounded shadow">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-primary rounded">
                <tr>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Sucursal</th>
                    <th scope="col">Movimiento</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $producto)
                <tr>
                    <td class="fw-bold">{{ $producto->nombre_producto }}</td>
                    <td>
                        <span class="badge bg-primary rounded-pill">
                            {{ $producto->cantidad }}
                        </span>
                    </td>
                    <td>{{ $producto->sucursal }}</td>
                    <td>
                        <span class="badge {{ $producto->movimiento == 'Entrada de mercancia' ? 'bg-success' : 'bg-danger' }}">
                            {{ $producto->movimiento }}
                        </span>
                    </td>
                    <td>{{ $producto->fecha }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection