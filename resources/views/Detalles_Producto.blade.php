@extends('Layout.Tienda_Layout')
@section('Details')
@if (session('error'))
    <input type="hidden" id="Carrito_Stock" value="true">
@endif
<div class="container my-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-5 mb-4">
            <div class="card shadow p-3">
                <img src="{{asset($datos_producto->foto_producto)}}" class="card-img-top"  alt="Product Image">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h2 class="mb-3">{{$datos_producto->nombre_producto}}</h2>
            <p class="text-muted">Categoría: <span class="fw-bold">{{$categoria->nombre_categoria}}</span></p>
            <p class="fs-4 text-success">${{$datos_producto->precio_producto}}</p>
            <p>{{$datos_producto->descripcion_producto}}</p>

            <!-- Add to Cart and Wishlist -->
            <div class="d-grid gap-2 d-md-flex">
                <form action="{{ route('add_carrito', $datos_producto->id_producto) }}" method="post">
                    @csrf
                    <button class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-cart-plus "></i> Agregar al carrito
                    </button>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <section class="mt-5">
        <h3 class="mb-4 text-primary">Productos Relacionados</h3>
        <div class="row flex-row flex-nowrap overflow-auto g-3">
            @foreach ($otros as $otro)
                <div class="col-10 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm related-product-card">
                        <img src="{{ asset($otro->foto_producto) }}" class="card-img-top rounded" alt="Related Product" height="300">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-dark">${{ $otro->precio_producto }}</h5>
                            <p class="card-text text-muted">{{ $otro->nombre_producto }}</p>
                            <a href="{{ route('Details', ['id' => $otro['id_producto']]) }}" class="btn btn-primary mt-auto w-100">
                                <i class="fa-solid fa-circle-info me-1"></i> Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/carrito_alerts.js')}}"></script>

@endsection