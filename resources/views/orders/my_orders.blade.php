@extends('layouts.app')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>Orders</h1>
        <ul>
            <li>My Orders List</li>
        </ul>
    </div>
@endsection


@section('content')
    @if($orders->isEmpty())

        <div class="alert alert-warning">
            Por favor ingresa un correo electronico para encontrar ordenes asociadas a un determinado usuario
        </div>

    @endif

    <div class="text-right">
        <button type="button" id="search_orders" class="btn btn-info btn-lg mb-4">Buscar ordenes</button>
    </div>

    @include('orders.form_search_orders')



    <div class="row">
        @foreach($orders as $order)
            <div class="col-md-4">
                <div class="card card-icon mb-4 p-4">
                    <div class="card-body text-center"><i class="i-Checkout-Basket"></i>
                        <p class="text-muted mt-2 mb-2"><b>Producto: </b>{{ $order->product->name }}</p>
                        <p class="text-muted mt-2 mb-2"><b>Solicitado por: </b>{{ $order->customer->name }}</p>
                        <p class="text-muted mt-2 mb-2"><b>Correo: </b>{{ $order->customer->email }}</p>
                        <p class="text-muted mt-2 mb-2"><b>Direccion: </b>{{ $order->customer->address }}</p>
                        <p class="text-muted mt-2 mb-2"><b>Ciudad: </b>{{ $order->customer->city }}</p>
                        <p class="text-muted mt-2 mb-2">
                            <b>Estado:
                                <span class="{{ $order->status_class }}">{{ $order->status }}</span>
                            </b>
                        </p>
                        <p class="lead text-22 m-0">$ {{ $order->product->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection



@push("js")
    <script>
        jQuery(document).ready(function () {
            $('#search_orders').on('click', function () {
                const formOrder = $('#form_my_orders');
                formOrder.modal('show');
            })
        });


    </script>
@endpush

