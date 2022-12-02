
<?php

namespace App\Http\Controllers;

use App\sms_subscriptions;
use App\sms_transactions;
use App\sms_recovery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Flash;
use Mockery\Exception;
use DateTime;
use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class SMSpaypal extends Controller {

    private $_api_context;

    public function __construct() {
// setup PayPal api context
        $paypal_conf = config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);

    }

    public function store(Request $request, $category=null, $plan=null, Subscription $subscription)
    {
        $sub = $subscription->where('category', $category)->where('planName', $plan)->first();
        if (!$sub) {
            return redirect('/pricing');
        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName($sub->planName)// item name
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($sub->dollarPrice); // unit price

        // add item to list
        $item_list = new ItemList();
        $item_list->setItems([$item]);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($sub->dollarPrice);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription("Payment for $sub->category Plan of $sub->planName Access Time.");

        $redirect_urls = new RedirectUrls();
        // Specify return & cancel URL
        $redirect_urls->setReturnUrl(url('/payment/add-funds/paypal/status'))
            ->setCancelUrl(url('/payment/add-funds/paypal/status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        }

//        catch (\PayPal\Exception\PayPalConnectionException $ex) {
//            $request->session()->flash('alert', 'Something Went wrong, funds could not be loaded');
//            $request->session()->flash('alertClass', 'danger no-auto-close');
//            return redirect('/subscription');
//        }

        catch (Exception $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }


        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());
        Session::put('subPlan', $sub->id);

        if (isset($redirect_url)) {
            // redirect to paypal
            return redirect($redirect_url);
        }


        $request->session()->flash('error', 'Unknown error occurred');
        $request->session()->flash('alertClass', 'danger no-auto-close');
        return redirect('/vip');
    }


    public function getPaymentStatus(Request $request, sms_subscriptions $subscription, sms_transactions $logstrans, sms_recovery $recovery)
    {

        // Get the payment ID before session clear
        $payment_id = Session::get('paypal_payment_id');
        $subPlan = Session::get('subPlan');

        // clear the session payment ID
        Session::forget('paypal_payment_id');
        Session::forget('subPlan');

        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            $request->session()->flash('error', 'Payment failed');
            $request->session()->flash('alertClass', 'danger no-auto-close');
            return redirect('/vip');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

// PaymentExecution object includes information necessary
// to execute a PayPal account payment.
// The payer_id is added to the request query parameters
// when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

//Execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        /*
        * Get the ID with : $result->id
        * Get the State with $result->state
        * Get the Payer State with $result->payer->payment_method
        * Get The Shipping Address and More Detail like below :- $result->payer->payer_info->shipping_address
        * Get More detail about shipping address like city country name
        */

//        echo '<pre>';print_r($result->payer->payer_info->shipping_address);echo '</pre>';exit; // DEBUG RESULT.

        if ($result->getState() == 'approved') { // payment made

//            DO ALL THE UPGRADE DETAILS HERE AND SEND EMAIL TO USER
//            NOTE: CHECK IF USER IS CURRENTLY SUBSCRIBED. IF YES, ADD SUB TIME TO EXISTING NEXT_DUE_DATE. IF NO, CALCULATE NEXT_DUE_DATE FROM TODAY'S DATE AND UPGADE ACCCOUNT ACCORDINGLY

            $plan = $subscription->find($subPlan);
            $user = currentUser();

            $date = new DateTime();
            $today = $date->format('Y-m-d H:i:s');
            $nextdue = date('Y-m-d H:i:s', strtotime('+'.$plan->accessTime));

            if (currentUser()->subscription_status=='1')
            {
                $next = strtotime('+'.$plan->accessTime, strtotime(currentUser()->next_due_date));
                $nextdue = date("Y-m-d H:i:s", $next);
            }
            User::where('id', currentUser()->id)->update(['sms_subs_id'=>$plan->id, 'sms_status'=>'1', 'sms_subscription_status'=>'1', 'sms_subcribed_date'=>Carbon::now()->format('Y-m-d H:i:s'), 'sms_due_date'=>$nextdue]);
            //User::where('id', currentUser()->id)->increment('sub_count');

            $logstrans->create(['transactionRef'=>'Subscription Payment', 'transactionID'=>$result->id, 'transactionType'=>'sms_subscription', 'userID'=>currentUser()->id, 'planID'=>$plan->id, 'subDate'=>$today, 'statusCode'=>'approved', 'amountPaid'=>$plan->dollarPrice]);
             $recovery->create(['user_id'=>currentUser()->id, 'sub_id'=>$plan->id, 'date_subscribed'=>date('Y-m-d H:i:s'), 'due_date'=>$nextdue]);

            session()->flash('success', 'PAYMENT COMPLETED! YOUR ACCOUNT HAS BEEN UPGRADED');
            return redirect('/dashboard');
        }

        session()->flash('error', 'TRANSACTION WAS NOT SUCCESSFUL');
        return redirect('/pricing');
    }

}