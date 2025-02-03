@extends('Layout.Tienda_Layout')

@section('Checkout')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">

            <div id="paypal-button-container"></div>
        </div>

        <div class="col-md-5">
            <h4 class="mb-3">Resumen de la Compra</h4>
            <ul class="list-group">
                @foreach (Cart::content() as $producto)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{$producto->name}} x{{ $producto->qty }}
                        <span>${{ number_format((float) $producto->price * (float) $producto->qty, 2) }}</span>

                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Total</strong>
                    <strong>${{ Cart::subtotal() }}</strong>
                    <input type="number" value='{{ Cart::subtotal() }}'  id="total_pago" hidden>
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AWcc2wrSEcgBfcmacJI50WmKpjbw44t6a2P2PH6REigBahTdlmN2oX2dw4yrTTYeMEIzBGVe9brd-Mi1&currency=MXN"></script>
<script src="{{asset('js/paypal.js')}}"></script>
@endsection