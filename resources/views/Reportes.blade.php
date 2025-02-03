@extends('Layout.Admin_Layout')
@section('Reportes')
<div class="container rounded bg-light shadow p-4 mt-4 ">
    <div class="accordion shadow" id="accordionExample">
        
        <!--Reportes General de Productos-->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Reporte General de Productos
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form action="{{route('reporte_productos.pdf')}}" method="GET" target="_blank">
                        <div class="row">
                            <div class="col">
                                <select name="Sucursal" id="Sucursal" class="form-select" required>
                                    <option value="">Selecciona una sucursal</option>
                                    @foreach ($Sucursales as $sucursal)
                                        <option value="{{$sucursal->id_sucursal}}">{{$sucursal->nombre_sucursal}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <div class="d-grid">
                                    <input type="submit" value="Generar Reporte" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Reporte de Productos por Fecha y Tipo de Movimientos-->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Reporte de Productos y Movimientos
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form action="{{route('reportes_movimientos.pdf')}}" method="GET" target="_blank">
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <select name="Sucursal_1" class="form-select" required>
                                        <option value="">Selecciona una sucursal</option>
                                        @foreach ($Sucursales as $sucursal)
                                            <option value="{{$sucursal->id_sucursal}}">{{$sucursal->nombre_sucursal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label>Fecha de Inicio</label>
                                    <input type="date" name="Fecha_inicio" class="form-control" required>
                                </div>
                                <div class="mb-2">
                                    <label>Fecha de Fin</label>
                                    <input type="date" name="Fecha_fin" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                    <select name="Movimiento" class="form-select" required>
                                        <option value="">Selecciona un Tipo de Movimiento</option>
                                        <option value="1">Entradas</option>
                                        <option value="2">Salidas</option>
                                        <option value="3">General</option>
                                    </select>
                                </div>
                                <div class="d-grid">
                                    <input type="submit" value="Generar Reporte" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Reporte de Ventas por Fecha-->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Reporte de Ventas
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form action="{{route('reporte_ventas.pdf')}}" method="GET" target="_blank">
                        <div class="row">
                            <div class="col">

                                <div class="mb-2">
                                    <label>Fecha de Inicio</label>
                                    <input type="date" name="Fecha_inicio_ventas" class="form-control" required>
                                </div>

                                <div class="mb-2">
                                    <select name="Sucursal_2" class="form-select" required>
                                        <option value="">Selecciona una sucursal</option>
                                        @foreach ($Sucursales as $sucursal)
                                            <option value="{{$sucursal->id_sucursal}}">{{$sucursal->nombre_sucursal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                    <label>Fecha de Fin</label>
                                    <input type="date" name="Fecha_fin_ventas" class="form-control" required>
                                </div>
                                
                                <div class="d-grid">
                                    <input type="submit" value="Generar Reporte" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection