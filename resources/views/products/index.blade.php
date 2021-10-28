@push('css')
    <link rel="stylesheet" href="{{ asset("css/jConfirm.css") }}"/>
@endpush

@extends('layouts.app')

@section('breadcrumb')
    <div class="breadcrumb">
        <h1>Product</h1>
        <ul>
            <li>Products List</li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-4 o-hidden">
                    <img class="card-img-top" src="{{$product->imagePath()}}" alt="{{$product->name}}"/>
                    <div class="card-body">
                        <p>{{ $product->name }}</p>
                        <p>Precio {{ $product->price }}</p>
                        <p>Ordenes generadas {{ $product->orders_count }}</p>
                        <button class="btn btn-primary btn-show-modal"
                                data-name="{{ $product->name }}"
                                data-id="{{ $product->id }}"
                                type="button">
                            Generar orden
                        </button>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    @auth
        <div class="text-right mt-5">
            <button class="btn btn-info btn-lg"
                    data-toggle="modal"
                    data-target="#form_product"
                    type="button">
                Crear producto
            </button>
        </div>
    @endauth

@endsection


@push("js")
    <script>
        jQuery(document).ready(function () {

            $('.btn-show-modal').on('click', function () {
                const formOrder = $('#form_order');
                $('#product_id').val($(this).data('id'));
                $('#product_name').val($(this).data('name'));
                formOrder.modal('show');
            })

            $('.btn-show-modal-edit').on('click', function () {

                const formProduct = $('#form_product_edit');
                const product = $(this).data('product');

                formProduct.find("input#id").val(product.id);
                formProduct.find("input#name").val(product.name);
                formProduct.find("input#price").val(product.price);

                formProduct.modal('show');
            })

            @if (count($errors) > 0)
            $('#form_product').modal('show');
            @endif

        });


    </script>
@endpush

