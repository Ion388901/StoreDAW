@extends('admin.layouts.main')

@section('content')
<style>
    .uper{
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Reporte de la tienda
    </div>
    <div class="pull-right">
        <a href="{{ route('admin.dashboard.index') }}" class="btn btn-primary">Regresar</a>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Ventas totales</label>
            {{ $data['products_sold'] }}
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Producto más vendido</label>
            {{ $data['name_sold'] }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Cantidad</label>
            {{ $data['quantity_selled'] }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Cliente más valioso</label>
            {{ $data['best_costumer'] }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label>Cantidad comprada por el cliente</label>
            {{ $data['quantity_bought'] }}
        </div>
    </div>
</div>
@endsection