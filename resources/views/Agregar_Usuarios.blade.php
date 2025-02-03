@extends('Layout/Admin_Layout')

@section('Agregar_Usuarios')

@if (session('Agregado'))
    <input type="hidden" id="Usuario_A" value="true">
@endif

@if (session('success'))
    <input type="hidden" id="Usuario_E" value="true">
@endif

    <!--Sección para gregar Usuarios-->
    <div class="container bg-white shadow rounded mt-4 p-4">

        <div class="accordion shadow" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Agregar Usuarios
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        
                        <form action="{{route('Registrar_Usuarios')}}" autocomplete="off" method="post">
                            @csrf
                            <div class="row">
                                <div class="g-col-6 col-sm-6">
                                    <div class="mb-2">
                                        <label>Nombre:</label>
                                        <input type="text" name="Nombre" id="Nombre" class="form-control" onkeyup="this.value=Nombre_Apellidos(this.value)" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Apellido Paterno:</label>
                                        <input type="text" name="Apellido_P" id="Apellido_P" onkeyup="this.value=Nombre_Apellidos(this.value)" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Apellido Paterno:</label>
                                        <input type="text" name="Apellido_M" id="Apellido_M" onkeyup="this.value=Nombre_Apellidos(this.value)" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label>Selecciona una Sucursal</label>
                                        <select class="form-select" name="Sucursal" id="Sucursal" required>
                                            <option value="">Selecciona una sucursal:</option>
                                            @foreach ($Sucursales as $sucursal)
                                                <option value="{{$sucursal->id_sucursal}}">{{$sucursal->nombre_sucursal}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="g-col-6 col-sm-6">
                                    <div class="mb-2">
                                        <label>Selecciona un tipo de usuario:</label>
                                        <select class="form-select" name="Tipo_Usuario" id="Tipo_Usuario" required>
                                            <option value="">Selecciona un tipo de usuario</option>
                                            @foreach ($Tipos_Usuarios as $tipo_usuario)
                                                <option value="{{$tipo_usuario->id_tipo_usuario}}">{{$tipo_usuario->tipo_usuario}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label>Usuario:</label>
                                        <input type="email" name="Usuario" id="Usuario" placeholder="ejemplo@gmail.com" class="form-control" onkeyup="this.value=Correo_Contraseña(this.value)" required>
                                    </div>
                    
                                    <div class="mb-2">
                                        <label>Contraseña:</label>
                                        <input type="password" name="Contrasena" id="Contrasena" class="form-control" minlength="8" onkeyup="this.value=Correo_Contraseña(this.value)" required>
                                    </div>
                
                                    <div class="d-grid">
                                        <br>
                                        <input type="submit" value="Agregar" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Sección para mostrar usuarios-->

    <div class="container mt-3 p-4 shadow rounded bg-white">
        <div class="table-responsive py-3">
            <table class="display table pt-3" id="example" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Sucursal</th>
                        <th>Cargo</th>
                        <th>Correo</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos_usuarios as $dato)
                        <tr>
                            <td>{{$dato->nombre_persona}} {{$dato->apellidop_persona}} {{$dato->apellidom_persona}}</td>
                            <td>{{$dato->nombre_sucursal}}</td>
                            <td>{{$dato->tipo_usuario}}</td>
                            <td>{{$dato->correo_usuario}}</td>
                            <td>
                                <a href="{{route('Modificar_Usuario', ['id' => $dato['id_usuario']])}}" type="button" class="btn btn-sm ms-3 d-inline">
                                    <ion-icon class="btn-table" name="create-outline"></ion-icon>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('Eliminar_Usuario', $dato->id_usuario)}}" method="POST" class="d-inline" id="delete-form-{{ $dato->id_usuario }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm ms-3" onclick="confirmDeleteUsuario('{{ $dato->id_usuario }}')">
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
    <script src="{{asset('js/Validacion_Inputs.js')}}"></script>
    <script src="{{asset('js/Admin_alerts.js')}}"></script>

@endsection