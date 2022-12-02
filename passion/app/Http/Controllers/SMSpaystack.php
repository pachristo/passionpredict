<?php

namespace App\Http\Controllers;

use App\sms_subscriptions;
use App\sms_transactions;
use App\sms_recovery;
use App\Solos\Modules\User\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;

class SMSpaystack extends Controller
{
    public function getPaymentStatus($subID, $code, sms_transactions $transaction ,sms_recovery $recovery)
    {
        // Get the payment ID before session clear
        $user = currentUser();
        $sub = sms_subscriptions::find($subID);

        $date = new DateTime();

        //  FOR EARLY BIRTH
//        $next = strtotime('+'.$sub->accessTime, strtotime(date('2018-03-23 H:i:s')));
//        $nextdue = date("Y-m-d H:i:s", $next);

        //  DEFAULT
        $today = $date->format('Y-m-d H:i:s');
        $nextdue = date('Y-m-d H:i:s', strtotime('+'.$sub->accessTime));

        $result = array();
        //The parameter after verify/ is the transaction reference to be verified
        $url = "https://api.paystack.co/transaction/verify/$code";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, [
            	//real key 
            	
                'Authorization: Bearer sk_live_a79f711f2c1a63281bfd5092aa44bd5efe5317e2'
            ]
        );
        $request = curl_exec($ch);
//        if(curl_error($ch))
//        {
//            echo 'error:' . curl_error($ch);
//        }
        curl_close($ch);

        if ($request) {
            $result = json_decode($request, true);
        }
        if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
            if (currentUser()->sms_status=='1')
            {
                $next = strtotime('+'.$sub->accessTime, strtotime(currentUser()->sms_due_date));
                $nextdue = date("Y-m-d H:i:s", $next);
            }
            User::where('id', currentUser()->id)->update(['sms_subs_id'=>$sub->id, 'sms_status'=>'1', 'sms_subscription_status'=>'1', 'sms_subscribed_date'=>Carbon::now()->format('Y-m-d H:i:s'), 'sms_due_date'=>$nextdue]);
           // User::where('id', currentUser()->id)->increment('sub_count');

            $transaction->create(['transactionRef'=>$result['data']['reference'], 'transactionID'=>$result['data']['id'], 'transactionType'=>'sms_subscription', 'userID'=>currentUser()->id, 'planID'=>$subID, 'subDate'=>$today, 'statusCode'=>$result['data']['status'], 'amountPaid'=>$sub->nairaPrice]);

             $recovery->create(['user_id'=>currentUser()->id, 'sub_id'=>$sub->id, 'date_subscribed'=>date('Y-m-d H:i:s'), 'due_date'=>$nextdue]);

            session()->flash('success', 'PAYMENT COMPLETED! YOUR ACCOUNT HAS BEEN UPGRADED');
            return redirect('/SmsHome');
        }else{
            session()->flash('error', 'TRANSACTION WAS NOT SUCCESSFUL');
            return redirect('/smspricing');
        }
    }
}
