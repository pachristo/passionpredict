@extends('layout.main')
@section('title')
    How to Pay - Passionpredict.com
@endsection
@section('seo')
@endsection
@section('levelCSS')
@endsection


@section('content')
    @include('partials.breadcrum', ['title' => 'How To Pay '])
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
    </style>

    <div class="container container-bg">

        <div class="container ">


            <div class="col-lg-10 offset-lg-1 pt-5">

                @if (isset($country))
                    <h3>Step-By-Step Approach</h3>
                    <ol type="1">
                        <li><strong>Register with "A VALID EMAIL ADDRESS":</strong>&nbsp;<br />The first thing you
                            need to do is to register your profile on the website by clicking on the "Register Here"
                            link, located at the&nbsp;head section of the website pages. Fill the form.
                        </li>
                        <li>Login into your account after registering. Click on the "See
                            Pricing"&nbsp;button&nbsp;under Current Plan,&nbsp;Then select any of the plans&nbsp;you
                            wish to pay for on the next page and proceed.<br /><br /></li>
                    </ol>
                    <p>Listed below are the different methods of payment available for your country:</p>

                    @if ($country == 'Nigeria')
                        <p>&nbsp;</p>
                        <h4><strong>Pay via Bank Deposit/Bank Transfer</strong></h4>
                        <p>You can make payments for your&nbsp;Passionpredict account activation/upgrade by
                            following this simple steps.</p>
                        <p>Make payments ONLY into the following bank accounts stated below:</p>
                        <p>Account name:&nbsp;<strong> Bassey, Udeme Henry</strong></p>
                        <p>Account Number:&nbsp;<strong>0065802468</strong></p>
                        <p>Bank: <strong>Access Bank</strong></p>
                        <p>After making payment, ensure you send your payment details as an email
                            to&nbsp;<strong><span style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or
                            through WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span>
                        </p>
                        <p>Kindly note below the details to send:</p>
                        <p><strong>For Bank Deposit:</strong></p>
                        <ol type="1">
                            <li>Depositor's name</li>
                            <li>Teller number</li>
                            <li>Email address (registered on Passionpredict)</li>
                            <li>Amount paid and the plan you paid for. (IF YOU MADE BANK DEPOSIT)</li>
                        </ol>
                        <p><strong>For Online Transfer:</strong></p>
                        <ol type="1">
                            <li>Name of the account you transferred from</li>
                            <li>Email address (registered on Passionpredict)</li>
                            <li>Amount paid and the plan you paid for. (IF YOU PAID WITH TRANSFER)</li>
                        </ol>
                        <p><strong>For Payment with USSD Code Transfer:</strong></p>
                        <ol type="1">
                            <li>Name of the account you transferred from</li>
                            <li>Email address (registered on Passionpredict)</li>
                            <li>The phone number used to initiate the transfer</li>
                            <li>Amount paid and the plan you paid for. (IF YOU PAID WITH USSD CODE TRANSFER)</li>
                        </ol>
                        <p><strong>For Transfer with ATM Machine:</strong></p>
                        <ol type="1">
                            <li>Name of the account you transferred from</li>
                            <li>Location of the ATM Machine</li>
                            <li>Email address (registered on Passionpredict)</li>
                            <li>Amount paid and the plan you paid for</li>
                        </ol>
                        <p>Your&nbsp;Passionpredict account will be upgraded before the close of business on the
                            notification day, as soon as payment is confirmed.</p>
                        <h3><strong>Pay using your Debit/Credit Card</strong></h3>
                        <ol type="1">
                            <li>After clicking on "Pricing Plans"&nbsp;button on the head section on
                                Passionpredict.com, (log in your account) Then select any of the plans. Choose "Pay
                                Online with ATM Card"</li>
                            <li> payment gateways options are available for you to select from, which include
                                Paystack . These are detailed below:</li>
                        </ol>
                    @elseif($country == 'Kenya')
                        <p>&nbsp;</p>
                        <h4><strong>Pay with&nbsp;MPESA</strong></h4>
                        <ol type="1">
                            <li>All payments should be made ONLY to&nbsp;<strong><span
                                        style="color: #0000ff;">"0792740472"</span></strong></li>
                            <p>Mpesa Name: <span style="color: #0000ff;"><strong>John Murithi</strong></span></p>
                            <li>After making deposits, send your Confirmation code, Registered E-mail and Amount
                                paid as an E-mail to <strong><span
                                        style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or through
                                WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span></li>
                            <li>Your Passionpredict account would be upgraded once payment is confirmed.</li>
                        </ol>
                        <p>Please do not&nbsp;call the number (<strong>WhatsApp Only</strong>), Go ahead and make
                            payment then send your details, your account will be upgraded.</p>
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>
                    @elseif($country == 'Ghana')
                        <p>&nbsp;</p>
                        <h4><strong>Pay via&nbsp;Flutterwave</strong></h4>
                        <h4>GHANA MOBILE MONEY</h4>
                        <ol>
                            <li>Choose "Pricing Plans" (Log in your Passionpredict Account)</li>
                            <li>Click on any of the displayed plans to subscribe for it</li>
                            <li>Locate&nbsp;"PAY WITH MOBILE MONEY" and click on the &ldquo;pay now&rdquo; button,
                            </li>
                            <li>Choose Network (MTN, AIRTEL TIGO or VODAFONE)&nbsp;</li>
                            <li>Insert your mobile number and click pay</li>
                            <li>Follow the steps on the next page as instructed</li>
                            <li>After making successful payment, you will be redirected back to the website and your
                                Passionpredict account will be automatically upgraded to your selected plan for
                                which you made payment.<br /><br /></li>
                        </ol>
                        <h4><strong>Pay via Momo</strong></h4>
                        <ol type="1">
                            <li>All payments should be made ONLY to - <strong><span style="color: #0000ff;">054 718
                                        7157</span></strong></li>
                            <p>MoMo Name: <span style="color: #0000ff;"><strong>David Agyevi</strong></span></p>
                            <li>After making your payment. Please send THE MOBILE MONEY DETAILS: name, registered
                                email address and date of payment to <strong><span
                                        style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or through
                                WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span></li>
                            <li>Your&nbsp;Passionpredict account will be upgraded once we receive your
                                payment.<br /><br /></li>
                        </ol>
                        Please do not&nbsp;call, Go ahead and make payment, then send your details, your account
                        will be upgraded.

                        <p>&nbsp;</p>

                        <h4><strong>Pay via&nbsp;SKRILL</strong></h4>
                        <ol type="1">
                            <li>All payments should be made ONLY to&nbsp;<strong>cephblog@gmail.com</strong></li>
                            <li>After successful transaction, send us an email containing: Your Email Address,
                                Amount Paid and Transaction ID to&nbsp;<strong><span
                                        style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or through
                                WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span></li>
                            <li>Your&nbsp;Passionpredict account will be upgraded before the close of working
                                hours.<br /><br /></li>
                        </ol>
                        <h4><strong>Pay via&nbsp;Bitcoin</strong></h4>
                        <ol type="1">
                            <li>All payments should be made ONLY
                                to&nbsp;<strong>bc1qq5krt2p4qaeuwlvyyse3jfu96nxflu48j8m4p7</strong></li>
                            <li>After successful transaction, send us an email containing, Your Email Address, The
                                Date of Payment, and Transaction hash code to&nbsp;<strong><span
                                        style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or through
                                WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span></li>
                            <li>Your&nbsp;Passionpredict account will be upgraded before the close of working hours.
                            </li>
                        </ol>
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>
                    @elseif($country == 'Cameroon')
                        <p>&nbsp;</p>

                        <h4><strong>Pay via&nbsp;SKRILL</strong></h4>
                        <ol type="1">
                            <li>All payments should be made ONLY to&nbsp;<strong>cephblog@gmail.com</strong></li>
                            <li>After successful transaction, send us an email containing: Your Email Address,
                                Amount Paid and Transaction ID to&nbsp;<strong><span
                                        style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or through
                                WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span></li>
                            <li>Your&nbsp;Passionpredict account will be upgraded before the close of working
                                hours.<br /><br /></li>
                        </ol>
                        <h4><strong>Pay via&nbsp;Bitcoin</strong></h4>
                        <ol type="1">
                            <li>All payments should be made ONLY
                                to&nbsp;<strong>bc1qq5krt2p4qaeuwlvyyse3jfu96nxflu48j8m4p7</strong></li>
                            <li>After successful transaction, send us an email containing, Your Email Address, The
                                Date of Payment, and Transaction hash code to&nbsp;<strong><span
                                        style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or through
                                WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span></li>
                            <li>Your&nbsp;Passionpredict account will be upgraded before the close of working hours.
                            </li>
                        </ol>
                        <p>&nbsp;</p>

                        <h2>&nbsp;</h2>
                    @elseif($country == 'Tanzania, United Republic of')
                        <p>&nbsp;</p>


                        <h4><strong>VODACOM to MPESA</strong></h4>
                        <ol type="1">
                            <li>Dial *150*00# or use the M-pesa app and select Send money.</li>
                            <li>Select “M-pesa Kenya”</li>
                            <li>Select “Send money”</li>
                            <li>Enter this number <strong>“254792740472”</strong></li>
                            <li>Enter Amount in Tanzanian Shillings</li>
                            <li>Enter your M-pesa pin and confirm transaction</li>
                        </ol>
                        <p>After making deposits, send your Confirmation code, Registered E-mail and Amount paid as
                            an E-mail to <strong><span style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or
                            through
                            WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span><br />Your
                            Passionpredict account would be upgraded once payment is confirmed.</p>
                        <p>Please do not&nbsp;call (<strong>WhatsApp Only</strong>), Go ahead and make payment then
                            send your details, your account will be upgraded.</p>
                        <p>&nbsp;</p>

                        <h2>&nbsp;</h2>



                        {{-- <h2><br />(For South Africa)</h2> --}}
                    @elseif($country == 'South Africa')
                        <p>&nbsp;</p>


                        <h4><strong>Pay using PayPal</strong></h4>
                        <ol type="1">
                            <li>Choose "Pricing Plans" (Log in your Passionpredict Account)</li>
                            <li>Click on any of the displayed plans to subscribe for it</li>
                            <li>Locate&nbsp;"PAY WITH PAYPAL" and click on the &ldquo;pay now&rdquo; button then
                                follow the screen wizard.</li>
                            <li>After making successful payment, make sure you are redirected back to the website
                                for your account to be automatically upgraded to the plan you have successfully made
                                payment for. You should click on the "Return to merchant site" link after sucessful
                                payment.</li>
                            <li>Your account is then automatically upgraded to the selected plan.<br /><br /></li>
                        </ol>

                        <h4><strong>Pay via&nbsp;SKRILL</strong></h4>
                        <ol type="1">
                            <li>All payments should be made ONLY to&nbsp;<strong>cephblog@gmail.com</strong></li>
                            <li>After successful transaction, send us an email containing: Your Email Address,
                                Amount Paid and Transaction ID to&nbsp;<strong><span
                                        style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or through
                                WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span></li>
                            <li>Your&nbsp;Passionpredict account will be upgraded before the close of working
                                hours.<br /><br /></li>
                        </ol>
                        <h4><strong>Pay via&nbsp;Bitcoin</strong></h4>
                        <ol type="1">
                            <li>All payments should be made ONLY
                                to&nbsp;<strong>bc1qq5krt2p4qaeuwlvyyse3jfu96nxflu48j8m4p7</strong></li>
                            <li>After successful transaction, send us an email containing, Your Email Address, The
                                Date of Payment, and Transaction hash code to&nbsp;<strong><span
                                        style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or through
                                WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span></li>
                            <li>Your&nbsp;Passionpredict account will be upgraded before the close of working hours.
                            </li>
                        </ol>
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>
                    @else
                        {{-- <h2>(For Other Countries)</h2> --}}
                        <p>&nbsp;</p>
                        {{-- <h3><strong>Pay&nbsp;with Card via DusuPay</strong></h3> --}}


                        <h4><strong>Pay via&nbsp;SKRILL</strong></h4>
                        <ol type="1">
                            <li>All payments should be made ONLY to&nbsp;<strong>cephblog@gmail.com</strong></li>
                            <li>After successful transaction, send us an email containing: Your Email Address,
                                Amount Paid and Transaction ID to&nbsp;<strong><span
                                        style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or through
                                WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span></li>
                            <li>Your&nbsp;Passionpredict account will be upgraded before the close of working
                                hours.<br /><br /></li>
                        </ol>
                        <h4><strong>Pay via&nbsp;Bitcoin</strong></h4>
                        <ol type="1">
                            <li>All payments should be made ONLY
                                to&nbsp;<strong>bc1qq5krt2p4qaeuwlvyyse3jfu96nxflu48j8m4p7</strong></li>
                            <li>After successful transaction, send us an email containing, Your Email Address, The
                                Date of Payment, and Transaction hash code to&nbsp;<strong><span
                                        style="color: #ff0000;">passionpredicts@gmail.com</span></strong> or through
                                WhatsApp to <span style="color: #ff0000;"><strong>+2348066982771</strong></span></li>
                            <li>Your&nbsp;Passionpredict account will be upgraded before the close of working hours.
                            </li>
                        </ol>
                        <p>&nbsp;</p>

                        <div class="disclaimer">&nbsp;</div>
                    @endif
                @endif

            </div>
        </div>


    </div>
@endsection
