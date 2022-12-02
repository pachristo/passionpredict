<?php

namespace App\Http\Controllers;

use App\Helpers\ImageValidator;
use App\Helpers\JSONResponder;
use App\Solos\Modules\BookingCode\Model\BookingCode;
use App\Solos\Modules\Prediction\Model\Prediction;
use App\Solos\Modules\Subscription\Model\Subscription;
use App\Solos\Modules\User\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PortalController extends Controller
{
    public function getHome(Subscription $subscription, Prediction $prediction, BookingCode $code)
    {

        $yy = $tt = $tm = [];

        $yy2 = $tt2 = $tm2 = [];

        $cy = $ct = $ctm = [];

        $cy2 = $ct2 = $ctm2 = [];
        $type = '';
		$title = '';
        $keys = '';
        if (currentUser()->subscription_status == '1') {

            if (currentUser()->sub->category == 'Silver Plan') {
                $type = "sure2Odds";

            } elseif (currentUser()->sub->category == 'Mega Plan') {
                $type = "sure5Odds";
            } elseif (currentUser()->sub->category == 'Super Investment Tip') {
                $type = "superInvestment";
            }

            $hasBatch = false;

            if ($type == 'sure2Odds') {

                $yy = $prediction->yesterdayGame()->where('sure2Odds', 'one')->get();
                $tt = $prediction->todayGame()->where('sure2Odds', 'one')->get();
                $tm = $prediction->today1Game()->where('sure2Odds', 'one')->get();

                $yy2 = $prediction->yesterdayGame()->where('sure2Odds', 'two')->get();
                $tt2 = $prediction->todayGame()->where('sure2Odds', 'two')->get();
                $tm2 = $prediction->today1Game()->where('sure2Odds', 'two')->get();

                $cy = $code->yesterdayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'one')->first();
                $ct = $code->todayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'one')->first();
                $ctm = $code->today1Game()->where('VIPCategory', 'sure2')->where('codeTime', 'one')->first();

                $cy2 = $code->yesterdayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'two')->first();
                $ct2 = $code->todayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'two')->first();
                $ctm2 = $code->today1Game()->where('VIPCategory', 'sure2')->where('codeTime', 'two')->first();

                $hasBatch = true;
				$title = 'Sure 2+ Odds';
				$keys = 'sure2';
            }

            if ($type == 'sure3Odds') {
                $yy = $prediction->yesterdayGame()->where('sure3Odds', 'one')->get();
                $tt = $prediction->todayGame()->where('sure3Odds', 'one')->get();
                $tm = $prediction->today1Game()->where('sure3Odds', 'one')->get();

                $yy2 = $prediction->yesterdayGame()->where('sure3Odds', 'two')->get();
                $tt2 = $prediction->todayGame()->where('sure3Odds', 'two')->get();
                $tm2 = $prediction->today1Game()->where('sure3Odds', 'two')->get();

                $cy = $code->yesterdayGame()->where('VIPCategory', 'sure3')->where('codeTime', 'one')->first();
                $ct = $code->todayGame()->where('VIPCategory', 'sure3')->where('codeTime', 'one')->first();
                $ctm = $code->today1Game()->where('VIPCategory', 'sure3')->where('codeTime', 'one')->first();

                $cy2 = $code->yesterdayGame()->where('VIPCategory', 'sure3')->where('codeTime', 'two')->first();
                $ct2 = $code->todayGame()->where('VIPCategory', 'sure3')->where('codeTime', 'two')->first();
                $ctm2 = $code->today1Game()->where('VIPCategory', 'sure3')->where('codeTime', 'two')->first();

                $hasBatch = true;
            }

            if ($type == 'overThree') {
                $yy = $prediction->yesterdayGame()->where('overThree', 'one')->get();
                $tt = $prediction->todayGame()->where('overThree', 'one')->get();
                $tm = $prediction->today1Game()->where('overThree', 'one')->get();

                $yy2 = $prediction->yesterdayGame()->where('overThree', 'two')->get();
                $tt2 = $prediction->todayGame()->where('overThree', 'two')->get();
                $tm2 = $prediction->today1Game()->where('overThree', 'two')->get();

                $cy = $code->yesterdayGame()->where('VIPCategory', 'over35')->where('codeTime', 'one')->first();
                $ct = $code->todayGame()->where('VIPCategory', 'over35')->where('codeTime', 'one')->first();
                $ctm = $code->today1Game()->where('VIPCategory', 'over35')->where('codeTime', 'one')->first();

                $cy2 = $code->yesterdayGame()->where('VIPCategory', 'over35')->where('codeTime', 'two')->first();
                $ct2 = $code->todayGame()->where('VIPCategory', 'over35')->where('codeTime', 'two')->first();
                $ctm2 = $code->today1Game()->where('VIPCategory', 'over35')->where('codeTime', 'two')->first();

                $hasBatch = true;
            }
            if ($type == 'superSingle') {
                $yy = $prediction->yesterdayGame()->where('superSingle', 'one')->get();
                $tt = $prediction->todayGame()->where('superSingle', 'one')->get();
                $tm = $prediction->today1Game()->where('superSingle', 'one')->get();

                $yy2 = $prediction->yesterdayGame()->where('superSingle', 'two')->get();
                $tt2 = $prediction->todayGame()->where('superSingle', 'two')->get();
                $tm2 = $prediction->today1Game()->where('superSingle', 'two')->get();

                $cy = $code->yesterdayGame()->where('VIPCategory', 'superSingle')->where('codeTime', 'one')->first();
                $ct = $code->todayGame()->where('VIPCategory', 'superSingle')->where('codeTime', 'one')->first();
                $ctm = $code->today1Game()->where('VIPCategory', 'superSingle')->where('codeTime', 'one')->first();

                $cy2 = $code->yesterdayGame()->where('VIPCategory', 'superSingle')->where('codeTime', 'two')->first();
                $ct2 = $code->todayGame()->where('VIPCategory', 'superSingle')->where('codeTime', 'two')->first();
                $ctm2 = $code->today1Game()->where('VIPCategory', 'superSingle')->where('codeTime', 'two')->first();

                $hasBatch = true;
            }
            if ($type == 'sure5Odds') {
                $yy = $prediction->yesterdayGame()->where('sure5Odds', 'one')->get();
                $tt = $prediction->todayGame()->where('sure5Odds', 'one')->get();
                $tm = $prediction->today1Game()->where('sure5Odds', 'one')->get();

                $yy2 = $prediction->yesterdayGame()->where('sure5Odds', 'two')->get();
                $tt2 = $prediction->todayGame()->where('sure5Odds', 'two')->get();
                $tm2 = $prediction->today1Game()->where('sure5Odds', 'two')->get();

                $cy = $code->yesterdayGame()->where('VIPCategory', 'sure5')->where('codeTime', 'one')->first();
                $ct = $code->todayGame()->where('VIPCategory', 'sure5')->where('codeTime', 'one')->first();
                $ctm = $code->today1Game()->where('VIPCategory', 'sure5')->where('codeTime', 'one')->first();

                $cy2 = $code->yesterdayGame()->where('VIPCategory', 'sure5')->where('codeTime', 'two')->first();
                $ct2 = $code->todayGame()->where('VIPCategory', 'sure5')->where('codeTime', 'two')->first();
                $ctm2 = $code->today1Game()->where('VIPCategory', 'sure5')->where('codeTime', 'two')->first();

                $hasBatch = true;
				$title = 'VIP tips';
				$keys = 'sure5';
            }
            if ($type == 'fiftyPlus') {
                $yy = $prediction->yesterdayGame()->where('fiftyPlus', 'one')->get();
                $tt = $prediction->todayGame()->where('fiftyPlus', 'one')->get();
                $tm = $prediction->today1Game()->where('fiftyPlus', 'one')->get();

                $yy2 = $prediction->yesterdayGame()->where('fiftyPlus', 'two')->get();
                $tt2 = $prediction->todayGame()->where('fiftyPlus', 'two')->get();
                $tm2 = $prediction->today1Game()->where('fiftyPlus', 'two')->get();

                $cy = $code->yesterdayGame()->where('VIPCategory', 'sure50')->where('codeTime', 'one')->first();
                $ct = $code->todayGame()->where('VIPCategory', 'sure50')->where('codeTime', 'one')->first();
                $ctm = $code->today1Game()->where('VIPCategory', 'sure50')->where('codeTime', 'one')->first();

                $cy2 = $code->yesterdayGame()->where('VIPCategory', 'sure50')->where('codeTime', 'two')->first();
                $ct2 = $code->todayGame()->where('VIPCategory', 'sure50')->where('codeTime', 'two')->first();
                $ctm2 = $code->today1Game()->where('VIPCategory', 'sure50')->where('codeTime', 'two')->first();

                $hasBatch = true;
            }
            if ($type == 'weekend') {
                $yy = $prediction->yesterdayGame()->where('weekend', 'one')->get();
                $tt = $prediction->todayGame()->where('weekend', 'one')->get();
                $tm = $prediction->today1Game()->where('weekend', 'one')->get();

                $yy2 = $prediction->yesterdayGame()->where('weekend', 'two')->get();
                $tt2 = $prediction->todayGame()->where('weekend', 'two')->get();
                $tm2 = $prediction->today1Game()->where('weekend', 'two')->get();

                $cy = $code->yesterdayGame()->where('VIPCategory', 'weekend')->where('codeTime', 'one')->first();
                $ct = $code->todayGame()->where('VIPCategory', 'weekend')->where('codeTime', 'one')->first();
                $ctm = $code->today1Game()->where('VIPCategory', 'weekend')->where('codeTime', 'one')->first();

                $cy2 = $code->yesterdayGame()->where('VIPCategory', 'weekend')->where('codeTime', 'two')->first();
                $ct2 = $code->todayGame()->where('VIPCategory', 'weekend')->where('codeTime', 'two')->first();
                $ctm2 = $code->today1Game()->where('VIPCategory', 'weekend')->where('codeTime', 'two')->first();

                $hasBatch = true;
            }
            if ($type == 'HTFT') {
                $yy = $prediction->yesterdayGame()->where('HTFT', '!=', '')->get();
                $tt = $prediction->todayGame()->where('HTFT', '!=', '')->get();
                $tm = $prediction->today1Game()->where('HTFT', '!=', '')->get();

                $cy = $code->yesterdayGame()->where('VIPCategory', 'htft')->first();
                $ct = $code->todayGame()->where('VIPCategory', 'htft')->first();
                $ctm = $code->today1Game()->where('VIPCategory', 'htft')->first();

                $hasBatch = false;
            }
            if ($type == 'superInvestment') {
                $yy = $prediction->yesterdayGame()->where('superInvestment', 'one')->get();
                $tt = $prediction->todayGame()->where('superInvestment', 'one')->get();
                $tm = $prediction->today1Game()->where('superInvestment','one')->get();

                $cy = $code->yesterdayGame()->where('VIPCategory', 'investment')->first();
                $ct = $code->todayGame()->where('VIPCategory', 'investment')->first();
                $ctm = $code->today1Game()->where('VIPCategory', 'investment')->first();

                $hasBatch = false;
                $yy2 = $prediction->yesterdayGame()->where('superInvestment', 'two')->get();
                $tt2 = $prediction->todayGame()->where('superInvestment', 'two')->get();
                $tm2 = $prediction->today1Game()->where('superInvestment', 'two')->get();
				$title = 'Super Investment Tips';
				$keys = 'suInTip';
            }
        }
        $silver = $subscription->where('category', 'Silver Plan')->where('status', '0')->get();
        $gold = $subscription->where('category', 'Mega Plan')->where('status', '0')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->where('status', '0')->get();
	// return  currentUser()->sub;
        return view('portal.index', compact('silver', 'gold', 'investment','yy','yy2','tt','tt2','tm','tm2','cy','cy2','ct','ct2','ctm','ctm2','keys','title'));
    }

    public function getUpdateProfile()
    {
        return view('portal.update');
        // return redirect('/dashboard');
    }

    public function postUpdateProfile(Request $request, User $user)
    {
        $data = $request->except('_token');
        $validate = Validator::make($data, [
            'full_name' => 'string|required',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
        ]);
        if ($validate->fails()) {
            JSONResponder::validationMessage('ALL * FIELDS ARE REQUIRED');
        }

        if (isset($request['file'])) {
            $image = ImageValidator::validator($request['file'], $request['email']);

            $thumbnailImage = Image::make($request['file']);

            $thumbnailImage->resize(300, 300);
            $thumbnailImage->save('images/users/' . $image);

            $user->where('id', currentUser()->id)->update(['passport' => $image]);
        }

        if (isset($request['password']) && trim($request['password']) != '') {
            if ($request['password'] == $request['password_confirmation']) {

                $user->where('id', currentUser()->id)->update(['password' => bcrypt($request['password'])]);

            } else {JSONResponder::validationMessage('PASSWORD DO NOT MATCH');}
        }
        $value = $request->all();

        if ($value['phone'] != currentUser()->phone) {
            $user->where('id', currentUser()->id)->update(['phone_status' => null, 'country_code' => null]);
        }
        $user->where('id', currentUser()->id)->update($request->all(['full_name', 'username', 'email', 'phone', 'country', 'state', 'about_me']));
        if (session()->has('subRoute')) {
            $url = $request->session()->pull('subRoute');
            $request->session()->forget('subRoute');

            JSONResponder::validationMessage($url, '9');
        } else {
            JSONResponder::validationMessage('Ok', '0');
        }

    }

    public function getMakePayment(Subscription $subscription)
    {
        $planID = currentUser()->subscription_id;
        if ($planID) {
            $sub = $subscription->find($planID);
            if (isset($sub)) {
                return view('account.pay', compact('sub', 'renew'));
            }

        }
        session()->flash('error', 'PLEASE SELECT ONE OF OUR VIP PACKAGES BELOW');
        return redirect('/vip');
    }

    public function changeCoutry()
    {
        session()->put('subRoute', url()->previous());
        return redirect('/profile/update');
    }
}
