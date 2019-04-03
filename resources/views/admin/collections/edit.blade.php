@extends('admin.layouts.main')

@section('content')
<style>
    .uper{
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Colección
    </div>
    <div class="pull-right">
        <a href="{{ route('admin.collections.index') }}" class="btn btn-primary">Regresar</a>
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
            <form method="POST" action="{{ route('admin.collections.update', $data['collection']->id)}}">
                @method('PUT')
                @csrf
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input name="collection[name]" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <input name="collection[description]" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Productos</label>
                            <select name="product[product_id]" class="form-control">
                            @foreach ($data['products'] as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                            </select>
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