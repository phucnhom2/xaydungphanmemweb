@extends('master');
@section('content');
<!--================End Main Header Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_text">
                    <h3>Contact Us</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="single-blog.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Main Header Area =================-->

        <!--================Contact Form Area =================-->
        <section class="contact_form_area p_100">
            <div class="container">
                <div class="main_title">
                    <h2>Login *</h2>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <form class="row contact_us_form" action="{{route('login')}}" method="post" id="contactForm" novalidate="novalidate">
                            {{csrf_field()}}
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $er)
                                {{$er}}<br>
                                @endforeach
                            </div>
                            @endif
                            @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                            @endif
                            <div class="form-group col-md-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                            </div>

                            <div class="form-group col-md-12">
                                <button type="submit" value="submit" class="btn order_s_btn form-control">submit now</button>
                            </div>
                        </form>
                </div>
            </div>
        </section>
        <!--================End Contact Form Area =================-->
@endsection
