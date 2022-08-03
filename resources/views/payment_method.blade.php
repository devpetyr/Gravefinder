@extends('layouts.main')
@section('content')
    <section class="checkout-section">
        @if(Session::has('success'))
            <p class="alert
{{ Session::get('alert-class', 'alert-info') }}">{{Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
            <p class="alert
{{ Session::get('alert-class', 'alert-danger') }}">{{Session::get('error') }}</p>
        @endif
        <div class="pageLoader" id="pageLoader"></div>
        <div class="container">
            <div class="Whitemain">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <center>
                            <div class="missionHeading ownname wow fadeInUp text-center" data-wow-delay="0.6s"
                                 style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                                <span>Payment For Searches</span>

                            </div>
                        </center>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-8">
                        <div class="main-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default credit-card-box">
                                        <div class="panel-heading display-table">
                                            <div class="row display-tr">
                                                <h3 class="panel-title display-td">Choose Your Method!</h3>
                                            </div>
                                        </div>
                                        <div class="row my-imgs">
                                            <div class="col-sm-6">
                                                <a href="{{route('checkout')}}">
                                                    <img border="0" alt="" src="{{asset('assets/images/logo-stripe.png')}}"
                                                         width="100" height="100">
                                                </a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="{{route('paypal')}}">
                                                    <img border="0" alt="" src="{{asset('images/paypal.png')}}" width="100"
                                                         height="100">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="main-box">
                            <div class="row">
                                <div class="order-heading">
                                    <h3> Order Summary </h3>
                                </div>

                                <div class="col-md-12">
                                    <div class="panel panel-default credit-card-box">
                                        <div class="panel-heading display-table">
                                            <div class="row display-tr text-center">
                                                <h4 class="panel-title display-td">3 Searches: ${{Helper::rate()->rate}}</h4>
                                                <h4 class="panel-title display-td">You need to pay ${{Helper::rate()->rate}} to get 3 searches.</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section>
@endsection
@section('css')

@endsection
@section('js')

@endsection


