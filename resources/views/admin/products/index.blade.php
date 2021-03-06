@extends ('admin.layouts.main')

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
                        <a class="btn btn-info btn-sm" href="{{ route('admin.products.create') }}">
                            Crear nuevo producto
                        </a>
                        <a
                            class="btn btn-success btn-sm"
                            href="{{ route('admin.products.index', ['order' => 'desc']) }}">
                            Ordenar de forma descendente (precio)
                        </a>
                        <a
                            class="btn btn-error btn-sm"
                            href="{{ route('admin.products.index', ['order' => 'asc']) }}">
                            Ordenar de forma ascendente (precio)
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
                                    <th>Cantidad</th>
                                    <th>Descuento</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['products'] as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->discount }}</td>
                                <td>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info">Mostrar producto</a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No existe ningun producto: <a href="{{ route('admin.products.create') }}">crea uno aquí</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection