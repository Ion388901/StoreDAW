@extends('layouts.main')

@section('title', 'Cart')
<!-- Ver si el section(title, cart) es necesario o se puede eliminar -->
@section('content')

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Producto</th>
            <th style="width:25%">Precio</th>
            <th style="width:25%">Cantidad</th>
            <th style="width:20%" class="text-center">Subtotal</th>
            <th style="width:15%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>

        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                <?php $total += $details['price'] * $details['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
        <!-- revisar porque no funcionan los botones de update y remove cart. posiblemente tiene que ver con ids de productos pero no he podido identificar la causa -->

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ route('products.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Continua Comprando</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            <td><a href="{{ route('order.create') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Hacer checkout</a></td>
        </tr>
        </tfoot>
    </table>

@endsection


@section('scripts')

<script type="text/javascript">
    $(function(){
        console.log("un string");
        $(".update-cart").click(function (e) {
           e.preventDefault();
            
           var ele = $(this);

            $.ajax({
               url: '{{ route('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ route('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    });
</script>
<!-- revisar porque no funcionan los botones de update y remove cart. posiblemente tiene que ver con ids de productos pero no he podido identificar la causa -->
@endsection