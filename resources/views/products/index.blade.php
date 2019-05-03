@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Productos
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Índice de productos</h3>
                    <div class="pull-right box-tools">
                        <a
                            class="btn btn-success btn-sm"
                            href="{{ route('products.index', ['order' => 'desc']) }}">
                            Ordenar de forma descendente (precio)
                        </a>
                        <a
                            class="btn btn-success btn-sm"
                            href="{{ route('products.index', ['order' => 'asc']) }}">
                            Ordenar de forma ascendente (precio)
                        </a>
                        <a 
                            class="btn btn-success btn-sm"
                            href="{{ route('cart') }}">
                            Carrito de compras
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    @if (!$data['products']->isEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Descuento</th>
                                    <th>Colección</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['products'] as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Mostrar producto</a>
                                    <p class="btn-holder">
                                        <a href="{{ route('add-to-cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Añadir al carrito</a> 
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No existe ningun producto</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection