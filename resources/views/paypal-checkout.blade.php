@extends('layouts.main')
@section('content')
    <section class="checkout-section">
        <div class="pageLoader" id="pageLoader"></div>

        <div class="container">
            <div class="Whitemain white_2">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="missionHeading ownname wow fadeInUp" data-wow-delay="0.6s"
                             style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <a href="{{route('payment_method')}}">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Back</button>
                            </a>
                            <div class="my-heading-1">

                                <span>Checkout</span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-8">
                        <div class="my-box">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="panel panel-default credit-card-box">
                                        <div class="panel-heading display-table">
                                            <div class="row display-tr">
                                                <h3 class="panel-title display-td">Paypal Payment Details</h3>
                                                <div class="visa-cards">
                                                    <ul>
                                                        <li><img src="{{asset('assets/images/visa.png')}}"
                                                                 alt="visa.png"></li>
                                                        <li><img src="{{asset('assets/images/card.png')}}"
                                                                 alt="card.png"></li>
                                                        <li><img src="{{asset('assets/images/card2.png')}}"
                                                                 alt="card2.png"></li>
                                                        <li>and more!</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">


                                            <h1 class="text-center">Paypal Merchant</h1>
                                            <div id="paypal-button-container-popup"></div>
                                            <input type="hidden" name="payment_id" id="payment_id" value="">
                                            <input type="hidden" name="payer_id" id="payer_id">
                                            <input type="hidden" name="marchant_id" id="marchant_id" value="">
                                            <input type="hidden" name="payment_status" id="payment_status" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="my-box">
                            <div class="order-heading">
                                <h3> Order Summary </h3>
                                <h4 class="total" data-id='{{Helper::rate()->rate}}'>
                                    Total<span>${{Helper::rate()->rate}}</span></h4>
                            </div>
                            <div class="col-md-11">
                                <div class="panel panel-default credit-card-box">
                                    <div class="panel-heading display-table">
                                        <div class="row display-tr text-center">
                                            <h5>Enjoy 3 Searches after Payment!</h5>
                                        </div>
                                    </div>

{{--                                    <a href="{{route('paypal')}}">--}}
{{--                                        <img border="0" alt="" src="{{('assets/images/search.jpg')}}" width="120"--}}
{{--                                             height="100">--}}
{{--                                    </a>--}}
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous"/>
@endsection
@section('js')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $body = $("body");
        // $('#paypal-button-container-popup').show();
        paypal.Button.render({
            env: 'sandbox', //sandbox // production
            style: {
                label: 'checkout',
                size: 'responsive',
                shape: 'rect',
                color: 'gold'
            },
            client: {
                sandbox: 'AecOOc2jEXgHOHx8dPM0A_NCpjSlkmu5lP5TW73CLI0P9WD5eLNK4gIz-1S8uIXk0ddTXCRhBwAB6_n1',
            },
            payment: function (data, actions) {

                total_price = {{Helper::rate()->rate}};
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: {total: total_price, currency: 'USD'}
                            }
                        ]
                    }
                });
            },
            onAuthorize: function (data, actions) {
                return actions.payment.execute().then(function () {
                    // generateNotification('success','Payment Authorized');
                    $body.addClass("loading");
                    var dataString = JSON.stringify(data);
                    $('input[name="payment_status"]').val('Completed');
                    $('input[name="payment_id"]').val(data.paymentID);
                    $('input[name="payer_id"]').val(data.payerID);
                    $('input[name="marchant_id"]').val(data.marchant_id);
                    $('input[name="respon_data"]').val(dataString);
                    $('input[name="payment_method"]').val('paypal');
                    swal("Your Payment Successfull");
                    $.ajax({
                        url: "{{ route('paypal_payment') }}",
                        method: "POST",
                        dataType: "JSON",
                        data: {_token: '{{csrf_token()}}', data: data, total_price: total_price},
                        success: function (data) {
                            window.location.href = "{{ route('search')}}";

                        }
                    })

                    return false;

                    // $('#msform').submit();
                    $body.removeClass("loading");
                });
            },
            onCancel: function (data, actions) {

                $('input[name="payment_status"]').val('Failed');
                $('input[name="payment_id"]').val(data.paymentID);
                $('input[name="payer_id"]').val('');
                $('input[name="payment_method"]').val('paypal');
                $('input[name="marchant_id"]').val('marchant_id');
                $('input[name="respon_data"]').val('');
                swal(" Your Payment Denied");
                return false;
            }
        }, '#paypal-button-container-popup');
    </script>
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


