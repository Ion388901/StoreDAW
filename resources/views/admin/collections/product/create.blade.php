@extends ('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Agregar productos a la colección
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Nombre de la colección</label>
                        <input type="text" class="form-control" value="{{ $data['collection']->name }}" disabled>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.collections.products.store', ['collection' => $data['collection']]) }}">
                @csrf
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Producto a agregar</label>
                            <select name="product_collection[product_id]" class="form-control">
                                <option value="">Selecciona un producto</option>
                                @foreach ($data['products'] as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Agregar producto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection