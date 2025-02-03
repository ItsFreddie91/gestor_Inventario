@extends('Layout/Admin_Layout')

@section('Contenido')
<div class="container bg-white rounded shadow p-4 mt-3">
    <div class="table-responsive py-3">
        <table class="display table pt-3" id="example" style="width:100%">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Foto</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Sucursal</th>
                    <th>Precio</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Productos as $producto)
                    <tr>
                        <td>{{$producto['nombre_producto']}}</td>
                        <td>
                            <img src="{{ asset($producto['foto_producto']) }}" width="70px" alt="No se cargo la Imagen">
                        </td>
                        <td>{{$producto['categoria']}}</td>
                        <td>{{$producto['cantidad']}} pz.</td>
                        <td>{{$producto['sucursal']}}</td>
                        <td>${{$producto['precio_producto']}}</td>
                        <td>
                            <a href="{{route('Modificar_p_vista', ['id' => $producto['id_producto'], 'Suc' => $producto['suc']])}}" class="table-a">
                                <ion-icon class="btn-table" name="create-outline"></ion-icon>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('remove_producto', $producto->id_producto) }}" method="POST" class="d-inline" id="delete-form-{{ $producto->id_producto }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm ms-3" onclick="confirmDelete('{{ $producto->id_producto }}')">
                                    <ion-icon class="btn-table" name="trash-outline"></ion-icon>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/DataTable.js')}}"></script>
<script src="{{asset('js/Admin_alerts.js')}}"></script>
@endsection