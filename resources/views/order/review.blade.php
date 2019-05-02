@extends('layouts.main')

@section('content')

<h1 class="title">Checkout del carrito</h1>
<table class="table">
    <tr>
        <th>Orden</th>
        <td>{{ $data['order']->order_id }}</td>
    </tr>
    <tr>
        <th>Productos</th>
        <td>{{ $data['order']->cart }}</td>
    </tr>
    <tr>
        <th>Total</th>
        <td>{{ $data['order']->total }}</td>
    </tr>
    <tr>
        <td colspan="2">
            Acción de comprar
            <div id="paypal-button-container"></div>
        </td>
    </tr>
</table>
@endsection

@push('layout_end_body')
<script
    src="https://www.paypal.com/sdk/js?client-id=AeNZ2yAx7qVd0-FhmRPVhAj8R0X-1E2iCaNn9JwI4QEATcQ87_rpmAl4Y0BkiznlRGMAwU7nnO4HMtE4&currency=MXN">
</script>
<script>
    paypal.Buttons({
    createOrder: function(data, actions) {
        // Set up the transaction
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '{{ $data['product']->price }}'
                }
            }]
        });
        },
            onApprove: function(data, actions) {
                // Capture the funds from the transaction
                return actions.order.capture().then(function(details) {
                    // Call your server to save the transaction
                    return fetch('{{ route('orders.transaction', ['order' => $data['cart']])}}', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                    })
                    .then(function(response) {
                        if (response.ok) {
                            window.location = '{{ route('orders.transaction.success', ['order' => $data['cart']]) }}';
                        } else {
                            console.log(response);
                        }
                    });
                });
            }
    }).render('#paypal-button-container');
</script>
@endpush