@extends('admin.layouts.main')

@section('content')
<style>
    .uper{
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Producto
    </div>
    <div class="pull-right">
        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Regresar</a>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
            <form method="POST" action="{{ route('admin.products.update', $product->id)}}">
                @method('PUT')
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
                        <button type="submit" class="btn btn-info pull-right">Guardar cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection