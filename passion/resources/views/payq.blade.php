@extends('layout.main')
@section('title')
    Payment Methods - Passionpredict.com
@endsection
@section('seo')

@endsection
@section('levelCSS')

@endsection


@section('content')
    @include('partials.breadcrum', ['title'=>'Payment Methods '])
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

        .tutor-content {
            background: #3c4611;
        }

        .priceBox {


            border-radius: 6px;

        }

        .price-block {
            background: #3c4611;
            margin: 4px;
            padding: 12px;
            border-radius: 10px;
        }

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
            color: #fff;
            line-height: 1;
            vertical-align: middle;
            white-space: nowrap;
            text-align: center;
            background-color: #de4302;
            border-radius: 10px;
        }


        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
            border: 1px solid #86909a;
        }

    </style>

    <div class="container-fluid container-bg">
        <section>
            <div class="container-fluid" style="background-color: whitesmoke; margin-bottom: -60px; text-align: justify;">
                <?php
                
                if (session()->has('subRoute')) {
                    # code..sess
                    session()->forget('subRoute');
                }
                
                ?>
                <div class="row">
                    <div class="col-sm-10 offset-sm-1 paddingsmall">
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

                        {{-- <ol class="breadcrumb"> 
                     <li><a href="#">{{$sub->category}} Package</a></li> 
                     <li><a href="#">{{$sub->planName}}</a></li> 
                     <li class="active"> 

                     </li> 
                     </ol> --}}
                    </div>
                    <hr>
                    <div class="col-sm-12 mt30 nopaddingsmall text-center">
                        <blockquote>Payment methods available in <strong
                                style="color: green;">{{ currentUser()->country }}</strong>
                            <br><small>Not your country? <a href="{{ route('/country') }}">Change Here</a></small>
                        </blockquote>
                    </div>
                    <div class="row justify-content-center">
                        {{-- @if (strpos('Nigeria', currentUser()->country) !== false) --}}

                        <div class="col-sm-6 col-xs-12 mb30  priceBox">
                            <div class="price-block">


                                <div class="tutor-block">
                                    <div class="tutor-img">
                                        <h5 class="text-danger text-center">

                                            MAKE PAYMENT WITH CARD

                                        </h5>
                                    </div>
                                    <div class="tutor-content">
                                        <br>
                                        <center>
                                            <div style="background: #fff;">

                                                <img src="{{ asset('images/flutterwave.png') }}" class="img-responsive"
                                                    alt="PAY WITH ATM CARD OR BANK" style="margin-bottom: 4px;">

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


                        <div class="col-sm-6 col-xs-12 mb30 priceBox">
                            <div class="price-block">
                                <div class="tutor-block">
                                    <div class="tutor-img">
                                        <h5 class="text-danger text-center">BANK / MOBILE TRANSFER</h5>
                                    </div>
                                    <div class="tutor-content">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <span class="badge bg-success">{{ $bankaccountname }}</span>
                                                Acct Name:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="badge bg-success">{{ $bankaccountno }}</span>
                                                Acct No:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="badge bg-success">{{ $bankname }}</span>
                                                Bank:
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
                        {{-- @else --}}

                        <div class="clearfix"></div>

                        {{-- @if (strpos('Ghana', currentUser()->country) !== false) --}}


                        {{-- @endif
            

                        @if (strpos('Uganda', currentUser()->country) !== false) 
                             
                         @endif

                     

                        @if (strpos('Kenya', currentUser()->country) !== false || strpos('South Africa', currentUser()->country) !== false || strpos('Ghana', currentUser()->country) !== false || strpos('Uganda', currentUser()->country) !== false || strpos('Tanzania, United Republic of', currentUser()->country) !== false) --}}

                        <div class="col-sm-6 col-xs-12 mb30 priceBox">
                            <div class="price-block">
                                <div class="tutor-block">
                                    <div class="tutor-img">
                                        <h5 class="text-danger text-center">
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
                                            <div style="background: #fff;">
                                                @if (strpos('Kenya', currentUser()->country) !== false)
                                                    <img src="{{ asset('images/M-Pesa-Logo.png') }}"
                                                        class="img-responsive" alt="PAY WITH MPESA"
                                                        style="margin-bottom: 4px; max-height: 120px;">
                                                @elseif(strpos('Uganda', currentUser()->country) !== false)
                                                    <img src="{{ asset('images/ugx.jpg') }}" class="img-responsive"
                                                        alt="PAY WITH MOBILE MONEY" style="margin-bottom: 4px;">
                                                @elseif(strpos('Ghana', currentUser()->country) !== false)
                                                    <img src="{{ asset('images/ghcmobile.png') }}" class="img-responsive"
                                                        alt="PAY WITH MOBILE MONEY" style="margin-bottom: 4px;">
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
                                                        style="margin-bottom: 4px;">
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
                        {{-- @endif

                    @endif 

                    
                    @if (strpos('Kenya', currentUser()->country) !== false || strpos('Uganda', currentUser()->country) !== false)
                    @if (strpos('Nigeria', currentUser()->country) === false && strpos('Ghana', currentUser()->country) === false && strpos('Tanzania, United Republic of', currentUser()->country) === false) --}}

                        <div class="clearfix"></div>

                        <div class="col-sm-6 col-xs-12 mb30 priceBox">
                            <div class="price-block">
                                <div class="tutor-block">
                                    <div class="tutor-img">
                                        <h5 class="text-danger text-center">Bitcoin Payment</h5>
                                    </div>
                                    <div class="tutor-content">
                                        <br>
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                Bitcoin Address: <span class="badge bg-success">{{ $bitcoin }}</span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="social-media">
                                    After successful transaction, send us a mail containing, Your Email Address, The Date of
                                    Payment, and Transaction hash code to {{ $contactmail }} or through WhatsApp to
                                    +{{ $whatsappno }}
                                    <br><br>
                                </div>
                            </div>
                        </div>
                        {{-- @endif 
                    @else
                        @if (strpos('Nigeria', currentUser()->country) === false && strpos('Ghana', currentUser()->country) === false && strpos('Tanzania, United Republic of', currentUser()->country) === false && strpos('Kenya', currentUser()->country) === false && strpos('South Africa', currentUser()->country) === false) --}}

                        <div class="col-sm-6 col-xs-12 mb30 priceBox">
                            <div class="price-block">
                                <div class="tutor-block">
                                    <div class="tutor-img">
                                        <h5 class="text-danger text-center">

                                            PAY WITH CARD / PAYPAL

                                        </h5>
                                    </div>
                                    <div class="tutor-content">
                                        <br>
                                        <center>
                                            <div style="background: #fff;">

                                                <img src="{{ asset('images/flutterwave-usd.png') }}"
                                                    class="img-responsive" alt="PAY WITH ATM CARD OR BANK"
                                                    style="margin-bottom: 4px;">

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





                        {{-- @endif 
                         @if (strpos('Nigeria', currentUser()->country) === false && strpos('Ghana', currentUser()->country) === false) --}}
                        <div class="clearfix"></div>

                        <div class="col-sm-6 col-xs-12 mb30 priceBox">
                            <div class="price-block">
                                <div class="tutor-block">
                                    <div class="tutor-img">
                                        <h5 class="text-danger text-center">Bitcoin Payment</h5>
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
                                    After successful transaction, send us a mail containing, Your Email Address, The Date of
                                    Payment, and Transaction hash code to {{ $contactmail }} or through WhatsApp to
                                    +{{ $whatsappno }}
                                    <br><br>
                                </div>
                            </div>
                        </div>
                        {{-- @endif --}}



                        {{-- @endif --}}
                        <div class="col-sm-12">
                            <p><br><br></p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <script>
            var amount = Math.floor(({{ $sub->nairaPrice }} * 100));
            var callback = "{{ route('/paystack') }}";
            var subID = "{{ $sub->id }}";
            var nowTim = "{{ date('d-m-Y-h-i-a') }}-";

            function payWithPaystack() {
                var handler = PaystackPop.setup({
                    key: 'FLWPUBK_TEST-9ddfa830fefdb55c1c7326475c4cf1b6-X', //test public key

                    // key: 'FLWPUBK-b28b834a55f0fa2ab1a7bd2a254fbb4c-X',//real public key


                    email: '{{ currentUser()->email }}',
                    amount: amount,
                    ref: nowTim +
                        '{{ str_slug($sub->category, '-') }}-{{ str_slug($sub->planName, '-') }}-refID={{ currentUser()->id }}', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
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
            const API_publicKey = "FLWPUBK-b28b834a55f0fa2ab1a7bd2a254fbb4c-X"; ///real public key
            // const API_publicKey = "FLWPUBK_TEST-9ddfa830fefdb55c1c7326475c4cf1b6-X";//test public key
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
                swal('Please Use Other Payment method for now ', 'Or Contact Support for help', 'warning')
                //  var x = getpaidSetup({
                //     PBFPubKey: API_publicKey,
                //     customer_email: "{{ currentUser()->email }}",
                //    amount: amt,
                // customer_phone: "{{ currentUser()->phone }}",
                //   currency: cur,
                //   country: cou, // GH can also be passed as country, only country options to pass are NG and GH.
                //  txref: nowTim + '{{ str_slug($sub->category, '-') }}-refID={{ currentUser()->id }}',
                //  meta: [{
                //      metaname: "subID",
                //     metavalue: "{{ $sub->id }}"
                //  }],
                // onclose: function() {},
                //callback: function(response) {
                //    var txref = response.tx
                //    .txRef; // collect flwRef returned and pass to a                     server page to complete status check.
                //    console.log("This is the response returned after a charge", response);
                //    if (
                //       response.tx.chargeResponseCode == "00" ||
                //       response.tx.chargeResponseCode == "0"
                //  ) {
                //      window.location.href = callbackUrl + '/' + subID + '/' + txref;
                // } else {
                // redirect to a failure page.
                //   }

                //  x.close(); // use this to close the modal immediately after payment.
                // }
                // });
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

    </div>

@endsection
