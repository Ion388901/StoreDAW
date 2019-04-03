@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Colección
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Nombre de la colección: {{ $data['collection']->name }}</h3>
                </div>
                <div class="box-body">
                    @if (!$data['collection']->products->isEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Productos</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['collection']->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Esta colección no tiene productos</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection