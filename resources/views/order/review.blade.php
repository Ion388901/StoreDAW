@extends('layouts.main')

@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Orders</li>
			</ol>
		</div>
	</div>
</section>

<section id="do_action">
	<div class="container">
		<div class="heading" align="center">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Ordered Products</th>
                <th>Grand Total</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                	@foreach($order->orders as $pro)
                		<a href="{{ url('/cart'.$order->id) }}">{{ $pro->product_id }}</a><br>
                	@endforeach
                </td>
                <td>{{ $order->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
		</div>
	</div>
</section>

@endsection