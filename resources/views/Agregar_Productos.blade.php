@extends('Layout/Admin_Layout')

@section('Agregar_Productos')

<!--Mensajes de Categoría-->
@if (session('Categoria_Agregada'))
    <input type="hidden" id="Categoria_A" value="true">
@endif

@if ($errors->has('Categoria'))
    <input type="hidden" id="Categoria_E" value="true">
@endif

<!--Mensajes de Ubicación-->
@if (session('Ubicacion_Agregada'))
    <input type="hidden" id="Ubicacion_A" value="true">
@endif

<!--Mensajes de producto-->
@if (session('success'))
    <input type="hidden" id="Producto_A" value="true">
@endif

@if (session('Repartido'))
    <input type="hidden" id="Repartido_A" value="true">
@endif

@if ($errors->has('Imagen_error'))
    <input type="hidden" id="Imagen" value="true">
@endif

@if ($errors->has('Producto_error'))
    <input type="hidden" id="Producto_E" value="true">
@endif
<!--Mensajes de proveedor-->
@if (session('Proveedor_Agregado'))
    <input type="hidden" id="Proveedor_A" value="true">
@endif

@if ($errors->has('Correo_Proveedor'))
    <input type="hidden" id="Proveedor_E" value="true">
@endif

@if ($errors->has('Numero_Proveedor'))
    <input type="hidden" id="Proveedor_E_N" value="true">
@endif

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="{{asset('css/agregar.css')}}">

<div class="container-fluid">
    <div class="row">
        <div class="col-12 px-md-4">
            <!-- Navegación Superior Personalizada -->
            <div class="nav-custom-tabs">
                <ul class="nav justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item mx-2" role="presentation">
                        <a class="nav-link active" id="productos-tab" data-bs-toggle="tab" href="#productos" role="tab">
                            <i class="bi bi-box-seam"></i>Productos
                        </a>
                    </li>
                    <li class="nav-item mx-2" role="presentation">
                        <a class="nav-link" id="categorias-tab" data-bs-toggle="tab" href="#categorias" role="tab">
                            <i class="bi bi-tags"></i>Categorías
                        </a>
                    </li>
                    <li class="nav-item mx-2" role="presentation">
                        <a class="nav-link" id="proveedores-tab" data-bs-toggle="tab" href="#proveedores" role="tab">
                            <i class="bi bi-truck"></i>Proveedores
                        </a>
                    </li>
                    <li class="nav-item mx-2" role="presentation">
                        <a class="nav-link" id="stock-tab" data-bs-toggle="tab" href="#stock" role="tab">
                            <i class="bi bi-clipboard-data"></i>Stock
                        </a>
                    </li>
                    <li class="nav-item mx-2" role="presentation">
                        <a class="nav-link" id="sucursales-tab" data-bs-toggle="tab" href="#sucursales" role="tab">
                            <i class="bi bi-building"></i>Sucursales
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contenido de los Formularios (Mismo contenido anterior) -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Formulario de Productos -->
                <div class="tab-pane fade show active" id="productos" role="tabpanel">
                    <div class="container">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title text-center mb-0">Registro de Productos</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('Registrar_Producto')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Nombre del producto:</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre" onkeyup="this.value=Inputs_Producto(this.value)" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <Label>Codigo:</Label>
                                            <input type="number" name="Codigo" id="Codigo" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Proveedor:</label>
                                            <select class="form-select" name="Proveedor_P" id="Proveedor_P" required>
                                                <option value="">Selecciona un proveedor</option>
                                                @foreach ($Proveedores as $proveedor)
                                                    <option value="{{$proveedor->id_proveedor}}">{{$proveedor->nombre_proveedor}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Categoria:</label>
                                            <select class="form-select" name="T_Categoria" id="T_Categoria" required>
                                                <option value="">Selecciona una categoría</option>
                                                @foreach ($Categorias as $categoria)
                                                    <option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <Label>Descripcion:</Label>
                                            <textarea name="Descripcion" class="form-control" id="Descripcion" rows="1" onkeyup="this.value=Inputs_Producto(this.value)" required></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <Label>Precio:</Label>
                                            <input type="number" name="Precio" id="Precio" class="form-control" step="0.01" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Foto:</label>
                                            <input type="text" name="Foto" id="Foto" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Registrar Producto</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Los demás formularios mantienen la misma estructura -->
                <div class="tab-pane fade" id="categorias" role="tabpanel">
                    <div class="container">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title text-center mb-0">Registro de Categorías</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('store_categoria')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Nombre de la Categoria:</label>
                                        <input type="text" name="Categoria" id="Categoria" class="form-control" onkeyup="this.value=Inputs_Producto(this.value)" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Registrar Categoría</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="proveedores" role="tabpanel">
                    <div class="container">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title text-center mb-0">Registro de Proveedores</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('Agregar_Proveedor')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Nombre:</label>
                                            <input class="form-control" type="text" name="Nombre_Proveedor" id="Nombre_Proveedor" onkeyup="this.value=Inputs_Producto(this.value)" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Telefono:</label>
                                            <input class="form-control" type="text" name="Numero_Proveedor" id="Numero_Proveedor" onkeyup="this.value=Inputs_Numeros(this.value)" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label>Correo:</label>
                                            <input class="form-control" type="email" name="Correo_Proveedor" id="Correo_Proveedor" onkeyup="this.value=Correo_Contraseña(this.value)" required>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" >Registrar Proveedor</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="stock" role="tabpanel">
                    <div class="container">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title text-center mb-0">Registro de Stock</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('Repartir_Productos')}}" method="POST">
                                    @csrf
                                    
                                    <div class="row">
                                        <livewire:getprod />
                            
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Sucursal</label>
                                            <select class="form-select" name="Sucursal_Id" required>
                                                <option value="">Seleccionar Sucursal</option>
                                                @foreach ($Sucursales as $sucursal)
                                                    <option value="{{$sucursal->id_sucursal}}">{{$sucursal->nombre_sucursal}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                            
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Cantidad</label>
                                            <input type="number" name="Cantidad" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Registrar Stock</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="sucursales" role="tabpanel">
                    <div class="container">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title text-center mb-0">Registro de Sucursales</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('Agregar_Sucursal')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="Nombre_Suc">Nombre de la Sucursal</label>
                                            <input type="text" class="form-control" name="Nombre_Suc" id="Nombre_Suc" onkeyup="this.value=Inputs_Producto(this.value)" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="Direccion_Suc">Dirección de la Sucursal</label>
                                            <textarea class="form-control" name="Direccion_Suc" id="Direccion_Suc" cols="30" rows="1" onkeyup="this.value=Inputs_Producto(this.value)" required></textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Registrar Sucursal</button>
                                    </div>
                                </form>
                            </div>
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