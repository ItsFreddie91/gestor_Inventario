@extends('Layout.Admin_Layout')
@section('Modificar_Usuarios')

@if ($errors->has('Error_Actualizar'))
    <input type="hidden" id="User_E" value="true">
@endif

@if (session('Actualizado'))
    <input type="hidden" id="User_A" value="true">
@endif


@if ($errors->has('Error_Contraseña'))
    <input type="hidden" id="Contra_E" value="true">
@endif

@if (session('Contraseña_A'))
    <input type="hidden" id="Contra_A" value="true">
@endif

<div class="container rounded bg-white shadow">
    <div class="row p-3">
        <div class="text-center mb-2 mt-2">
            <h4>Modificar Usuario</h4>
        </div>
        <div class="col-md-5 mb-3">
            <div class="card p-3 mb-3">
                <div class="mb-2">
                    <div class="text-center mt-3">
                        <h5>Datos Actuales</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Nombre: {{$Datos->nombre_persona}} {{$Datos->apellidop_persona}} {{$Datos->apellidom_persona}}</h5>
                            <p>Correo: {{$Datos->correo_usuario}}</p>
                            <p>Tipo de Usuario: {{$Datos->tipo_usuario}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-3">
                <div class="mb-2">
                    <div class="text-center mt-3">
                        <h5>Cambiar Contraseña</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <form action="{{route('Cambiar_Contrasena')}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="text" name="Id_User" id="Id_User" value="{{$Datos->id_usuario}}" hidden>
                                <div class="mb-2">
                                    <label>Nueva Contraseña</label>
                                    <input type="password" name="Contra" id="Contra" class="form-control" required>
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
        <div class="col-md-7">
            <div class="card p-3">
                <div class="mb-2">
                    <div class="text-center mt-3">
                        <h5>Nuevos Datos</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <form action="{{route('Actualizar_Usuario')}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="text" name="Id_Usuario" id="Id_Usuario" value="{{$Datos->id_usuario}}" hidden>
                                <input type="text" name="Direccion" id="Direccion" value="No aplica" hidden>
                                <div class="mb-2">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control" value="{{$Datos->nombre_persona}}" name="Nombre" required>
                                </div>
                                
                                <div class="mb-2">
                                    <label>Apellido Paterno:</label>
                                    <input type="text" class="form-control" value="{{$Datos->apellidop_persona}}" name="Apellido_P" required>
                                </div>

                                <div class="mb-2">
                                    <label>Apellido Materno:</label>
                                    <input type="text" class="form-control" value="{{$Datos->apellidom_persona}}" name="Apellido_M" required>
                                </div>

                                <div class="mb-2">
                                    <label>Correo:</label>
                                    <input type="email" class="form-control" value="{{$Datos->correo_usuario}}" name="Correo" required>
                                </div>

                                <div class="mb-2">
                                    <label>Tipo de Usuario</label>
                                    <select class="form-select" name="Tipo_Usuario" id="Tipo_Usuario" required>
                                        <option value="">Seleccione una opción</option>
                                        @foreach ($Tipos_Usuarios as $Tipo)
                                            @if ($Tipo->id_tipo_usuario == $Datos->id_tipo_usuario)
                                                <option value="{{$Tipo->id_tipo_usuario}}" selected>{{$Tipo->tipo_usuario}}</option>
                                            @else
                                            <option value="{{$Tipo->id_tipo_usuario}}">{{$Tipo->tipo_usuario}}</option>
                                            @endif
                                        @endforeach
                                    </select>
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
@endsection