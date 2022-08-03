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
                                <span>Checkout</span>

                            </div>
                        </center>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="panel panel-default credit-card-box">
                                    <div class="panel-heading display-table">
                                        <div class="row display-tr">
                                            <h3 class="panel-title display-td">Payment Details</h3>
                                            <div class="visa-cards">
                                                <ul>
                                                    <li><img src="{{asset('assets/images/visa.png')}}" alt="visa.png">
                                                    </li>
                                                    <li><img src="{{asset('assets/images/card.png')}}" alt="card.png">
                                                    </li>
                                                    <li><img src="{{asset('assets/images/card2.png')}}" alt="card2.png">
                                                    </li>
                                                    <li>and more!</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">


                                        <form
                                                role="form"
                                                action="{{ route('stripe_cart_payment') }}"
                                                method="post"
                                                class="require-validation"
                                                data-cc-on-file="false"
                                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                id="payment-form">
                                            @csrf

                                            <div class='form-row row'>
                                                <div class='col-xs-12 form-group required'>
                                                    <label class='control-label'>Name on Card</label> <input
                                                            class='form-control' size='4' type='text'>
                                                </div>
                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-xs-12 form-group card required'>
                                                    <label class='control-label'>Card Number</label> <input
                                                            autocomplete='off' maxlength="16" size='20'
                                                            class='form-control card-number' size='20'
                                                            type='text'>
                                                </div>
                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                                    class='form-control card-cvc'
                                                                                                    placeholder='ex. 311'
                                                                                                    size='4'
                                                                                                    type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Month</label> <input
                                                            class='form-control card-expiry-month' placeholder='MM'
                                                            size='2'
                                                            type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Year</label> <input
                                                            class='form-control card-expiry-year' placeholder='YYYY'
                                                            size='4'
                                                            type='text'>
                                                </div>
                                            </div>
                                            <input type="hidden" name="pricehere" id="pricehere" value="{{$price}}">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay
                                                        Now ${{$price}}</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="order-heading">
                        </div>
                        <div class="my-box">
                            <div class="order-heading text-center">
                                <hr>
                                <h3> Order Summary </h3>
                                <hr>
                                <h4>Total:<span>${{$price}}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('css')
    <style type="text/css">
        .pageLoader {
            background: url(../assets/images/Hourglass.gif) no-repeat center center;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 9999999;
            background-color: #ffffff8c;

        }
    </style>
@endsection
@section('js')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(window).on('beforeunload', function () {
            $('#pageLoader').show();

        });

        $(function () {

            $('#pageLoader').hide();
        })
        $(function () {

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function (e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
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


