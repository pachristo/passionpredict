<?php
namespace App\Http\Controllers;

use App\sms_subscriptions;
use App\sms_transactions;
use App\sms_recovery;
use App\Victors\Modules\User\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;

class SMSrave extends Controller
{

    public function getrbetFinish($id=null, $txRef=null, sms_transactions $transaction ,sms_subscriptions $subscription,sms_recovery $recovery)
    {
        $sub = $subscription->find($id);
        $date = new DateTime();
        //  DEFAULT
        $today = $date->format('Y-m-d H:i:s');
        $nextdue = date('Y-m-d H:i:s', strtotime('+'.$sub->accessTime));
        //realkey
        $data = array('txref' => $txRef,
            'SECKEY' => 'FLWSECK-803c1fb2843b041c8ca670dcd0cb4d45-X' //secret key from pay button generated on rave dashboard
        );



        // make request to endpoint using unirest.
        $headers = array('Content-Type' => 'application/json');
        $body = \Unirest\Request\Body::json($data);
        $url = "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify"; //please make sure to change this to production url when you go live

// Make `POST` request and handle response with unirest
        $response = \Unirest\Request::post($url, $headers, $body);
//        dd($response);
        //check the status is success
        if ($response->body->data->status === "successful" && $response->body->data->chargecode === "00") {
// echo("Give value");

            $user = User::find(currentUser()->id);

            $confirm = $transaction->where('transactionRef', $txRef)->where('userID', currentUser()->id)->first();
            if ($user->sms_subscription_status=='1' )
            {
                session()->flash('success', 'YOUR ACCOUNT HAS BEEN PREVIOUSLY UPGRADED! THANKS.');
                return redirect('/dashboard');
//                $next = strtotime('+'.$sub->accessTime, strtotime(currentUser()->next_due_date));
//                $nextdue = date("Y-m-d H:i:s", $next);
            }

            User::where('id', currentUser()->id)->update(['sms_subs_id'=>$sub->id, 'sms_subscription_status'=>'1', 'sms_status'=>'1', 'sms_subscribed_date'=>Carbon::now()->format('Y-m-d H:i:s'), 'sms_due_date'=>$nextdue]);
            //User::where('id', currentUser()->id)->increment('sub_count');

            $transaction->create(['transactionRef'=>$response->body->data->txref, 'transactionID'=>$response->body->data->txid, 'transactionType'=>'sms_subscription', 'userID'=>currentUser()->id, 'planID'=>$id, 'subDate'=>$today, 'statusCode'=>$response->body->data->status, 'amountPaid'=>$sub->keshPrice]);
            $recovery->create(['user_id'=>currentUser()->id, 'sub_id'=>$id, 'date_subscribed'=>date('Y-m-d H:i:s'), 'due_date'=>$nextdue]);

            session()->flash('success', 'PAYMENT COMPLETED! YOUR ACCOUNT HAS BEEN UPGRADED');
            return redirect('/SmsHome');
        }
        session()->flash('error', 'TRANSACTION WAS NOT SUCCESSFUL');
        return redirect('/smspricing');
    }
    public function getFinish($id=null, $txRef=null, sms_transactions $transaction ,sms_subscriptions $subscription,sms_recovery $recovery)
    {
        $sub = $subscription->find($id);
        $date = new DateTime();
        //  DEFAULT
        $today = $date->format('Y-m-d H:i:s');
        $nextdue = date('Y-m-d H:i:s', strtotime('+'.$sub->accessTime));
        //realkey 
        $data = array('txref' => $txRef,
            'SECKEY' => 'FLWSECK-803c1fb2843b041c8ca670dcd0cb4d45-X' //secret key from pay button generated on rave dashboard
        );



        // make request to endpoint using unirest.
        $headers = array('Content-Type' => 'application/json');
        $body = \Unirest\Request\Body::json($data);
        $url = "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify"; //please make sure to change this to production url when you go live

// Make `POST` request and handle response with unirest
        $response = \Unirest\Request::post($url, $headers, $body);
//        dd($response);
        //check the status is success
        if ($response->body->data->status === "successful" && $response->body->data->chargecode === "00") {
// echo("Give value");

            $user = User::find(currentUser()->id);

            $confirm = $transaction->where('transactionRef', $txRef)->where('userID', currentUser()->id)->first();
            if ($user->sms_subscription_status=='1' )
            {
                session()->flash('success', 'YOUR ACCOUNT HAS BEEN PREVIOUSLY UPGRADED! THANKS.');
                return redirect('/dashboard');
//                $next = strtotime('+'.$sub->accessTime, strtotime(currentUser()->next_due_date));
//                $nextdue = date("Y-m-d H:i:s", $next);
            }

            User::where('id', currentUser()->id)->update(['sms_subs_id'=>$sub->id, 'sms_subscription_status'=>'1', 'sms_status'=>'1', 'sms_subscribed_date'=>Carbon::now()->format('Y-m-d H:i:s'), 'sms_due_date'=>$nextdue]);
            //User::where('id', currentUser()->id)->increment('sub_count');

            $transaction->create(['transactionRef'=>$response->body->data->txref, 'transactionID'=>$response->body->data->txid, 'transactionType'=>'sms_subscription', 'userID'=>currentUser()->id, 'planID'=>$id, 'subDate'=>$today, 'statusCode'=>$response->body->data->status, 'amountPaid'=>$sub->keshPrice]);
               $recovery->create(['user_id'=>currentUser()->id, 'sub_id'=>$id, 'date_subscribed'=>date('Y-m-d H:i:s'), 'due_date'=>$nextdue]);

            session()->flash('success', 'PAYMENT COMPLETED! YOUR ACCOUNT HAS BEEN UPGRADED');
            return redirect('/SmsHome');
        }
        session()->flash('error', 'TRANSACTION WAS NOT SUCCESSFUL');
        return redirect('/smspricing');
    }
}
