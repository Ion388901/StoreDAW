@extends ('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Crear nueva colección
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
            <form method="POST" action="{{ route('admin.collections.store') }}">
                @csrf
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input name="collection[name]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <input name="collection[description]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Crear colección</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection