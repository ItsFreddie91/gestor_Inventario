@extends('Layout.Tienda_Layout')
@section('Perfil')
<link rel="stylesheet" href="{{asset('css/vista_perfil.css')}}">
<div class="container mt-4 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg animated-card">
                <div class="gradient-custom text-white py-4">
                    <h3 class="text-center mb-0">Actualiza tus Datos</h3>
                </div>
                <div class="icon-container shadow">
                    <i class="fas fa-user-edit fa-2x text-white"></i>
                </div>
                <div class="card-body px-4">
                    <form id="personalDataForm" method="POST" action="{{route('Actualizar_Usuario')}}" class="needs-validation">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <input type="text" name="Id_Usuario" id="Id_Usuario" value="{{Auth::user()->id_usuario}}" hidden>
                            <input type="text" name="Tipo_Usuario" id="Tipo_Usuario" value="4" hidden>
                            <div class="col-md-12 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Tu nombre" value="{{$datos->nombre_persona}}" onkeyup="this.value=Nombre_Apellidos(this.value)" required>
                                    <label for="nombre"><i class="fas fa-user me-2"></i>Nombre</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="Apellido_P" name="Apellido_P" placeholder="Apellido Paterno" value="{{$datos->apellidop_persona}}" onkeyup="this.value=Nombre_Apellidos(this.value)" required>
                                    <label for="apellidoPaterno"><i class="fas fa-user-tag me-2"></i>Apellido Paterno</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="Apellido_M" name="Apellido_M" placeholder="Apellido Materno" value="{{$datos->apellidom_persona}}" onkeyup="this.value=Nombre_Apellidos(this.value)" required>
                                    <label for="apellidoMaterno"><i class="fas fa-user-tag me-2"></i>Apellido Materno</label>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="email" class="form-control" id="Correo" name="Correo" placeholder="correo@ejemplo.com" value="{{$datos->correo_usuario}}" onkeyup="this.value=Correo_Contraseña(this.value)" required>
                                        <label for="correo">Correo Electrónico</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-home"></i>
                                    </span>
                                    <div class="form-floating flex-grow-1">
                                        <input class="form-control" id="Direccion" name="Direccion" style="height: 50px" placeholder="Tu dirección" value="{{$datos->direccion_persona}}" onkeyup="this.value=Inputs_Producto(this.value)" required>
                                        <label for="direccion">Dirección</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-lg px-4 text-white" onclick="actualizar_datos();" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%)">
                                        <i class="fas fa-save me-2"></i>Guardar Cambios
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/vista_perfil.js')}}"></script>
<script src="{{asset('js/Validacion_Inputs.js')}}"></script>
@endsection