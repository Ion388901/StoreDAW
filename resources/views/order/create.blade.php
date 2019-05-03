@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="step-one">
            <h2 class="heading">Shipping To</h2>
        </div>
        <div class="row">
            <a href="{{ route('order.review') }}" class="btn btn-info">Realizar compra</a>
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <input type="hidden" name="status" value="success">
                
                    <input type="hidden" name="total" value="{{$total}}">

                    <section id="cart_items">
                        <div class="review-payment">
                            <h2>Review & Payment</h2>
                        </div>
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                <tr class="cart_menu">
                                    <td class="image">Item</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart_datas as $cart_data)
                                    <tr>
                                    <td class="cart_description">
                                        <h4><a href="">{{$cart_data->product_name}}</a></h4>
                                        <p>{{$cart_data->product_code}}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>${{$cart_data->price}}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <p>{{$cart_data->quantity}}</p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">$ {{$cart_data->price*$cart_data->quantity}}</p>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td colspan="2">
                                        <table class="table table-condensed total-result">
                                            <tr>
                                                <td>Cart Sub Total</td>
                                                <td>$ {{$total_price}}</td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td><span>$ {{$total_price}}</span></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection

<!-- Revisar con el profesor este código tomado de otro proyecto y ver que cambios hay que poner para que funcione -->