<?php

namespace App\Http\Controllers;

use App\Helpers\ImageValidator;
use App\Mail\RegistrationEmail;
use App\Solos\Modules\BookingCode\Model\BookingCode;
use App\Solos\Modules\Prediction\Model\Prediction;
use App\Solos\Modules\Subscription\Model\Subscription;
use App\Solos\Modules\User\Model\User;
use Carbon\Carbon;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Image;

class apiController extends Controller
{
    public function postLogin(Request $request, Sentinel $sentinel, Subscription $subscription)
    {
        $data = $request;

        try {
            if ($sentinel->authenticate(['login' => $data['email'], 'password' => $data['password']]))
            {
                $user = currentUser();
                $token = md5(rand(11111,55555));

                User::whereId(currentUser()->id)->update(['_token'=>$token]);

                return response()->json([
                    'code' => 200,
                    'data'=>$user,
                    'token'=>$token
                ], 200);

            }
            return response()->json([
                'code' => 201,
                'error'=>'INVALID LOGIN DETAILS'
            ], 200);

        }  catch (ThrottlingException $e) {
            $delay = $e->getDelay();

            return response()->json([
                'code' => 201,
                'error'=>"YOU ARE FLAGGED! TRY LOGIN IN $delay SECONDS."
            ], 200);

        } catch (NotActivatedException $e) {

            $user = $e->getUser();
            return response()->json([
                'code' => 201,
                'error'=>"Hello $user->firstName, your account has not been activated. An email was sent to $user->email. Kindly check your email to proceed!"
            ], 200);

        }
    }

    public function getVIP(Request $request, Subscription $subscription)
    {
        $user = $this->validateToken($request);
        if ($user) {
            $silver = $subscription->where('category', 'Silver Plan')->get();
            $gold = $subscription->where('category', 'Gold Plan')->get();
            $investment = $subscription->where('category', 'Super Investment Tip')->get();

            return response()->json([
                'code' => 200,
                'vip_packages' => ['silver' => $silver, 'gold' => $gold, 'investment' => $investment, 'country' => $user->country]
            ], 200);
        }
        return $this->invalidTokenExit();

    }

    public function postRegister(Request $request, Sentinel $sentinel, Mailer $mailer, Subscription $subscription)
    {
        $data = $request->except('_token');

        $valEmail = Validator::make($data, [
            'email' => 'unique:users'
        ]);

        if ($valEmail->fails()) {
            return response()->json([
                'code' => 201,
                'error'=>'EMAIL ALREADY USED FOR AN ACCOUNT'
            ], 200);
        }

        $user = $sentinel->registerAndActivate($data);

//        $mailer->to($request['email'])->send(new RegistrationEmail($user));

        $token = md5(rand(11111,55555));

        User::whereId($user->id)->update(['_token'=>$token]);

        return response()->json([
            'code' => 200,
            'data'=>$user,
            'token'=>$token
        ], 200);
    }

    public function getFreeCategory(Request $request, Prediction $prediction)
    {
        $type = $request->type;
        $yy = [];
        $tt = [];
        $tm = [];

        if ($type=='doubleChance')
        {
            $yy = $prediction->yesterdayGame()->where('doubleChance', '!=', '')->get();
            $tt = $prediction->todayGame()->where('doubleChance', '!=', '')->get();
            $tm = $prediction->today1Game()->where('doubleChance', '!=', '')->get();
        }

        if ($type=='oneFiveGoals')
        {
            $yy = $prediction->yesterdayGame()->where('oneFiveGoals', '!=', '')->get();
            $tt = $prediction->todayGame()->where('oneFiveGoals', '!=', '')->get();
            $tm = $prediction->today1Game()->where('oneFiveGoals', '!=', '')->get();
        }

        if ($type=='twoFiveGoals')
        {
            $yy = $prediction->yesterdayGame()->where('twoFiveGoals', '!=', '')->get();
            $tt = $prediction->todayGame()->where('twoFiveGoals', '!=', '')->get();
            $tm = $prediction->today1Game()->where('twoFiveGoals', '!=', '')->get();
        }

        if ($type=='BTTS')
        {
            $yy = $prediction->yesterdayGame()->where('BTTS', '!=', 'No')->get();
            $tt = $prediction->todayGame()->where('BTTS', '!=', 'No')->get();
            $tm = $prediction->today1Game()->where('BTTS', '!=', 'No')->get();
        }

        if ($type=='overZeroFiveHT')
        {
            $yy = $prediction->yesterdayGame()->where('overZeroFiveHT', '!=', '')->get();
            $tt = $prediction->todayGame()->where('overZeroFiveHT', '!=', '')->get();
            $tm = $prediction->today1Game()->where('overZeroFiveHT', '!=', '')->get();
        }

        if ($type=='drawNoBet')
        {
            $yy = $prediction->yesterdayGame()->where('drawNoBet', '!=', '')->get();
            $tt = $prediction->todayGame()->where('drawNoBet', '!=', '')->get();
            $tm = $prediction->today1Game()->where('drawNoBet', '!=', '')->get();
        }

        if ($type=='draws')
        {
            $yy = $prediction->yesterdayGame()->where('draws', 'X')->get();
            $tt = $prediction->todayGame()->where('draws', 'X')->get();
            $tm = $prediction->today1Game()->where('draws', 'X')->get();
        }

        if ($type=='handicap')
        {
            $yy = $prediction->yesterdayGame()->where('handicap', '!=', '')->get();
            $tt = $prediction->todayGame()->where('handicap', '!=', '')->get();
            $tm = $prediction->today1Game()->where('handicap', '!=', '')->get();
        }

        if ($type=='bankerOfTheDay')
        {
            $yy = $prediction->yesterdayGame()->where('bankerOfTheDay', '!=', '')->get();
            $tt = $prediction->todayGame()->where('bankerOfTheDay', '!=', '')->get();
            $tm = $prediction->today1Game()->where('bankerOfTheDay', '!=', '')->get();
        }

        return response()->json([
            'code' => 200,
            'yesterday' => $yy,
            'today' => $tt,
            'tomorrow' => $tm
        ], 200);
    }



    public function getVIPCategory(Request $request, Prediction $prediction, BookingCode $code)
    {
        $user = $this->validateToken($request);
        if ($user) {

            if ($user->subscription_status=='0')
            {
                return response()->json([
                    'code' => 404,
                    'error' => "You do not have an active subscription!"
                ], 404);
            }

            $type = $request->type;

            $yy = $tt = $tm = [];

            $yy2 = $tt2 = $tm2 = [];

            $cy = $ct = $ctm = [];

            $cy2 = $ct2 = $ctm2 = [];

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
                $yy = $prediction->yesterdayGame()->where('superInvestment', 'Yes')->get();
                $tt = $prediction->todayGame()->where('superInvestment', 'Yes')->get();
                $tm = $prediction->today1Game()->where('superInvestment', 'Yes')->get();

                $cy = $code->yesterdayGame()->where('VIPCategory', 'investment')->first();
                $ct = $code->todayGame()->where('VIPCategory', 'investment')->first();
                $ctm = $code->today1Game()->where('VIPCategory', 'investment')->first();

                $hasBatch = false;
            }

            $gamebatchOne = [
                'yesterday' => $yy,
                'today' => $tt,
                'tomorrow' => $tm
            ];

            $gamebatchTwo = [
                'yesterday' => $yy2,
                'today' => $tt2,
                'tomorrow' => $tm2
            ];

            $codebatchOne = [
                'yesterday' => $cy,
                'today' => $ct,
                'tomorrow' => $ctm
            ];

            $codebatchTwo = [
                'yesterday' => $cy2,
                'today' => $ct2,
                'tomorrow' => $ctm2
            ];

            return response()->json([
                'code' => 200,
                'gameBatchOne' => $gamebatchOne,
                'gamebatchTwo' => $gamebatchTwo,
                'codebatchOne' => $codebatchOne,
                'codebatchTwo' => $codebatchTwo,
                'hasBatch' => $hasBatch
            ], 200);
        }

        return $this->invalidTokenExit();
    }

    public function getFreeTips(Request $request, Prediction $prediction)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $type = $request->type;

        $freeYesterday = [];
        $freeToday = [];
        $freeTomorrow = [];
        $inView = [];
        $testimonials = [];

        if ($type=='football')
        {
            $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
            $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
            $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

            $inView = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
                ->where( function ( $query ) use ($tomorrow, $nextt, $nexttt, $nextttt)
                {
                    $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
                })
                ->orderBy('gameDate', 'ASC')->take(20)->get();

            $testimonials = $prediction->where('display', '0')
                ->where('superInvestment', NULL)
                ->where('testimonial', '1')
                ->where('testimonialValue', '!=', '')
                ->whereTennis('')
                ->whereBasketball('')
                ->whereHandball('')
                ->whereIceHockey('')
                ->orderBy('updated_at', 'DESC')->take(15)->get();

        }
        if ($type=='basketball')
        {
            $freeYesterday = $prediction->yesterdayGame()->where('basketball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
            $freeToday = $prediction->todayGame()->where('basketball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
            $freeTomorrow = $prediction->today1Game()->where('basketball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();

            $testimonials = $prediction->where('display', '0')->where('basketball', '!=', '')->where('testimonial', '1')->where('testimonialValue', '!=', '')->orderBy('updated_at', 'DESC')->take(15)->get();
        }
        if ($type=='handball')
        {
            $freeYesterday = $prediction->yesterdayGame()->where('handball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
            $freeToday = $prediction->todayGame()->where('handball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
            $freeTomorrow = $prediction->today1Game()->where('handball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();

            $testimonials = $prediction->where('display', '0')->where('handball', '!=', '')->where('testimonial', '1')->where('testimonialValue', '!=', '')->orderBy('updated_at', 'DESC')->take(15)->get();
        }
        if ($type=='hockey')
        {
            $freeYesterday = $prediction->yesterdayGame()->where('ice_hockey', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
            $freeToday = $prediction->todayGame()->where('ice_hockey', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
            $freeTomorrow = $prediction->today1Game()->where('ice_hockey', '!=', '')->orderBy('id', 'DESC')->take(40)->get();

            $testimonials = $prediction->where('display', '0')->where('ice_hockey', '!=', '')->where('testimonial', '1')->where('testimonialValue', '!=', '')->orderBy('updated_at', 'DESC')->take(15)->get();
        }
        if ($type=='tennis')
        {
            $freeYesterday = $prediction->yesterdayGame()->where('tennis', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
            $freeToday = $prediction->todayGame()->where('tennis', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
            $freeTomorrow = $prediction->today1Game()->where('tennis', '!=', '')->orderBy('id', 'DESC')->take(40)->get();

            $testimonials = $prediction->where('display', '0')->where('tennis', '!=', '')->where('testimonial', '1')->where('testimonialValue', '!=', '')->orderBy('updated_at', 'DESC')->take(15)->get();
        }

        return response()->json([
            'code' => 200,
            'yesterday' => $freeYesterday,
            'today' => $freeToday,
            'tomorrow' => $freeTomorrow,
            'inView' => $inView,
            'testimonials' => $testimonials
        ], 200);
    }

    public function getProfile(Request $request)
    {
        $user = $this->validateToken($request);
        if ($user)
        {
            $user['subscription'] = [];
            if ($user->subscription_status=='1')
            {
                $user['subscription'] = Subscription::whereId($user->subscription_id)->first();
            }

            return response()->json([
                'code' => 200,
                'data' => $user
            ], 200);
        }
        return $this->invalidTokenExit();

    }


    public function postProfile(Request $request, User $user)
    {
        $user = $this->validateToken($request);
        if ($user) {

            $data = $request->except('_token');
            $validate = Validator::make($data, [
                'full_name' => 'string|required',
                'email' => 'required|email',
                'phone' => 'required|string',
                'country' => 'required|string'
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'code' => 406,
                    'error' => 'Name, Email, Phone and Country fields are required'
                ], 406);
            }

            if (isset($request['file'])) {
                $image = ImageValidator::validator($request['file'], $request['email']);

                $thumbnailImage = Image::make($request['file']);

                $thumbnailImage->resize(300, 300);
                $thumbnailImage->save('images/users/' . $image);

                $user->where('id', $user->id)->update(['passport' => $image]);
            }

            if (isset($request['password']) && trim($request['password']) != '') {
                if ($request['password'] == $request['password_confirmation']) {
                    $user->where('id', $user->id)->update(['password' => bcrypt($request['password'])]);
                } else {
                    return response()->json([
                        'code' => 406,
                        'error' => 'Password Do Not Match'
                    ], 406);
                }
            }
            $u = $user->where('id', $user->id)->update($request->all(['full_name', 'username', 'email', 'phone', 'country', 'state']));

            return response()->json([
                'code' => 200,
                'data' => $u
            ], 200);
        }
        return $this->invalidTokenExit();
    }

    public function getPay(Request $request, Sentinel $sentinel)
    {
        $type = $request->type;
        $userId = $request->user;
        $plan = $request->plan;
        $country = $request->country;

        $error = null;

        $sub = Subscription::find($plan);
        $user = User::find($userId);

        $sentinel->login($user);
        session()->put('isMobile', 'yes');

        if ($user->subscription_status=='1') {
            $current = Subscription::find($user->subscription_id);

            $error = "YOU CURRENTLY HAVE AN ACTIVE SUBSCRIPTION OF <strong>$current->category $current->planName</strong>. <br><br> <strong>WE DO NOT SUPPORT DOUBLE-SUBSCRIPTION AT THE MOMENT.</strong> <br><br> KINDLY CONTACT OUR ADMINISTRATOR IS YOU WISH TO CHANGE YOUR SUBSCRIPTION PACKAGE";
        }
        if ($sub) return view('mobile-pay', compact('sub', 'error', 'type', 'user', 'country'));
    }

    public function getInvestment()
    {
        $odd = 0;

        $investment = Prediction::where('superInvestment', 'Yes')->where('gameDate', Carbon::today()->format('d-m-Y'))->where('display', '0')->orderBy('id', 'DESC')->first();

        if ($investment) $odd = number_format($investment->superInvestmentOdds,2);

        return response()->json([
            'code' => 200,
            'odd' => $odd
        ], 200);
    }









    private function validateToken($request)
    {
        $token_ = $request->header('Authorization');
        $token = explode(' ', $token_)[1];

        $user = User::where('_token', $token)->first();
        if (!$user) return false;

        if ($user->next_due_date<=Carbon::now()->format('Y-m-d H:i:s')) {
            User::where('id', $user->id)->update(['subscription_status' => '0']);
        }

        return $user;
    }

    private function invalidTokenExit()
    {
        return response()->json([
            'code' => 404,
            'error' => 'Invalid Authorization Token'
        ], 404);
    }
}
