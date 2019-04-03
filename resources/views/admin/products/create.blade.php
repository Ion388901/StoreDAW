@extends ('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Crear un nuevo producto
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="pull-right">
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Regresar</a>
            </div>
            <form method="POST" action="{{ route('admin.products.store') }}">
                @csrf
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input name="product[name]" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <input name="product[description]" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input name="product[price]" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Descuento</label>
                            <input name="product[discount]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Crear producto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection