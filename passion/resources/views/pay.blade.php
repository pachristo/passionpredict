@extends('layout.main')
@section('title')
    Payment - Passionpredict.com
@endsection
@section('seo')
<meta name="description" content="Passion Predict is an innovative sure football prediction site passionately provided in providing the most accurate football predictions" />
<link rel="canonical" href="https://passionpredict.com/" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Passionpredict &raquo; Sure Football Prediction Site" />
<meta property="og:description" content="Passion Predict is an innovative sure football prediction site passionately provided in providing the most accurate football predictions" />
<link rel="icon" href="{{ asset('favicon.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon.png') }}">
<meta property="og:url" content="https://passionpredict.com/" />
<meta property="og:type" content="article" />

<meta property="og:image" content="{{ asset('favicon.png') }}" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="140" />
<meta property="og:image:height" content="140" />
@endsection
@section('levelCSS')

@endsection
@section('price', 'active')

@section('content')
    @include('partials.breadcrum', ['title' => 'Payment Methods '])
    <div class="container text-center">
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5>{!! session()->get('error') !!}</h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
        @if (session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">>
                <h5>{!! session()->get('warning') !!}</h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif

        </div>
    <style>
        .pricing {
            text-align: center;

        }



        .priceBox>div {

            background: #071d40;
    border: 10px double #eaeef2;
    border-radius: 24px;
    padding: 7px;

        }

        /* .price-block {
            background: #3c4611;
            margin: 4px;
            padding: 12px;
            border-radius: 10px;
        } */

        .text-danger {
            color: #12180e;
        }

        .social-media {
            color: white;
        }

        @media (max-width: 978px) {
            .priceBox {
                padding: 0px;
            }

            .nopaddingsmall {
                padding: 0px;
            }
        }

        blockquote {
            padding: 10px 20px;
            margin: 0 0 20px;
            font-size: 17.5px;
            border-left: 0px;
        }

        .badge {
            display: inline-block;
            min-width: 31px;
            padding: 3px 7px;
            font-size: 15px;
            font-weight: bold;
            color: #ffffff57;
            line-height: 1;
            vertical-align: middle;
            white-space: nowrap;
            text-align: center;
            background-color: #de4302;
            border-radius: 10px;
        }

        /* .text-danger {
            color: #12f110 !important;
        } */
        .btn-danger {
    color: #fff;
    background-color: #dc2c31;
    border-color: #d5282c;
}


        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
            border: 1px solid #86909a;
        }
        .price-head{
            font-weight: 900
            font-size:18px;
            font-family:'Audiowide';
        }
        .bg-success {
    background-color: #ec4357!important;
    color: white!important;
}
    </style>
    <?php

    if (session()->has('subRoute')) {
        # code..sess
        session()->forget('subRoute');
    }

    ?>
    <div class="container  container-bg">





        <div class="container  ">
            <div class="col-sm-12 paddingsmall">
                <br>
                <table class="table table-striped table-bordered">
                    <tr style="  ">
                        <th>Category</th>
                        <th>Plan</th>
                        <th>Price</th>
                        <th>Duration</th>
                    </tr>
                    <tr style="  ">
                        <td>{{ $sub->category }}</td>
                        <td>{{ $sub->planName }}</td>
                        <td>
                            @if (strpos('Nigeria', currentUser()->country) !== false)
                                N{{ number_format($sub->nairaPrice) }}
                            @elseif(strpos('Kenya', currentUser()->country) !== false)
                                {{ number_format($sub->keshPrice) }} KES
                            @elseif(strpos('Uganda', currentUser()->country) !== false)
                                {{ number_format($sub->ugxPrice) }} UGX
                            @elseif(strpos('Tanzania, United Republic of', currentUser()->country) !== false)
                                {{ number_format($sub->tzsPrice) }} TZS
                            @elseif(strpos('Ghana', currentUser()->country) !== false)
                                {{ number_format($sub->cedPrice) }} GHS
                            @elseif(strpos('South Africa', currentUser()->country) !== false)
                                {{ number_format($sub->zarPrice) }} ZAR
                            @else
                                ${{ number_format($sub->dollarPrice) }}
                            @endif
                        </td>
                        <td>{{ $sub->accessTime }}</td>
                    </tr>
                </table>


            </div>
            <hr>
            <div class="col-sm-12 mt30 nopaddingsmall text-center">
                <blockquote>Payment methods available in <strong
                        style="color: green;">{{ currentUser()->country }}</strong>
                    <br><small>Not your country? <a href="{{ route('/country') }}">Change Here</a></small>
                </blockquote>
            </div>


            <div class="row justify-content-center">


                    @if (strpos('Nigeria', currentUser()->country) !== false)

                        <div class="col-sm-6 priceBox mb-3">
                            <div class="price-block p-2">


                                <div class="tutor-block">
                                    <div class="tutor-img">
                                        <h5 class=" price-head text-danger text-center">

                                            MAKE PAYMENT WITH CARD

                                        </h5>
                                    </div>
                                    <div class="tutor-content">

                                        <center>
                                            <div style="">

                                                <img src="{{ asset('images/flutterwave.png') }}" class="img-responsive"
                                                    alt="PAY WITH ATM CARD OR BANK" style="margin-bottom: 4px;background:white">

                                            </div>
                                        </center>

                                            <center>
                                                <div style="color: whitesmoke!important;">YOUR ACCOUNT WILL BE ACTIVATED
                                                    AUTOMATICALLY AFTER SUCCESSFUL TRANSACTION</div>
                                            </center>

                                    </div>
                                </div>
                                <div class="social-media text-center">
                                    <form>
                                        <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                                        <button type="button" class="btn btn-danger btn-md" onClick="payWithRave()">PAY
                                            NOW</button>
                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 priceBox mb-3">
                            <div class="price-block p-2">

                                <div class="tutor-block">
                                    <div class="tutor-img">
                                          <h5 class=" price-head text-danger text-center">BANK / MOBILE TRANSFER</h5>
                                    </div>
                                    <div class="tutor-content">
                                        <ul class="list-group">
                                            <li class="list-group-item">

                                                Acct Name: <strong class="">{{ $bankaccountname }}</strong>
                                            </li>
                                            <li class="list-group-item">

                                                Acct No:<strong class="">{{ $bankaccountno }}</strong>
                                            </li>
                                            <li class="list-group-item">

                                                Bank: <strong class="">{{ $bankname }}</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="social-media">
                                    <center>
                                        After payment, Send the following details to us.
                                        <br>(1) Name of depositor
                                        (2) Date of payment
                                        (3) Amount <br>to {{ $contactmail }} or through WhatsApp to +{{ $whatsappno }}
                                        <br><br><br><br><br>
                                    </center>
                                </div>
                            </div>
                        </div>
                        @else



                        @if (strpos('Ghana', currentUser()->country) !== false)
                        @endif


                        @if (strpos('Uganda', currentUser()->country) !== false)
                        @endif



                        @if (strpos('Kenya', currentUser()->country) !== false || strpos('South Africa', currentUser()->country) !== false || strpos('Ghana', currentUser()->country) !== false || strpos('Uganda', currentUser()->country) !== false || strpos('Tanzania, United Republic of', currentUser()->country) !== false)

                            <div class="col-sm-6 col-xs-12 mb30 priceBox">
                                <div class="price-block">
                                    <div class="tutor-block">
                                        <div class="tutor-img">
                                              <h5 class=" price-head text-danger text-center">
                                                @if (strpos('Kenya', currentUser()->country) !== false)
                                                    PAY ONLINE WITH MPESA
                                                @elseif(strpos('Uganda', currentUser()->country) !== false || strpos('Ghana', currentUser()->country) !== false || strpos('Tanzania, United Republic of', currentUser()->country) !== false)
                                                    PAY WITH MOBILE MONEY
                                                @elseif(strpos('South Africa', currentUser()->country) !== false)
                                                    PAY WITH YOUR BANK OR ATM CARD
                                                @else
                                                    MAKE PAYMENT WITH CARD
                                                @endif


                                            </h5>
                                        </div>
                                        <div class="tutor-content">
                                            <br>
                                            <center>
                                                <div style="">
                                                    @if (strpos('Kenya', currentUser()->country) !== false)
                                                        <img src="{{ asset('images/M-Pesa-Logo.png') }}"
                                                            class="img-responsive" alt="PAY WITH MPESA"
                                                            style="margin-bottom: 4px; max-height: 120px;">
                                                    @elseif(strpos('Uganda', currentUser()->country) !== false)
                                                        <img src="{{ asset('images/ugx.jpg') }}" class="img-responsive"
                                                            alt="PAY WITH MOBILE MONEY" style="margin-bottom: 4px;">
                                                    @elseif(strpos('Ghana', currentUser()->country) !== false)
                                                        <img src="{{ asset('images/ghcmobile.png') }}"
                                                            class="img-responsive" alt="PAY WITH MOBILE MONEY"
                                                            style="margin-bottom: 4px;">
                                                    @elseif(strpos('Tanzania, United Republic of', currentUser()->country) !== false)
                                                        <img src="{{ asset('images/pesapal-share.png') }}"
                                                            class="img-responsive" alt="PAY WITH MOBILE MONEY"
                                                            style="margin-bottom: 4px; max-height: 150px;">
                                                    @elseif(strpos('South Africa', currentUser()->country) !== false)
                                                        <img src="{{ asset('images/paywithbank.png') }}"
                                                            class="img-responsive" alt="PAY WITH CARD OR BANK"
                                                            style="margin-bottom: 4px; max-height: 150px;">
                                                    @else
                                                        <img src="{{ asset('images/flutterwave.png') }}"
                                                            class="img-responsive" alt="PAY WITH ATM CARD OR BANK"
                                                            style="margin-bottom: 4px;background:white">
                                                    @endif
                                                </div>
                                            </center>
                                            <p>
                                                <center>
                                                    <div style="color: whitesmoke!important;">YOUR ACCOUNT WILL BE ACTIVATED
                                                        AUTOMATICALLY AFTER SUCCESSFUL TRANSACTION</div>
                                                </center>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="social-media text-center">
                                        <form>
                                            <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                                            <button type="button" class="btn btn-danger btn-md" onClick="payWithRave()">PAY
                                                NOW</button>
                                            <br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endif

                    @if(currentUser()->country=='Kenya')
                    <div class="col-sm-6 priceBox">
                        <h5 class=" price-head text-danger text-center">PAY WITH MPESA</h5>
                        <div class="col-sm-12 pay-body text-white pt-4">
                            <center><img src="{{asset('images/M-Pesa-Logo.png')}}" class="img-responsive" alt="MPesa" style="
                                width: 162px;
                            "></center>
                                  <div class="pt-2">
                                    Payments should  be made ONLY to:
                                        <span><strong class="text-danger">+{{ $mpesa_no }}</strong></span>
                                  </div>

                            <p>After making deposits, send your Confirmation code, Registered E-mail and Amount paid as an E-mail to <strong class="text-danger">{{ $contactmail }}</strong></p>
                            <p>Your account will be activated instantly.</p>


                        </div>
                        <div class="col-sm-12 pay-bottom">
                        </div>
                    </div>

                    @endif


                    @if(currentUser()->country=='Ghana')
                    <div class="col-sm-6 priceBox">
                        <h5 class="price-head text-danger text-center">Ghana Mobile Money</h5>
                        <div class="tutor-content price-block p-3 text-white">
                            <center><img src="{{asset('images/ghcmobile.png')}}" class="img-responsive" alt="Mobile Money"></center>
                            <div class="pt-2">
                                Payments should  be made ONLY to:
                                    <span><strong class="text-danger">+<strong>{{ $ghana_no }}</strong></strong></span>

                            </div>
                            <p>After making deposits, send your Confirmation code, Registered E-mail and Amount paid as an E-mail <strong class="text-danger">{{ $contactmail }}</strong> or through WhatsApp to
                                +<strong class="text-danger">{{ $whatsappno }}</strong></p>
                            <p>Your account will be activated instantly.</p>
                        </div>
                        <div class="col-sm-12 pay-bottom">
                        </div>
                    </div>
                    @endif

                    @if (strpos('Kenya', currentUser()->country) !== false || strpos('Uganda', currentUser()->country) !== false)
                        @if (strpos('Nigeria', currentUser()->country) === false && strpos('Ghana', currentUser()->country) === false && strpos('Tanzania, United Republic of', currentUser()->country) === false)


                            <div class="col-sm-6 col-xs-12 mb30 priceBox">
                                <div class="price-block">
                                    <div class="tutor-block">
                                        <div class="tutor-img">
                                              <h5 class=" price-head text-danger text-center">Bitcoin Payment</h5>
                                        </div>
                                        <div class="tutor-content">
                                            <br>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    Bitcoin Address: <span
                                                        class="badge bg-success">{{ $bitcoin }}</span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="social-media">
                                        After successful transaction, send us a mail containing, Your Email Address, The
                                        Date of
                                        Payment, and Transaction hash code to {{ $contactmail }} or through WhatsApp to
                                        +{{ $whatsappno }}
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        @if (strpos('Nigeria', currentUser()->country) === false && strpos('Ghana', currentUser()->country) === false && strpos('Tanzania, United Republic of', currentUser()->country) === false && strpos('Kenya', currentUser()->country) === false && strpos('South Africa', currentUser()->country) === false)
                            <div class="col-sm-6 col-xs-12 mb30 priceBox">
                                <div class="price-block">
                                    <div class="tutor-block">
                                        <div class="tutor-img">
                                              <h5 class=" price-head text-danger text-center">

                                                PAY WITH CARD

                                            </h5>
                                        </div>
                                        <div class="tutor-content">
                                            <br>
                                            <center>
                                                <div style="">

                                                    <img src="{{ asset('images/flutterwave.png') }}"
                                                        class="img-responsive" alt="PAY WITH ATM CARD OR BANK"
                                                        style="margin-bottom: 4px;background:white">

                                                </div>
                                            </center>
                                            <p>
                                                <center>
                                                    <div style="color: whitesmoke!important;">YOUR ACCOUNT WILL BE ACTIVATED
                                                        AUTOMATICALLY AFTER SUCCESSFUL TRANSACTION</div>
                                                </center>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="social-media">
                                        <form>
                                            <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                                            <button type="button" class="btn btn-danger btn-md" onClick="payWithRave()">PAY
                                                NOW</button>
                                            <br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (strpos('Nigeria', currentUser()->country) === false && strpos('Ghana', currentUser()->country) === false)


                            <div class="col-sm-6 col-xs-12 mb30 priceBox">
                                <div class="price-block">
                                    <div class="tutor-block">
                                        <div class="tutor-img">
                                              <h5 class=" price-head text-danger text-center">Bitcoin Payment</h5>
                                        </div>
                                        <div class="tutor-content">
                                            <br>
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    Bitcoin Address:
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="badge bg-success">{{ $bitcoin }}</span>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="social-media">
                                        After successful transaction, send us a mail containing, Your Email Address, The
                                        Date of
                                        Payment, and Transaction hash code to {{ $contactmail }} or through WhatsApp to
                                        +{{ $whatsappno }}
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        @endif



                    @endif
                    <div class="col-sm-12">
                        <p><br><br></p>
                    </div>

            </div>


        </div>
        <br>
        <br>
        <br>

    </div>

@endsection


@section('levelJS')

    <script>
        var amount = Math.floor(({{ $sub->nairaPrice }} * 100));
        var callback = "{{ route('/paystack') }}";
        var subID = "{{ $sub->id }}";
        var nowTim = "{{ date('d-m-Y-h-i-a') }}-";

        function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: 'FLWPUBK_TEST-9ddfa830fefdb55c1c7326475c4cf1b6-X',
                //test public key

                // key: 'FLWPUBK-b28b834a55f0fa2ab1a7bd2a254fbb4c-X',//real public key


                email: '{{ currentUser()->email }}',
                amount: amount,
                ref: nowTim +
                    '{{ \Str::slug($sub->category, '-') }}-{{ \Str::slug($sub->planName, '-') }}-refID={{ currentUser()->id }}', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                label: 'victorspredict@gmail.com',
                metadata: {
                    custom_fields: [{
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: "{{ currentUser()->phone }}"
                    }]
                },
                callback: function(response) {
                    window.location.href = callback + '/' + subID + '/' + response.reference;
                },
                onClose: function() {
                    //                    ;
                }
            });
            handler.openIframe();
        }
    </script>

    <script>
        const API_publicKey = "FLWPUBK_TEST-07a197eebe2fc922af4692c93c442368-X";
        // real public key =
        // const API_publicKey = "FLWPUBK_TEST-07a197eebe2fc922af4692c93c442368-X";//test public key
        var callbackUrl = "{{ route('/rave') }}";



        var subID = "{{ $sub->id }}";
        var nowTim = "{{ date('d-m-Y-h-i-a') }}-";
        var cur = "USD";
        var cou = "US";
        var amt = "{{ $sub->dollarPrice }}";
        @if (strpos('Kenya', currentUser()->country) !== false)
            var cur = "KES";
            var cou = "KE";
            var amt = "{{ $sub->keshPrice }}";
        @elseif(strpos('Uganda', currentUser()->country) !== false)
            var cur = "UGX";
            var cou = "UG";
            var amt = "{{ $sub->ugxPrice }}";
        @elseif(strpos('Nigeria', currentUser()->country) !== false)
            var cur = "NGN";
            var cou = "NG";
            var amt = "{{ $sub->nairaPrice }}";
        @elseif(strpos('Ghana', currentUser()->country) !== false)
            var cur = "GHS";
            var cou = "GH";
            var amt = "{{ $sub->cedPrice }}";
        @elseif(strpos('South Africa', currentUser()->country) !== false)
            var cur = "ZAR";
            var cou = "ZA";
            var amt = "{{ $sub->zarPrice }}";
        @elseif(strpos('Tanzania, United Republic of', currentUser()->country) !== false)
            var cur = "TZS";
            var cou = "TZ";
            var amt = "{{ $sub->tzsPrice }}";
        @endif

        function payWithRave() {
            // swal('Please Use Other Payment method for now ', 'Or Contact Support for help', 'warning')
            var x = getpaidSetup({
                PBFPubKey: API_publicKey,
                customer_email: "{{ currentUser()->email }}",
                amount: amt,
                customer_phone: "{{ currentUser()->phone }}",
                currency: cur,
                country: cou, // GH can also be passed as country, only country options to pass are NG and GH.
                txref: nowTim + '{{ \Str::slug($sub->category, '-') }}-refID={{ currentUser()->id }}',
                meta: [{
                    metaname: "subID",
                    metavalue: "{{ $sub->id }}"
                }],
                onclose: function() {},
                callback: function(response) {
                    var txref = response.tx
                        .txRef; // collect flwRef returned and pass to a                     server page to complete status check.
                    console.log("This is the response returned after a charge", response);
                    if (
                        response.tx.chargeResponseCode == "00" ||
                        response.tx.chargeResponseCode == "0"
                    ) {
                        window.location.href = callbackUrl + '/' + subID + '/' + txref;
                    } else {
                        redirect to a failure page.
                    }

                    x.close(); // use this to close the modal immediately after payment.
                }
            });
        }
    </script>

    <script src="//voguepay.com/js/voguepay.js"></script>
    <script>
        closedFunction = function() {
            alert('THE PAYMENT WAS CANCELLED BY YOU');
        };

        successFunction = function(transaction_id) {
            window.location.href = '{{ route('/processPayment') }}/' + transaction_id + '/{{ $sub->id }}';
            //            alert('Transaction was successful, Ref: '+transaction_id)
        };

        failedFunction = function(transaction_id) {
            alert('Transaction was not successful, Ref: ' + transaction_id)
        }
    </script>
    <script>
        function pay3() {
            Voguepay.init({
                v_merchant_id: '9229-0050342',
                total: '{{ $sub->nairaPrice }}',
                //                notify_url: 'http://domain.com/notification.php',
                cur: 'NGN',
                merchant_ref: '{{ $sub->id }}',
                memo: 'Payment for Passionpredict {{ $sub->category }} Package of {{ $sub->accessTime }} Access',
                //                recurrent: true,
                //                frequency: 10,
                developer_code: '5b05dd94cf9cd',
                store_id: '{{ $sub->id }}',
                loadText: 'KINDLY HOLD ON...',
                items: [{
                    name: "{{ $sub->category }} Package",
                    description: "{{ $sub->accessTime }} Access",
                    price: "{{ $sub->nairaPrice }}"
                }],
                closed: closedFunction,
                success: successFunction,
                failed: failedFunction
            });
        }
    </script>


@endsection













