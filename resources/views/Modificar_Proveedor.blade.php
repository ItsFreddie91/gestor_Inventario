@extends('Layout.Admin_Layout')
@section('Modificar_Proveedores')
@if ($errors->has('Error'))
<input type="hidden" id="Proveedor_E" value="true">
@endif

@if (session('Proveedor_Actualizado'))
<input type="hidden" id="Proveedor_A" value="true">
@endif

<div class="container rounded bg-white shadow">
    <div class="row p-3">
        <div class="text-center mb-2 mt-2">
            <h4>Modificar Proveedor</h4>
        </div>
        <div class="col-md-5 mb-3">
            <div class="card p-3">
                <div class="mb-2">
                    <div class="text-center mt-3">
                        <h5>Datos Actuales</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Nombre: {{$Proveedor->nombre_proveedor}}</h5>
                            <p>Correo: {{$Proveedor->correo_proveedor}}</p>
                            <p>Telefono: {{$Proveedor->telefono_proveedor}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card p-3">
                <div class="mb-2">
                    <div class="text-center mt-3">
                        <h5>Nuevos Datos</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <form action="{{route('Actualizar_Proveedor')}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="text" name="Id_Prov" id="Id_Prov" value="{{$Proveedor->id_proveedor}}" hidden>
                                <div class="mb-2">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control" value="{{$Proveedor->nombre_proveedor}}" onkeyup="this.value=Inputs_Producto(this.value)" name="Nombre_Prov">
                                </div>
                                <div class="mb-2">
                                    <label>Correo:</label>
                                    <input type="text" class="form-control" maxlength="250" value="{{$Proveedor->correo_proveedor}}" onkeyup="this.value=Correo_Contraseña(this.value)" name="Correo_Prov">
                                </div>
                                <div class="mb-2">
                                    <label>Telefono:</label>
                                    <input type="text" class="form-control" maxlength="12" value="{{$Proveedor->telefono_proveedor}}" onkeyup="this.value=Inputs_Numeros(this.value)" name="Telefono_Prov">
                                </div>
                                <div class="d-grid">
                                    <input type="submit" value="Actualizar" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/Agregar_alerts.js')}}"></script>
<script src="{{asset('js/Validacion_Inputs.js')}}"></script>
@endsection