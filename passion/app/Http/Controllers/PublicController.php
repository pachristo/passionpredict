<?php

namespace App\Http\Controllers;

use App\Helpers\JSONResponder;
use App\Mail\ContactEmail;
use App\Mail\WUEmail;
use App\sms_subscriptions;
use App\Solos\Modules\BookingCode\Model\BookingCode;
use App\Solos\Modules\ClUser\Model\ClUser;
use App\Solos\Modules\Prediction\Model\Prediction;
use App\Solos\Modules\Sponsor\Model\Sponsor;
use App\Solos\Modules\Subscription\Model\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class PublicController extends Controller
{

    public function getHome(Prediction $prediction, Sponsor $sponsor, Subscription $subscription, sms_subscriptions $sms, BookingCode $code)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $silver = $subscription->where('category', 'Silver Plan')->where('status', '0')->get();
        $gold = $subscription->where('category', 'Mega Plan')->where('status', '0')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->where('status', '0')->get();
        // return $gold;
        $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

        $todayCode = $code->todayGame()->where('VIPCategory', 'free')->first();
        $tomorrowCode = $code->today1Game()->where('VIPCategory', 'free')->first();

        $inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
            ->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
                $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
            })
            ->orderBy('gameDate', 'ASC')->take(20)->get();

        return view('welcome', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'silver', 'gold', 'investment', 'todayCode', 'tomorrowCode'));
    }
    public function getPricing( Subscription $subscription)
    {
//        if (!currentUser() && $country==null) return redirect('/select_country');
        // return redirect('/');
        // $sms = $sms->all();

        $silver = $subscription->where('category', 'Silver Plan')->where('status', '0')->get();
        $gold = $subscription->where('category', 'Mega Plan')->where('status', '0')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->where('status', '0')->get();

        return view('vip', compact('silver', 'gold', 'investment'));
    }

    public function postCountry(Request $request)
    {
        $country = $request->country;
        return redirect("/how_to_pay/$country");
    }

    public function getHowPay($country=NULL )
    {
        $hide = false;
        if (isset(request()->hide)) {
            $hide = true;
        }

        if ($country == null) {
            return redirect('/select_country')->with(['hide' => $hide]);
        }

        return view('how_to_pay', compact('country', 'hide'));
    }

    public function postContact(Request $request, Mailer $mailer)
    {
        $data = $request->except('_token');
        $mailer->to(env('MAIL_RECEIVE_ADDRESS'))->send(new ContactEmail($data));
        JSONResponder::validationMessage('Ok', '0');
    }

    public function postWUForm(Request $request, Mailer $mailer)
    {
        $email = $request->email;
        $mailer->to($email)->send(new WUEmail($email));
        JSONResponder::validationMessage('Ok', '0');
    }

    public function getNews()
    {
        $ch = curl_init('https://sportywap.com/post_api.php?range=2');
        $data = curl_exec($ch);
        echo $data;
    }
    public function getBlog($slug)
    {
        $art = \DB::table('blogs')->where('slug', $slug)->first();
        return view('article', compact('art'));
    }

    public function get_Cl($offset = 0, $take = 5)
    {
        $usr = ClUser::skip($offset)->take($take)->get();
//        dd($usr);
        foreach ($usr as $u) {
            $username = str_slug($u->fname, '_') . '_' . $u->id;
            ClUser::whereId($u->id)->update(['username' => $username]);
        }
        echo 'Done';
    }

    public function getSoccerVista(Prediction $prediction, Sponsor $sponsor, Subscription $subscription, sms_subscriptions $sms, BookingCode $code)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $silver = $subscription->where('category', 'Silver Plan')->get();
        $gold = $subscription->where('category', 'Gold Plan')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->get();

        $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

        $todayCode = $code->todayGame()->where('VIPCategory', 'free')->first();
        $tomorrowCode = $code->today1Game()->where('VIPCategory', 'free')->first();

        $inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
            ->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
                $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
            })
            ->orderBy('gameDate', 'ASC')->take(20)->get();
//die(var_dump($todayCode));
        //        $testimonials = $prediction->where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->take(15)->orderBy('updated_at', 'DESC')->get();
        //        $sponsors = $sponsor->where('publishStatus', '0')->latest('id')->get();
        return view('seo.soccervista', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'silver', 'gold', 'investment', 'todayCode', 'tomorrowCode'));
    }
    public function getPredictz(Prediction $prediction, Sponsor $sponsor, Subscription $subscription, sms_subscriptions $sms, BookingCode $code)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $silver = $subscription->where('category', 'Silver Plan')->get();
        $gold = $subscription->where('category', 'Gold Plan')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->get();

        $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

        $todayCode = $code->todayGame()->where('VIPCategory', 'free')->first();
        $tomorrowCode = $code->today1Game()->where('VIPCategory', 'free')->first();

        $inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
            ->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
                $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
            })
            ->orderBy('gameDate', 'ASC')->take(20)->get();
//die(var_dump($todayCode));
        //        $testimonials = $prediction->where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->take(15)->orderBy('updated_at', 'DESC')->get();
        //        $sponsors = $sponsor->where('publishStatus', '0')->latest('id')->get();
        return view('seo.predictz', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'silver', 'gold', 'investment', 'todayCode', 'tomorrowCode'));
    }

    public function getBetensured(Prediction $prediction, Sponsor $sponsor, Subscription $subscription, sms_subscriptions $sms, BookingCode $code)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $silver = $subscription->where('category', 'Silver Plan')->get();
        $gold = $subscription->where('category', 'Gold Plan')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->get();

        $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

        $todayCode = $code->todayGame()->where('VIPCategory', 'free')->first();
        $tomorrowCode = $code->today1Game()->where('VIPCategory', 'free')->first();

        $inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
            ->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
                $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
            })
            ->orderBy('gameDate', 'ASC')->take(20)->get();
//die(var_dump($todayCode));
        //        $testimonials = $prediction->where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->take(15)->orderBy('updated_at', 'DESC')->get();
        //        $sponsors = $sponsor->where('publishStatus', '0')->latest('id')->get();
        return view('seo.betensured', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'silver', 'gold', 'investment', 'todayCode', 'tomorrowCode'));
    }

    public function getFootbalPredictions(Prediction $prediction, Sponsor $sponsor, Subscription $subscription, sms_subscriptions $sms, BookingCode $code)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $silver = $subscription->where('category', 'Silver Plan')->get();
        $gold = $subscription->where('category', 'Gold Plan')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->get();

        $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

        $todayCode = $code->todayGame()->where('VIPCategory', 'free')->first();
        $tomorrowCode = $code->today1Game()->where('VIPCategory', 'free')->first();

        $inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
            ->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
                $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
            })
            ->orderBy('gameDate', 'ASC')->take(20)->get();
//die(var_dump($todayCode));
        //        $testimonials = $prediction->where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->take(15)->orderBy('updated_at', 'DESC')->get();
        //        $sponsors = $sponsor->where('publishStatus', '0')->latest('id')->get();
        return view('seo.football-prediction', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'silver', 'gold', 'investment', 'todayCode', 'tomorrowCode'));
    }

    public function getForebet(Prediction $prediction, Sponsor $sponsor, Subscription $subscription, sms_subscriptions $sms, BookingCode $code)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $silver = $subscription->where('category', 'Silver Plan')->get();
        $gold = $subscription->where('category', 'Gold Plan')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->get();

        $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

        $todayCode = $code->todayGame()->where('VIPCategory', 'free')->first();
        $tomorrowCode = $code->today1Game()->where('VIPCategory', 'free')->first();

        $inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
            ->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
                $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
            })
            ->orderBy('gameDate', 'ASC')->take(20)->get();
//die(var_dump($todayCode));
        //        $testimonials = $prediction->where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->take(15)->orderBy('updated_at', 'DESC')->get();
        //        $sponsors = $sponsor->where('publishStatus', '0')->latest('id')->get();
        return view('seo.forebet', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'silver', 'gold', 'investment', 'todayCode', 'tomorrowCode'));
    }

    public function getTips180(Prediction $prediction, Sponsor $sponsor, Subscription $subscription, sms_subscriptions $sms, BookingCode $code)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $silver = $subscription->where('category', 'Silver Plan')->get();
        $gold = $subscription->where('category', 'Gold Plan')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->get();

        $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

        $todayCode = $code->todayGame()->where('VIPCategory', 'free')->first();
        $tomorrowCode = $code->today1Game()->where('VIPCategory', 'free')->first();

        $inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
            ->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
                $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
            })
            ->orderBy('gameDate', 'ASC')->take(20)->get();
//die(var_dump($todayCode));
        //        $testimonials = $prediction->where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->take(15)->orderBy('updated_at', 'DESC')->get();
        //        $sponsors = $sponsor->where('publishStatus', '0')->latest('id')->get();
        return view('seo.tips180', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'silver', 'gold', 'investment', 'todayCode', 'tomorrowCode'));
    }

    public function getStatarea(Prediction $prediction, Sponsor $sponsor, Subscription $subscription, sms_subscriptions $sms, BookingCode $code)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $silver = $subscription->where('category', 'Silver Plan')->get();
        $gold = $subscription->where('category', 'Gold Plan')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->get();

        $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

        $todayCode = $code->todayGame()->where('VIPCategory', 'free')->first();
        $tomorrowCode = $code->today1Game()->where('VIPCategory', 'free')->first();

        $inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
            ->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
                $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
            })
            ->orderBy('gameDate', 'ASC')->take(20)->get();
//die(var_dump($todayCode));
        //        $testimonials = $prediction->where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->take(15)->orderBy('updated_at', 'DESC')->get();
        //        $sponsors = $sponsor->where('publishStatus', '0')->latest('id')->get();
        return view('seo.statarea', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'silver', 'gold', 'investment', 'todayCode', 'tomorrowCode'));
    }

    public function getSoccerPrediction(Prediction $prediction, Sponsor $sponsor, Subscription $subscription, sms_subscriptions $sms, BookingCode $code)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $silver = $subscription->where('category', 'Silver Plan')->get();
        $gold = $subscription->where('category', 'Gold Plan')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->get();

        $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

        $todayCode = $code->todayGame()->where('VIPCategory', 'free')->first();
        $tomorrowCode = $code->today1Game()->where('VIPCategory', 'free')->first();

        $inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
            ->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
                $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
            })
            ->orderBy('gameDate', 'ASC')->take(20)->get();
//die(var_dump($todayCode));
        //        $testimonials = $prediction->where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->take(15)->orderBy('updated_at', 'DESC')->get();
        //        $sponsors = $sponsor->where('publishStatus', '0')->latest('id')->get();
        return view('seo.soccer-prediction', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'silver', 'gold', 'investment', 'todayCode', 'tomorrowCode'));
    }

    public function getPronostic(Prediction $prediction, Sponsor $sponsor, Subscription $subscription, sms_subscriptions $sms, BookingCode $code)
    {
        $tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
        $nextt = Carbon::today()->addDays(2)->format('d-m-Y');
        $nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
        $nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

        $silver = $subscription->where('category', 'Silver Plan')->get();
        $gold = $subscription->where('category', 'Gold Plan')->get();
        $investment = $subscription->where('category', 'Super Investment Tip')->get();

        $freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();

        $todayCode = $code->todayGame()->where('VIPCategory', 'free')->first();
        $tomorrowCode = $code->today1Game()->where('VIPCategory', 'free')->first();

        $inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
            ->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
                $query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
            })
            ->orderBy('gameDate', 'ASC')->take(20)->get();
//die(var_dump($todayCode));
        //        $testimonials = $prediction->where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->take(15)->orderBy('updated_at', 'DESC')->get();
        //        $sponsors = $sponsor->where('publishStatus', '0')->latest('id')->get();
        return view('seo.pronostic', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'silver', 'gold', 'investment', 'todayCode', 'tomorrowCode'));
    }
    public function Getcyberbet()
    {
        return view('cyber');
    }

    public function getJackpot($country = null, Subscription $subscription)
    {
        $jackpot = $subscription->where('category', 'Jackpot')->where('status', '0')->get();
        return view('jackpot', compact('jackpot'));
    }
}
