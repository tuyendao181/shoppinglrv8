@extends('page.master')
@section('content')

            <!-- Bread Crumb -->
            <section class="breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="breadcrumb-link">
                                <a href="#">Home</a>
                                <span>Checkout</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Bread Crumb -->

            <!-- Page Content -->

            
            <section class="content-page">
                <div class="container mb-80">
                    <div class="row">
                        <div class="col-sm-12">


                        @if(Session::has('error'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{Session::get('error')}}</li>
                                </ul>
                            </div>
                        @endif

                            <article class="post-8">
                               
                                <form class="product-checkout mt-45">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Billing details</h3>
                                            <div class="row">
                                             
                                                <div class="form-field-wrapper form-center col-sm-12">
                                                    <label for="name" class="left">Name</label>
                                                    <input id="name" class="input-md form-full-width" name="name" title=" Name" value="" placeholder="Name" type="text">
                                                    <span class="text-danger error-text name_error"></span>
                                                </div>

                                        
                                                <div class="form-field-wrapper form-center col-sm-12">
                                                    <label for="billing_address" class="left">
                                                        Address
                                                        <abbr class="form-required" title="required">*</abbr></label>
                                                    <input id="address" class="input-md form-full-width mb-20" name="billing_address" title="Address" value="" placeholder="Street Address" type="text" required="" aria-required="true">
                                                    <span class="text-danger error-text address_error"></span>
                                                </div>
                                               
                                              
                                                <div class="form-field-wrapper form-center col-sm-6">
                                                    <label for="billing_phone" class="left">
                                                        Phone
                                                        <abbr class="form-required" title="required">*</abbr></label>
                                                    <input  id="phone" class="input-md form-full-width" name="billing_phone" title="phone" value="" placeholder="(+00) 123 456 7890" type="tel" required="" aria-required="true">
                                                    <span class="text-danger error-text phone_error"></span>
                                                </div>
                                                <div class="form-field-wrapper form-center col-sm-6">
                                                    <label for="billing_email" class="left">
                                                        Email
                                                        <abbr class="form-required" title="required">*</abbr></label>
                                                    <input id="email" class="input-md form-full-width" name="billing_email" title="Enter Email" value="" placeholder="Enter Email" type="email" required="" aria-required="true">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-order-review">
                                                <h3>Your order</h3>
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
                                                                @foreach($cart->items as $item)
                                                             
                                                                <tr class="cart_item">
                                                                    <td class="product-name">{{$item['name']}}<strong> x {{$item['quantity']}}</strong></td>
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
                                                                        <strong><span class="product-price-amount amount"><span class="currency-sign">$</span>{{$cart -> totalPrice}}</span></strong>
                                                                    </td>
                                                                </tr>
                                                                <tr class="shipping">
                                                                    <th>Shipping</th>
                                                                    <td>
                                                                        <ul id="shipping_method">
                                                                         
                                                                            <li>
                                                                                <input name="shipping_method[0]" data-index="0" id="shipping_method_0_legacy_free_shipping" value="legacy_free_shipping" class="shipping_method" type="radio">
                                                                                <label for="shipping_method_0_legacy_free_shipping">Free Shipping</label>
                                                                            </li>
                                                                           
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr class="order-total">
                                                                    <th>Total</th>
                                                                    <td>
                                                                        <span class="product-price-amount amount"><span class="currency-sign">$</span>{{$cart -> totalPrice}}</span>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                    <div class="product-checkout-payment">
                                                        <ul>
                                                            <li>
                                                                <input id="payment_method_paypal" name="payment_method" value="paypal" type="radio" />
                                                                <label for="payment_method_paypal">
                                                                   
                                                                    <a class="" id="paypal" data-url="{{route('processTransaction')}}" href="{{route('processTransaction')}}"><img class="paypal-img" src="https://quyetdao.com/wp-content/uploads/2019/04/paypal-logo.png" /></a>
                                                                </label>
                                                            </li>
                                                        </ul>
                                                        <div class="place-order">
                                                            <a class="btn btn-lg btn-color form-full-width" id="checkout" data-url="{{route('postCheckout')}}" data-order="{{route('getOrderdetail')}}" href="">Place Order</a>
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
            <!-- End Page Content -->
@stop