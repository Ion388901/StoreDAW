@extends('layouts.main')

@section('content')
    <div class="tile is-ancestor">
        <div class="tile is-parent">
            <div class="tile box is-child">
                <div class="content">
                    <p class="Title">Ganancias</p>
                    <p class="subtitle">{{ $data['products_sold'] }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection