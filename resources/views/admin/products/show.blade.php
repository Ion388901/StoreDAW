@extends('admin.layouts.main')

@section('content')
<style>
    .uper{
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Vista Detallada
    </div>
    <div class="pull-right">
        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Regresar</a>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Nombre:</label>
            {{$product->name}}
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Descripcion:</label>
            {{$product->description}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Precio:</label>
            {{$product->price}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Descuento:</label>
            {{$product->discount}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Colección:</label>
            {{$product->collection_id->name}}
        </div>
    </div>
</div>
@endsection