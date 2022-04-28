@extends('page.master')
@section('content')
<section class="content-page">
                <div class="container mb-80">
                    <div class="row">
                        <div class="col-sm-12">
                            <article class="post-8">
                                <form class="product-checkout mt-45">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-order-review">
                                                <h3>Order details</h3>
                                                <div class="product-checkout-review-order">
                                                    <div class="responsive-table">
                                                        <table class="">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name">Product</th>
                                                                    <th class="product-total">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($data -> items as $item)
                                                                <tr class="cart_item">
                                                                    <td class="product-name">{{$item['name']}}<strong> x {{ $item['quantity']}}</strong></td>
                                                                    <td class="product-total">
                                                                        <span class="product-price-amount amount"><span class="currency-sign">$</span>{{$item['quantity'] * $item['price']}}</span>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="cart-subtotal">
                                                                    <th>Subtotal</th>
                                                                    <td>
                                                                        <strong><span class="product-price-amount amount"><span class="currency-sign">$</span>{{$data -> totalPrice}}</span></strong>
                                                                    </td>
                                                                </tr>
                                                                <tr class="cart-subtotal">
                                                                    <th>Order status</th>
                                                                    <td>
                                                                        <strong><span class="product-price-amount amount">Success</strong>
                                                                    </td>
                                                                </tr>

                                                                <tr class="cart-subtotal">
                                                                    <th>Payment</th>
                                                                    <td>
                                                                        @if($payment == 0 )

                                                                         <strong><span class="product-price-amount amount">Unpaid {{$payment}}</strong>
                                                                        @else
                                                                        <strong><span class="product-price-amount amount">Paid</strong>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                    <div class="product-checkout-payment">
                                                     
                                                        <div class="place-order">
                                                            <a class="btn btn-lg btn-color form-full-width" href="{{route('home')}}">Come back continue to buy</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </article>
                        </div>
                    </div>
                </div>

            </section>
@stop