@extends('Layout.Admin_Layout')
@section('Modificar_Sucursal')

@if ($errors->has('error'))
    <input type="hidden" id="Suc_E" value="true">
@endif

@if (session('success'))
    <input type="hidden" id="Suc_A" value="true">
@endif

    <div class="container rounded bg-white shadow">
        <div class="row p-3">
            <div class="text-center mb-2 mt-2">
                <h4>Modificar Sucursal</h4>
            </div>
            <div class="col-md-5 mb-3">
                <div class="card p-3">
                    <div class="mb-2">
                        <div class="text-center mt-3">
                            <h5>Datos Actuales</h5>
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Sucursal: {{$Sucursal->nombre_sucursal}}</h5>
                                <p>Dirección: {{$Sucursal->ubicacion_sucursal}}</p>
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
                                <form action="{{route('Actualizar_Sucursal')}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="Id_Suc" id="Id_Suc" value="{{$Sucursal->id_sucursal}}" hidden>
                                    <div class="mb-2">
                                        <label>Nombre:</label>
                                        <input type="text" class="form-control" value="{{$Sucursal->nombre_sucursal}}" onkeyup="this.value=Inputs_Producto(this.value)" name="Nombre_Suc">
                                    </div>
                                    <div class="mb-2">
                                        <label>Dirección:</label>
                                        <input type="text" class="form-control" maxlength="250" value="{{$Sucursal->ubicacion_sucursal}}" onkeyup="this.value=Inputs_Producto(this.value)" name="Direccion_Suc">
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