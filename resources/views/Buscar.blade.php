@extends('Layout.Tienda_Layout')

@section('Busqueda')
<div class="text-center">
    @if ($total)
        <h4>Resultados de busqueda</h4>
        <p class="text-muted">Se encontraron <strong>{{ $total }}</strong> productos</p>
    @else
        <h4>No hay resultados</h4>
        <p class="text-muted">No se encontraron coincidencias</p>
    @endif
</div>
<div class="container my-5">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach ($Productos as $producto)
            <div class="col">
                <div class="card h-100 shadow-sm product-card">
                    <img src="{{ asset($producto['foto_producto']) }}" class="card-img-top rounded" alt="Imagen del producto" height="300">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">${{ $producto['precio_producto'] }}</h5>
                        <p class="card-text text-secondary">{{ $producto['nombre_producto'] }}</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <a href="{{ route('Details', ['id' => $producto['id_producto']]) }}" class="btn btn-outline-secondary btn-md">
                                <i class="fa-solid fa-circle-info me-1"></i> Ver detalles
                            </a>
                            <form action="{{ route('add_carrito', $producto['id_producto']) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fa-solid fa-cart-plus me-1"></i> Añadir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        {{$Productos->links()}}
    </div>
</div>
@endsection