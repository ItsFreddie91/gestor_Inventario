@extends('Layout.Admin_Layout')
@section('Sucursales')

<div class="container bg-white rounded shadow p-4 mt-3">
    <div class="table-responsive py-3">
        <table class="display table pt-3" id="example" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Sucursal</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Sucursales as $sucursal)
                    <tr>
                        <td>{{$sucursal->id_sucursal}}</td>
                        <td>{{$sucursal->nombre_sucursal}}</td>
                        <td>{{$sucursal->ubicacion_sucursal}}</td>
                        <td>
                            <a href="{{route('Modificar_Sucursal', ['id' => $sucursal['id_sucursal']])}}" class="table-a">
                                <ion-icon class="btn-table" name="create-outline"></ion-icon>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('remove_sucursal', $sucursal->id_sucursal) }}" method="POST" class="d-inline" id="delete-form-{{ $sucursal->id_sucursal }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm ms-3" onclick="confirmDeleteSucursal('{{ $sucursal->id_sucursal }}')">
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