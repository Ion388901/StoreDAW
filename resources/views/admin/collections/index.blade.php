@extends ('admin.layouts.main')

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
                    <div class="pull-right box-tools">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.collections.create') }}">
                            Crear nueva colección
                        </a>
                    </div>
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
                                    <form action="{{ route('admin.collections.destroy', $collection->id) }}" method="POST">
                                    <a
                                        href="{{ route('admin.collections.show', ['collection' => $collection]) }}"
                                        class="btn btn-sm btn-default">
                                        <i class="fa fa-eye"></i>
                                        Ver colección
                                    </a>
                                    <a href="{{ route('admin.collections.edit', $collection->id) }}" class="btn btn-primary">Editar colección</a>
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
                        <p>No existen colecciones: <a href="{{ route('admin.collections.create') }}">crea uno aquí</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection