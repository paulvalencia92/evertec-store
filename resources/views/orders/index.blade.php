@push('css')
    <link rel="stylesheet" href="{{ asset("css/jConfirm.css") }}"/>
@endpush
@extends('layouts.app')
@section('breadcrumb')
    <div class="breadcrumb">
        <h1>Orders</h1>
        <ul>
            <li>Orders list only admin</li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Ordenes de la tienda</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, ad architecto aut corporis
                        error eum id illo ipsam iste labore, modi nostrum porro quod sunt temporibus totam veritatis!
                        Dolorum, eius?</p>
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered" id="zero_configuration_table"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cliente</th>
                                <th>Correo</th>
                                <th>Ciudad</th>
                                <th>Dirección</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->product->price }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->customer->email }}</td>
                                    <td>{{ $order->customer->city }}</td>
                                    <td>{{ $order->customer->address }}</td>
                                    <td class="{{ $order->status_class }}">{{ $order->status }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
