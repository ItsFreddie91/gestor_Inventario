@extends('Layout.Admin_Layout')
@section('Mostrar_Proveedores')
<div class="container mt-3 p-4 shadow rounded bg-white">
    <div class="table-responsive py-3">
        <table class="display table pt-3" id="example" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Proveedores as $dato)
                    <tr>
                        <td>{{$dato->nombre_proveedor}}</td>
                        <td>{{$dato->correo_proveedor}}</td>
                        <td>{{$dato->telefono_proveedor}}</td>
                        <td>
                            <a href="{{route('Modificar_Proveedor', ['id' => $dato['id_proveedor']])}}" type="button" class="btn btn-sm ms-3 d-inline">
                                <ion-icon class="btn-table" name="create-outline"></ion-icon>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('Eliminar_Proveedor', $dato->id_proveedor)}}" method="POST" class="d-inline" id="delete-form-{{ $dato->id_proveedor }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm ms-3" onclick="confirmDeleteProveedor('{{ $dato->id_proveedor }}')">
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
<!--Sección parar los scripts-->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/Agregar_alerts.js')}}"></script>
<script src="{{asset('js/DataTable.js')}}"></script>
<script src="{{asset('js/Admin_alerts.js')}}"></script>
@endsection