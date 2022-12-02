<?php

namespace App\Http\Controllers;

use App\Solos\Modules\Subscription\Model\Subscription;
use App\Solos\Modules\Transaction\Model\Transaction;
use App\Solos\Modules\User\Model\User;
//use App\Mail\ActivationEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class VoguepayController extends Controller
{
    public function processPayment($transactionID=null, $planID=null, Transaction $transaction, Subscription $subscription, Mailer $mailer)
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
//        dd($result);
        if (array_key_exists('status', $result) && ($result['status'] === 'Approved')) {
            $email = currentUser()->email;
            if (currentUser()->subscription_status=='1')
            {
                $next = strtotime('+'.$sub->accessTime, strtotime(currentUser()->next_due_date));
                $nextdue = date("Y-m-d H:i:s", $next);
            }
            User::where('id', currentUser()->id)->update(['subscription_id'=>$sub->id, 'subscription_type'=>$sub->planName, 'subscription_status'=>'1', 'date_subscribed'=>Carbon::now()->format('Y-m-d H:i:s'), 'next_due_date'=>$nextdue]);
            User::where('id', currentUser()->id)->increment('sub_count');

            $transaction->create(['transactionRef'=>$result['memo'], 'transactionID'=>$result['transaction_id'], 'transactionType'=>'Subscription', 'userID'=>currentUser()->id, 'planID'=>$planID, 'subDate'=>$today, 'statusCode'=>$result['status'], 'amountPaid'=>$sub->nairaPrice]);

//            $mailer->to($email)->send(new ActivationEmail(currentUser(), $sub, $today, $nextdue));

if (session()->has('isMobile'))
            {
                $msg = 'done';
                return view('mobile-done', compact('msg'));
            }
            session()->flash('success', 'PAYMENT COMPLETED! YOUR ACCOUNT HAS BEEN UPGRADED');
            return redirect('/dashboard');

        }else{
            if (session()->has('isMobile'))
        {
            $msg = 'error';
            return view('mobile-done', compact('msg'));
        }
            session()->flash('error', 'TRANSACTION WAS NOT SUCCESSFUL');
            return redirect('/pricing');
        }
    }
}
