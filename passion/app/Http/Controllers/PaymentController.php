<?php

namespace App\Http\Controllers;

use App\sms_subscriptions;
use App\Solos\Modules\Subscription\Model\Subscription;
use Illuminate\Http\Request;

class PaymentController extends Controller {
	public $sub;
	public function __construct(Subscription $subscription) {
		$this->sub = $subscription;
	}

	public function getPayment($category = null, $plan = null, Request $request) {

		$sub = $this->sub->findSub($category, $plan);
		// dd($sub);
		if (currentUser()->subscription_status == '1') {
			$request->session()->flash("error", "YOU HAVE AN ACTIVE SUBSCRIPTION <strong>WE DO NOT CURRENTLY SUPPORT DOUBLE-SUBSCRIPTION</strong>");
			return redirect('/dashboard');
		}
		if ($sub) {
			// $request->session()->put('subRoute', $request->url());
			//dd($request->url());
			return view('pay', compact('sub'));
		}

		return redirect('/pricing');
	}

	public function getSmsPayment($category = null, $plan = null, Request $request, sms_subscriptions $sms) {
		//session()->put('subRoute', $request->url());
		$sub = $sms->where('category', $category)->where('planName', $plan)->first();
		//dd(print_r($sub));
		if (currentUser()->sms_subscription_status == '1') {
			$request->session()->flash("error", "YOU HAVE AN ACTIVE SUBSCRIPTION <strong>WE DO NOT CURRENTLY SUPPORT DOUBLE-SUBSCRIPTION</strong>");
			return redirect('/SmsHome');
		}
		if ($sub) {
			// $request->session()->put('subRoute', $request->url());
			return view('sms.sms_pay', compact('sub'));
		}

		return redirect('/pricing');
	}
}
