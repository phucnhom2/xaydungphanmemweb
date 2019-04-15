@extends('master')

@section('content')

        <!--================End Main Header Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_text">
                    <h3>Chekout</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="checkout.html">Chekout</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Main Header Area =================-->

        <!--================Billing Details Area =================-->
        <section class="billing_details_area p_100">
            <div class="container">
                <div class="return_option">
                    <h4>Returning customer? <a href="#">Click here to login</a></h4>
                </div>
                <div class="row">
                    <form class="billing_form row" action="{{route('dathang')}}" method="post" id="contactForm" novalidate="novalidate">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" placeholder="">
                        <div class="col-lg-7">
                            <div class="main_title">
                                <h2>Billing Details</h2>
                            </div>
                            <div class="billing_form_area">

                                    <div class="form-group col-md-6">
                                        <label for="first">Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="First Name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="last">Sex</label>
                                        <input type="radio" class="form-control" id="gender" name="gender" value="Nam" placeholder="">Male
                                        <input type="radio" class="form-control" id="gender" name="gender" value="Nữ" placeholder="" chedcked>Female
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Address *</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Street Address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone *</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Select an option">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="phone">Order Notes</label>
                                        <textarea class="form-control" name="note" id="note" rows="1" placeholder="Note about your order. e.g. special note for delivery"></textarea>
                                    </div>

                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="order_box_price">
                                <div class="main_title">
                                    <h2>Your Order</h2>
                                </div>

                                <div class="payment_list">
                                    <div class="price_single_cost">
                                        <h5>Prodcut <span>Total</span></h5>
                                        <h5>Electric Hummer x 1 <span>$65.00</span></h5>
                                        <h4>Subtotal <span>$65.00</span></h4>
                                        <h5>Shipping And Handling<span class="text_f">Free Shipping</span></h5>


                                        <h3>Total <span>{{number_format(Session('cart')->totalPrice)}}</span></h3>
                                    </div>
                                    <div id="accordion" class="accordion_area">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Direct Bank Transfer
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="payment" name="payment">
                                                    Check Payment
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Paypal
                                                    <img src="img/checkout-card.png" alt="">
                                                    </button>
                                                    <a href="#">What is PayPal?</a>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" value="" class="btn pest_btn">place order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--================End Billing Details Area =================-->

        <!--================Newsletter Area =================-->
        <section class="newsletter_area">
            <div class="container">
                <div class="row newsletter_inner">
                    <div class="col-lg-6">
                        <div class="news_left_text">
                            <h4>Join our Newsletter list to get all the latest offers, discounts and other benefits</h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="newsletter_form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">Subscribe Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Newsletter Area =================-->
        @endsection
