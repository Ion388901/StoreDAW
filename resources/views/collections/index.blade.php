@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Colecciones
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Índice de colecciones</h3>
                </div>
                <div class="box-body">
                    @if (!$data['collections']->isEmpty())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th># Productos</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['collections'] as $collection)
                            <tr>
                                <td>{{ $collection->id }}</td>
                                <td>{{ $collection->name }}</td>
                                <td>{{ $collection->description }}</td>
                                <td>
                                    <a
                                        href="{{ route('collections.show', ['collection' => $collection]) }}"
                                        class="btn btn-sm btn-default">
                                        <i class="fa fa-eye"></i>
                                        Ver colección
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No existen colecciones</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection