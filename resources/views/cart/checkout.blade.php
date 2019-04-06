@extends('layouts.main')

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
        <a href="{{ route('cart.index') }}" class="btn btn-primary">Regresar</a>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Nombre:</label>
            {{$cart->product_id}}
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
    <td><a href="{{ route('order.review', $cart->id) }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Revisar orden</a></td>
</div>
@endsection
