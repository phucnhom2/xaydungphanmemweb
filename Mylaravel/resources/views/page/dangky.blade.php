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
                    <h2>Đăng Ký</h2>
                </div>

                <div class="row">
                    <form class="row contact_us_form" action="{{route('signin')}}" method="post" id="contactForm" novalidate="novalidate">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="col-lg-7">
                            <div class="row">
                                @if(count($errors)>0)
                                <div class="alert alert-danger">
                                   @foreach($errors->all() as $err)
                                   {{$err}}
                                   @endforeach
                               </div>
                               @endif

                               @if(Session::has('thanh công'))
                               <div class="alert alert-success">
                               {{Session::get('thành Công')}}
                           </div>
                           @endif
                           <div class="form-group col-md-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="adress" name="address" placeholder="address">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" id="password" name="password" placeholder="passwork">
                        </div>
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="repassword">
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
