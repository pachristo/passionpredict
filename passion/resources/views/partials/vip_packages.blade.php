<style>
    body {

        color: BLACK;
    }

    .game-single-content p {

        color: BLACK;

    }

    .game-single-content {
        /* box-shadow: 0px 2px 21px 0px rgb(59 53 63 / 12%); */
        position: relative;
        z-index: 1;
        background: #e7e2dc;
        /* padding: 50px 40px; */
        overflow: hidden;
    }

    @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap");




    .pricing {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        position: relative !important;
        color: black !important;
    }

    .pricing .plan,
    .plan {
        background-color: #fff;
        padding: 0.5rem;
        margin: 0px;
        border-radius: 5px;
        text-align: center;
        transition: 0.3s;
        cursor: pointer;
        box-shadow: 5px 7px 67px -28px rgba(0, 0, 0, 0.37);
    }

    .pricing .plan h2 {
        font-size: 22px;
        margin-bottom: 12px;
    }

    .pricing .plan .price {
        margin-bottom: 1rem;
        font-size: 30px;
    }

    .pricing .plan ul.features {
        list-style-type: none;
        text-align: left;
    }

    .pricing .plan ul.features li {
        margin: 8px;
    }

    .pricing .plan ul.features li .fas {
        margin-right: 4px;
    }

    .pricing .plan ul.features li .fa-check-circle {
        color: #f0ce15;
    }

    .pricing .plan ul.features li .fa-times-circle {
        color: #eb4d4b;
    }

    .pricing .plan button {
        border: none;
        width: 100%;
        padding: 12px 35px;
        margin-top: 1rem;
        background-color: #f0ce15;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .pricing .plan.popular {
        border: 2px solid #f0ce15;
        position: relative;
        transform: scale(1.08);
    }

    .pricing .plan.popular span {
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #f0ce15;
        color: #fff;
        padding: 4px 20px;
        font-size: 18px;
        border-radius: 5px;
    }

    .pricing .plan:hover {}

    .new_price>h6 {
    border-bottom: 1px solid #80808040;
    padding-bottom: 1px;
    font-size: 13px;
    margin-bottom: 11px;
}
 .plan:hover{
    background-color: #fff;
    padding: 0.5rem;
    margin: 0px;
    border-radius: 5px;
    text-align: center;
    transition: 0.3s;
    margin-top: 7px;
    cursor: pointer;
    transition: margin-top 700ms;
    box-shadow: 5px 7px 67px -28px rgb(40 167 69), 0px 0px 2px 0px #003f3e, 3px 7px 5px 3px #dbe4b3;
}
.plan>a{

    color: black;

}
.plan>a>.duration{
    font-family: 'Quantico';
    margin-bottom: 6px;
    /* border-bottom: 1px solid black; */
}

    @media(max-width:600px) {
        .pricing .plan {

            padding: 0.5rem;
            margin: 0px;

        }

        .pricing .plan.popular span {
            position: absolute;
            top: -23px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f0ce15;
            color: #fff;
            padding: 1px 20px;
            font-size: 18px;
            border-radius: 5px;
        }
    }
</style>
<div class="container container-bg">
    <center>

        <h3 class=" black_bar mb-2">

            VIP PACKAGES
        </h3>
    </center>




    <div class="">



        <div class="row  justify-content-center mt-5">
            @foreach ($gold as $key => $sub)
                <div class=" mb-5 col-lg-3 ">
                    <div class="plan">
                        <a href="/vip">
                            <h5 class='mb-2'><strong>MEGA PLAN</strong> </h5>
                            <span class="duration"><strong class="text-success">({{ $sub->accessTime }})</strong></span>
                            <hr>
                            <div class="row mx-0">
                                <div class="new_price col-6">
                                    <h6> {{ number_format(onlyNumbers($sub->nairaPrice)) }} <strong
                                            class="text-danger">NGN</strong></h6>

                                    <h6>{{ number_format(onlyNumbers($sub->kshPrice)) }} <strong
                                            class="text-danger">KSH</strong> </h6>
                                    <h6> {{ number_format(onlyNumbers($sub->ugxPrice)) }} <strong
                                            class="text-danger">UGX</strong></h6>

                                    <h6> {{ number_format(onlyNumbers($sub->tzsPrice)) }} <strong
                                            class="text-danger">TZS</strong></h6>





                                </div>

                                <div class="new_price col-6">

                                    <h6> {{ number_format(onlyNumbers($sub->ghsPrice)) }} <strong
                                            class="text-danger">GHS</strong></h6>

                                    <h6> {{ number_format(onlyNumbers($sub->zarPrice)) }} <strong
                                            class="text-danger">ZAR</strong></h6>

                                    <h6>{{ number_format(onlyNumbers($sub->zmwPrice)) }} <strong
                                            class="text-danger">ZMW</strong></h6>

                                    <h6>{{ number_format(onlyNumbers($sub->dollarPrice)) }} <strong
                                            class="text-danger">USD</strong></h6>



                                </div>
                            </div>

                            <!--<div class="price">$10/month</div>-->
                            <ul class="features text-left">
                                <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;Access to Daily Sure 2 to 5 odds.</li>
                                <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;Risk Management</li>
                                <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;Over 85% Accuracy</li>
                                <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;Guaranteed Profit</li>
                                <!--<li><i class="fas fa-times-circle"></i> No priority support</li>-->
                            </ul>
                            <a href="/vip" class="text-white btn w-100 mt-2 ">Subscribe</a>
                        </a>


                    </div>

                </div>
            @endforeach
            @foreach ($investment as $key => $sub)
            <div class=" mb-5 col-lg-3 ">
                <div class="plan">
                    <a>
                        <h5 class='mb-2'><strong>INVESTMENT PLAN</strong> </h5>
                        <span class="duration"><strong class="text-success">({{ $sub->accessTime }})</strong></span>
                        <hr>
                        <div class="row mx-0">
                            <div class="new_price col-6">
                                <h6> {{ number_format(onlyNumbers($sub->nairaPrice)) }} <strong
                                        class="text-danger">NGN</strong></h6>

                                <h6>{{ number_format(onlyNumbers($sub->kshPrice)) }} <strong
                                        class="text-danger">KSH</strong> </h6>
                                <h6> {{ number_format(onlyNumbers($sub->ugxPrice)) }} <strong
                                        class="text-danger">UGX</strong></h6>

                                <h6> {{ number_format(onlyNumbers($sub->tzsPrice)) }} <strong
                                        class="text-danger">TZS</strong></h6>





                            </div>

                            <div class="new_price col-6">

                                <h6> {{ number_format(onlyNumbers($sub->ghsPrice)) }} <strong
                                        class="text-danger">GHS</strong></h6>

                                <h6> {{ number_format(onlyNumbers($sub->zarPrice)) }} <strong
                                        class="text-danger">ZAR</strong></h6>

                                <h6>{{ number_format(onlyNumbers($sub->zmwPrice)) }} <strong
                                        class="text-danger">ZMW</strong></h6>

                                <h6>{{ number_format(onlyNumbers($sub->dollarPrice)) }} <strong
                                        class="text-danger">USD</strong></h6>



                            </div>
                        </div>

                        <!--<div class="price">$10/month</div>-->
                        <ul class="features text-left">
                            <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;Access to Daily Sure 2 to 5 odds.</li>
                            <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;Risk Management</li>
                            <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;Over 85% Accuracy</li>
                            <li><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;Guaranteed Profit</li>
                            <!--<li><i class="fas fa-times-circle"></i> No priority support</li>-->
                        </ul>
                        <a href="{{ route('/pay',['category'=>$sub->category,'title'=>$sub->planName]) }}" class="text-white btn w-100 mt-2 ">Subscribe</a>
                    </a>

                </div>

            </div>
        @endforeach




        </div>



    </div>


</div>
