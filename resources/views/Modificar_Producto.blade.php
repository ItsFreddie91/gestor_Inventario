@extends('Layout.Admin_Layout')

@section('Modificar_Productos')

@if ($errors->has('Error_Actualizar'))
    <input type="hidden" id="Actuali_E" value="true">
@endif

@if (session('Actualizado'))
    <input type="hidden" id="Actualizado" value="true">
@endif

    <div>
        <div class="container rounded bg-white shadow">
            <div class="row p-3">
                <div class="text-center mb-2 mt-2">
                    <h4>Modificar Producto</h4>
                </div>
                <div class="col-md-5 mb-3">
                    <div class="card p-3">
                        <div class="text-center">
                            <img src="{{asset($datos_producto->foto_producto)}}" width="280px" class="img-fluid" alt="Imagen del producto">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <h5>{{$datos_producto->nombre_producto}}</h5>
                                <p>{{$datos_producto->descripcion_producto}}</p>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p>Precio: ${{$datos_producto->precio_producto}}</p>
                            </li>
                            <li class="list-group-item">
                                <p>Cantidad: {{$datos_producto->cantidad}} pz.</p>
                            </li>
                            <li class="list-group-item">
                                <p>Sucursal: {{$datos_producto->sucursal}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card p-3">
                        <div class="mb-2">
                            <div class="text-center mt-3">
                                <h5>Nuevos Datos</h5>
                            </div>
                        </div>
                        <form action="{{route('Actualizar_Producto')}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="text" name="Id_prod" id="Id_prod" value="{{$datos_producto->id_producto}}" hidden>
                            <div class="mb-2">
                                <label for="Nombre">Nombre:</label>
                                <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{$datos_producto->nombre_producto}}" onkeyup="this.value=Inputs_Producto(this.value)">
                            </div>
                            <div class="mb-2">
                                <label for="Cantidad">Cantidad:</label>
                                <input type="number" name="Cantidad" id="Cantidad" class="form-control" value="{{$datos_producto->cantidad}}">
                            </div>
                            <div class="mb-2">
                                <label for="Precio">Precio:</label>
                                <input type="number" name="Precio" id="Precio" class="form-control" value="{{$datos_producto->precio_producto}}" step="0.01">
                            </div>
                            <div class="mb-2">
                                <Label id="Descripcion">Descripcion:</Label>
                                <textarea name="Descripcion" class="form-control" id="Descripcion" rows="5" onkeyup="this.value=Inputs_Producto(this.value)" required>{{$datos_producto->descripcion_producto}}</textarea>
                            </div>
                            <div class="mb-2">
                                <label for="Codigo">Código:</label>
                                <input type="text" name="Codigo" id="Codigo" class="form-control" value="{{$datos_producto->codigo_producto}}">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/Agregar_alerts.js')}}"></script>
    <script src="{{asset('js/Validacion_Inputs.js')}}"></script>
@endsection