@extends('Layout.Tienda_Layout')

@section('Cart')

@if ($errors->any())
    <input type="hidden" id="Carrito_Stock" value="true">
@endif


<div class="container my-5">
    <div class="row">
        <!-- Lista de productos -->
        <div class="col-lg-8">
            <h2 class="mb-4">Tu carrito de compras</h2>
            @if (Cart::count()>0)
                <h4>{{ Cart::count() }} Producto(s) en el carrito</h4>
                @foreach (Cart::content() as $producto)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{asset($producto->options->foto)}}" class="img-fluid rounded-start p-3" alt="Producto">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$producto->name}}</h5>
                                    <p class="card-text text-muted">Categoría: {{$producto->options->categoria}}</p>
                                    <p class="card-text text-success">${{number_format($producto->price,2)}}</p>
                                    <div class="d-flex align-items-center">
                                        <form action="{{ route('update_carrito', $producto->rowId) }}" method="POST" data-ajax="true"  class="d-inline update-cart-form">
                                            @csrf
                                            @method('PATCH')
                                            <div class="input-group input-group-sm" style="width: 120px;">
                                                <!-- Botón para disminuir -->
                                                <button type="button" class="btn btn-primary btn-sm decrease-btn" data-row-id="{{ $producto->rowId }}">-</button>
                                                
                                                <!-- Input de cantidad -->
                                                <input 
                                                    type="number" 
                                                    id="quantity-{{ $producto->rowId }}" 
                                                    name="quantity" 
                                                    value="{{ $producto->qty }}" 
                                                    min="1" 
                                                    class="form-control text-center quantity-input"
                                                    style="border-radius: 0;"
                                                >
                                                
                                                <!-- Botón para aumentar -->
                                                <button type="button" class="btn btn-primary btn-sm increase-btn" data-row-id="{{ $producto->rowId }}">+</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('remove_carrito', $producto->rowId) }}" method="POST" class="d-inline" id="delete-form-{{ $producto->rowId }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm ms-3" onclick="confirmDelete('{{ $producto->rowId }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h4>No hay productos en el carrito.</h4>
            @endif
        </div>

        <!-- Resumen del pedido -->
        <div class="col-lg-4">
            <div class="position-sticky" style="top: 20px;">
                <h2 class="mb-4">Resumen del Pedido</h2>
                <ul class="list-group mb-4">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span>${{ Cart::subtotal() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <span class="fw-bold">${{ Cart::subtotal() }}</span>
                    </li>
                </ul>
                <a href="{{route('View_Checkout')}}" class="btn btn-primary btn-lg w-100 mb-2">Finalizar Compra</a>
                <a href="/" class="btn btn-outline-secondary btn-lg w-100">Seguir Comprando</a>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/Tienda_alerts.js')}}"></script>
<script src="{{asset('js/botones_cart.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/carrito_alerts.js')}}"></script>
@endsection
