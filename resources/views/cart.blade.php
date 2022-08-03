@extends('layouts.main')
@section('content')
    <section class="checkout-section">

        <div class="pageLoader" id="pageLoader"></div>
        <div class="container">
            <div class="Whitemain">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="missionHeading ownname wow fadeInUp" data-wow-delay="0.6s"
                             style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <a href="{{route('search')}}">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Back</button>
                            </a>
                            <div class="my-heading-1">
                                <span>Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="container">
                            <div class="row">
                                @if(session('cart') != '')
                                <div class="col-md-9 col-sm-12 col-xs-12">

                                    <div class="table-responsive">

                                            <table class="table tables_text">

                                                <thead>

                                                <tr>

                                                    <th>Item Name</th>
                                                    <th>Price</th>
                                                    <th>Remove</th>

                                                </tr>

                                                </thead>

                                                <tbody>

                                                <?php
                                                $pricing = 0;
                                                ?>
                                                @foreach(session('cart') as $id => $details)
                                                    <tr class="space">
                                                        <td class="col-md-5">

                                                            <div class="row">

                                                                <div class="table-space">

                                                                    <div class="col-md-7 no-space">
                                                                        <h4>{{ $details['name'] }} {{ $details['pic'] }}</h4>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </td>

                                                        <td class="col-md-2">

                                                            <h4>${{ $details['price'] }}</h4>

                                                        </td>

                                                        <td><a class="center_rem"
                                                               href="{{route('remove.from.cart',$id)}}"
                                                               class="remove">x</a></td>

                                                    </tr>
                                                    <?php
                                                    $pricing += $details['price'];
                                                    ?>
                                                @endforeach

                                                </tbody>

                                            </table>


                                    </div>


                                </div>
                                @else
                                    <div>
                                        <h4 class="text-center">Your Cart is Empty at the moment!</h4>
                                    </div>
                                @endif

                                @if(session('cart') != '')
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="my-box">
                                            <div class="order-heading text-center">
                                                <hr>
                                                <h3> Order Summary </h3>
                                                <hr>

                                                <h4>
                                                    <li>Sub Total <span>$@if(isset($pricing)){{$pricing}}@endif</span>
                                                    </li>
                                                </h4>


                                                <h4>
                                                    <li class="color-change">
                                                        Total:$@if(isset($pricing)){{$pricing}}@endif
                                                        <span></span></li>
                                                </h4>
                                            </div>
                                            <hr>
                                            <div class="col-md-12">
                                                <h3> Payment Methods </h3>
                                                <hr>
                                                <div class="panel panel-default credit-card-box">
                                                    <div class="panel-heading display-table">
                                                        <div class="row display-tr">
                                                            <ul>
                                                                @if(session('cart') != '')
                                                                    {{--                                                                <li><img border="0" alt="" src="{{asset('assets/images/logo-stripe.png')}}"--}}
                                                                    {{--                                                                         width="100%" height="100%"></li>--}}
                                                                    @if(isset($pricing))
                                                                        <li>
                                                                            <a href="{{route('stripe_cart',Crypt::encryptString($pricing))}}">
                                                                                <img border="0" alt=""
                                                                                     src="{{asset('assets/images/logo-stripe.png')}}"
                                                                                     width="100%" height="100%">
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endif
                                                            </ul>
                                                            <ul>
                                                                @if(session('cart') != '')
                                                                    @if(isset($pricing))
                                                                        <li>
                                                                            <a href="{{route('paypal_cart',Crypt::encryptString($pricing))}}">
                                                                                <img border="0" alt=""
                                                                                     src="{{asset('images/paypal.png')}}"
                                                                                     width="100%" height="100%">
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endif
                                                            </ul>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{--                                <div class="col-md-3 col-sm-12 col-xs-12">--}}

                                {{--                                    <div class="total-section">--}}

                                {{--                                        <ul>--}}
                                {{--                                            @if(session('cart') != '')--}}

                                {{--                                                <li>Sub Total <span>$@if(isset($pricing)){{$pricing}}@endif</span></li>--}}


                                {{--                                                <li class="color-change">Total:$ @if(isset($pricing)){{$pricing}}@endif--}}
                                {{--                                                    <span></span></li>--}}
                                {{--                                            @endif--}}
                                {{--                                        </ul>--}}

                                {{--                                    </div>--}}

                                {{--                                    <div class="ship-estimate">--}}

                                {{--                                        <ul>--}}
                                {{--                                            @if(session('cart') != '')--}}
                                {{--                                                <li><img height="100" width="100"--}}
                                {{--                                                         src="{{asset('assets/images/stripe.png')}}" alt=""></li>--}}
                                {{--                                                @if(isset($pricing))--}}
                                {{--                                                    <li>--}}
                                {{--                                                        <a href="{{route('stripe_cart',Crypt::encryptString($pricing))}}">Pay--}}
                                {{--                                                            With Stripe</a></li>--}}
                                {{--                                                @endif--}}
                                {{--                                            @endif--}}
                                {{--                                        </ul>--}}
                                {{--                                        <ul>--}}
                                {{--                                            @if(session('cart') != '')--}}
                                {{--                                                <li><img height="100" width="100"--}}
                                {{--                                                         src="{{asset('assets/images/paypal.png')}}" alt=""></li>--}}
                                {{--                                                @if(isset($pricing))--}}
                                {{--                                                    <li>--}}
                                {{--                                                        <a href="{{route('paypal_cart',Crypt::encryptString($pricing))}}">Pay--}}
                                {{--                                                            With Paypal</a></li>--}}
                                {{--                                                @endif--}}
                                {{--                                            @endif--}}
                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}

                                {{--                                </div>--}}

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
    <script>
        @if(Session::has('message'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.success("{{ session('message') }}");
        @endif

                @if(Session::has('error'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.error("{{ session('error') }}");
        @endif

                @if(Session::has('info'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.info("{{ session('info') }}");
        @endif

                @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton": true,
                "progressBar": true
            }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@endsection


