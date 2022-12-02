<?php

namespace App\Http\Controllers;

use App\sms_subscriptions;
use App\sms_transactions;
use App\sms_recovery;
use App\Solos\Modules\User\Model\User;
//use App\Mail\ActivationEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class SMSvoyage extends Controller
{
    public function processPayment($transactionID=null, $planID=null, sms_transactions $transaction, sms_subscriptions $subscription, Mailer $mailer, sms_recovery $recovery)
    {
        $result = array();
        //  DEFAULT
        $sub = $subscription->find($planID);
        $today = Carbon::today()->format('Y-m-d H:i:s');
        $nextdue = date('Y-m-d H:i:s', strtotime('+'.$sub->accessTime));

        $url = "https://voguepay.com/?v_transaction_id=$transactionID&type=JSON";
//        $url = "https://voguepay.com/?v_transaction_id=5b081ba516c38&type=JSON";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HEADER, false);
        $response = curl_exec($ch);
//        if(curl_error($ch))
//        {
//            echo 'error:' . curl_error($ch);
//        }
        curl_close($ch);
        if ($response) {
            $result = json_decode($response, true);
        }
		//dd($result);
        if (array_key_exists('status', $result) && ($result['status'] === 'Approved')) {
            $email = currentUser()->email;
            if (currentUser()->sms_status=='1')
            {
                $next = strtotime('+'.$sub->accessTime, strtotime(currentUser()->sms_due_date));
                $nextdue = date("Y-m-d H:i:s", $next);
            }
            User::where('id', currentUser()->id)->update(['sms_subs_id'=>$sub->id,  'sms_status'=>'1','sms_subcription_status'=>'1', 'sms_subscribed_date'=>Carbon::now()->format('Y-m-d H:i:s'), 'sms_due_date'=>$nextdue]);
           // User::where('id', currentUser()->id)->increment('sub_count');

            $transaction->create(['transactionRef'=>$result['memo'], 'transactionID'=>$result['transaction_id'], 'transactionType'=>'sms_subscription', 'userID'=>currentUser()->id, 'planID'=>$planID, 'subDate'=>$today, 'statusCode'=>$result['status'], 'amountPaid'=>$sub->nairaPrice]);
             $recovery->create(['user_id'=>currentUser()->id, 'sub_id'=>$sub->id, 'date_subscribed'=>date('Y-m-d H:i:s'), 'due_date'=>$nextdue]);
				//$mailer->to($email)->send(new ActivationEmail(currentUser(), $sub, $today, $nextdue));

            session()->flash('success', 'PAYMENT COMPLETED! YOUR ACCOUNT HAS BEEN UPGRADED');
            return redirect('/SmsHome');

        }else{
            session()->flash('error', 'TRANSACTION WAS NOT SUCCESSFUL');
            return redirect('/smspricing');
        }
    }
}
