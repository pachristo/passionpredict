<?php

namespace App\Http\Controllers;

use App\Solos\Modules\BookingCode\Model\BookingCode;
use App\Solos\Modules\Prediction\Model\Prediction;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    public $prediction;
    public $code;

    public function __construct(Prediction $prediction, BookingCode $code)
    {
        $this->prediction = $prediction;
        $this->code = $code;
    }

    public function getArchive(Prediction $prediction){
        $testimonials = $prediction->where('display', '0')
            ->where('superInvestment', NULL)
            ->where('testimonial', '1')
            ->where('testimonialValue', '!=', '')
            ->whereTennis('')
            ->whereBasketball('')
            ->whereHandball('')
            ->whereIceHockey('')
            ->orderBy('updated_at', 'DESC')->paginate(30);
        $noMeta = true;
        return view('archive', compact('testimonials', 'noMeta'));
    }

    public function getDoubleChance()
    {
//        $yy1 = $this->prediction->yesterday1Game()->where('doubleChance', '!=', '')->get();
        $yy = $this->prediction->yesterdayGame()->where('doubleChance', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('doubleChance', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('doubleChance', '!=', '')->get();
//        $tm1 = $this->prediction->today2Game()->where('doubleChance', '!=', '')->get();

        $title = 'Double Chance';
        $keys = 'dc';
        return view('stores.double_chance', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getOver15()
    {
        $yy = $this->prediction->yesterdayGame()->where('oneFiveGoals', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('oneFiveGoals', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('oneFiveGoals', '!=', '')->get();

        $title = 'Over 1.5 Goals';
        $keys = 'ov15';
        return view('stores.over_1_5', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getOver05()
    {
        $yy = $this->prediction->yesterdayGame()->where('overZeroFiveHT', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('overZeroFiveHT', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('overZeroFiveHT', '!=', '')->get();

        $title = '0.5 Goals HT';
        $keys = '05ht';
        return view('stores.zerofive', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }
    public function getOver35()
    {
        $yy = $this->prediction->yesterdayGame()->where('threeFiveGoals', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('threeFiveGoals', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('threeFiveGoals', '!=', '')->get();

        $title = '3.5 Goals ';
        $keys = '35g';
        return view('stores.threefive', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getOver25()
    {
        $yy = $this->prediction->yesterdayGame()->where('twoFiveGoals', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('twoFiveGoals', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('twoFiveGoals', '!=', '')->get();

        $title = 'Over 2.5 Goals';
        $keys = 'ou25';
        return view('stores.over_2_5', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }


    public function getBigOdds()
    {
        $yy = $this->prediction->yesterdayGame()->where('BigOdds', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('BigOdds', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('BigOdds', '!=', '')->get();

        $title = 'Big Odds';
        $keys = 'big';
        return view('stores.bigodds', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getBTTS()
    {
        $yy = $this->prediction->yesterdayGame()->where('BTTS', '!=', 'No')->get();
        $tt = $this->prediction->todayGame()->where('BTTS', '!=', 'No')->get();
        $tm = $this->prediction->today1Game()->where('BTTS', '!=', 'No')->get();

        $title = 'BTTS/GG';
        $keys = 'btts';
        return view('stores.btts', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }


    public function getAweh()
    {
        $yy = $this->prediction->yesterdayGame()->where('weh', '==', 'AWEH')->get();
        $tt = $this->prediction->todayGame()->where('weh', '==', 'AWEH')->get();
        $tm = $this->prediction->today1Game()->where('weh', '==', 'AWEH')->get();

        $title = 'Win Either Half (AWEH)';
        $keys = 'aweh';
        return view('stores.aweh', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getHweh()
    {
        $yy = $this->prediction->yesterdayGame()->where('weh', '==', 'HWEH')->get();
        $tt = $this->prediction->todayGame()->where('weh', '==', 'HWEH')->get();
        $tm = $this->prediction->today1Game()->where('weh', '==', 'HWEH')->get();

        $title = 'Win Either Half (HWEH)';
        $keys = 'hweh';
        return view('stores.hweh', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getHwin()
    {
        $yy = $this->prediction->yesterdayGame()->where('hwin', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('hwin', '!=','')->get();
        $tm = $this->prediction->today1Game()->where('hwin', '!=', '')->get();

        $title = 'Home Win';
        $keys = 'hwin';
        return view('stores.hwin', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getOver05HT()
    {
        $yy = $this->prediction->yesterdayGame()->where('overZeroFiveHT', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('overZeroFiveHT', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('overZeroFiveHT', '!=', '')->get();

        $title = 'Over 0.5 HT';
        $keys = 'ou05HT';
        return view('stores.over_0_5', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getDNB()
    {
        $yy = $this->prediction->yesterdayGame()->where('drawNoBet', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('drawNoBet', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('drawNoBet', '!=', '')->get();

        $title = 'Draw No Bet';
        $keys = 'dnb';
        return view('stores.dnb', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getDraws()
    {
        $yy = $this->prediction->yesterdayGame()->where('draws', 'X')->get();
        $tt = $this->prediction->todayGame()->where('draws', 'X')->get();
        $tm = $this->prediction->today1Game()->where('draws', 'X')->get();

        $title = 'Draws';
        $keys = 'draws';
        return view('stores.draws', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getHandicap()
    {
        $yy = $this->prediction->yesterdayGame()->where('handicap', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('handicap', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('handicap', '!=', '')->get();

        $title = 'Handicap';
        $keys = 'hand';
        return view('stores.handicap', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

    public function getBanker()
    {
        $yy = $this->prediction->yesterdayGame()->where('bankerOfTheDay', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('bankerOfTheDay', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('bankerOfTheDay', '!=', '')->get();

        $title = 'Banker of The Day';
        $keys = 'banker';
        return view('stores.banker', compact('title', 'keys', 'yy', 'tt', 'tm'));
    }

//    vip

    public function getSureTwoOdds()
    {
        $yy = $this->prediction->yesterdayGame()->where('sure2Odds', 'one')->get();
        $tt = $this->prediction->todayGame()->where('sure2Odds', 'one')->get();
        $tm = $this->prediction->today1Game()->where('sure2Odds', 'one')->get();

        $yy2 = $this->prediction->yesterdayGame()->where('sure2Odds', 'two')->get();
        $tt2 = $this->prediction->todayGame()->where('sure2Odds', 'two')->get();
        $tm2 = $this->prediction->today1Game()->where('sure2Odds', 'two')->get();

        $cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'one')->first();
        $ct = $this->code->todayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'one')->first();
        $ctm = $this->code->today1Game()->where('VIPCategory', 'sure2')->where('codeTime', 'one')->first();

        $cy2 = $this->code->yesterdayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'two')->first();
        $ct2 = $this->code->todayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'two')->first();
        $ctm2 = $this->code->today1Game()->where('VIPCategory', 'sure2')->where('codeTime', 'two')->first();

        $title = 'Sure 2 - 3 Odds';
        $keys = 'sure2';
        return view('portal.store.index', compact('title', 'keys', 'yy', 'tt', 'tm', 'yy2', 'tt2', 'tm2', 'cy', 'ct', 'ctm', 'cy2', 'ct2', 'ctm2'));
    }
    public function getJackpot()
    {
        // `jackpot`, `jackpotTips`, `jackpotOdds`
        $yy = $this->prediction->yesterdayGame()->where('jackpot', 'one')->get();
        $tt = $this->prediction->todayGame()->where('jackpot', 'one')->get();
        $tm = $this->prediction->today1Game()->where('jackpot', 'one')->get();

        $yy2 = $this->prediction->yesterdayGame()->where('jackpot', 'two')->get();
        $tt2 = $this->prediction->todayGame()->where('jackpot', 'two')->get();
        $tm2 = $this->prediction->today1Game()->where('jackpot', 'two')->get();

        $cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'one')->first();
        $ct = $this->code->todayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'one')->first();
        $ctm = $this->code->today1Game()->where('VIPCategory', 'sure2')->where('codeTime', 'one')->first();

        $cy2 = $this->code->yesterdayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'two')->first();
        $ct2 = $this->code->todayGame()->where('VIPCategory', 'sure2')->where('codeTime', 'two')->first();
        $ctm2 = $this->code->today1Game()->where('VIPCategory', 'sure2')->where('codeTime', 'two')->first();

        $title = 'Jackpot Prediction';
        $keys = 'jackpot';
        return view('portal.store.index', compact('title', 'keys', 'yy', 'tt', 'tm', 'yy2', 'tt2', 'tm2', 'cy', 'ct', 'ctm', 'cy2', 'ct2', 'ctm2'));
    }

    public function getSureThreeOdds()
    {
        $yy = $this->prediction->yesterdayGame()->where('sure3Odds', 'one')->get();
        $tt = $this->prediction->todayGame()->where('sure3Odds', 'one')->get();
        $tm = $this->prediction->today1Game()->where('sure3Odds', 'one')->get();

        $yy2 = $this->prediction->yesterdayGame()->where('sure3Odds', 'two')->get();
        $tt2 = $this->prediction->todayGame()->where('sure3Odds', 'two')->get();
        $tm2 = $this->prediction->today1Game()->where('sure3Odds', 'two')->get();

        $cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure3')->where('codeTime', 'one')->first();
        $ct = $this->code->todayGame()->where('VIPCategory', 'sure3')->where('codeTime', 'one')->first();
        $ctm = $this->code->today1Game()->where('VIPCategory', 'sure3')->where('codeTime', 'one')->first();

        $cy2 = $this->code->yesterdayGame()->where('VIPCategory', 'sure3')->where('codeTime', 'two')->first();
        $ct2 = $this->code->todayGame()->where('VIPCategory', 'sure3')->where('codeTime', 'two')->first();
        $ctm2 = $this->code->today1Game()->where('VIPCategory', 'sure3')->where('codeTime', 'two')->first();

        $title = 'Sure 3 Odds';
        $keys = 'sure3';
        return view('portal.store.index', compact('title', 'keys', 'yy', 'tt', 'tm', 'yy2', 'tt2', 'tm2', 'cy', 'ct', 'ctm', 'cy2', 'ct2', 'ctm2'));
    }

    public function getOver35goals()
    {
        $yy = $this->prediction->yesterdayGame()->where('overThree', 'one')->get();
        $tt = $this->prediction->todayGame()->where('overThree', 'one')->get();
        $tm = $this->prediction->today1Game()->where('overThree', 'one')->get();

        $yy2 = $this->prediction->yesterdayGame()->where('overThree', 'two')->get();
        $tt2 = $this->prediction->todayGame()->where('overThree', 'two')->get();
        $tm2 = $this->prediction->today1Game()->where('overThree', 'two')->get();

        $cy = $this->code->yesterdayGame()->where('VIPCategory', 'over35')->where('codeTime', 'one')->first();
        $ct = $this->code->todayGame()->where('VIPCategory', 'over35')->where('codeTime', 'one')->first();
        $ctm = $this->code->today1Game()->where('VIPCategory', 'over35')->where('codeTime', 'one')->first();

        $cy2 = $this->code->yesterdayGame()->where('VIPCategory', 'over35')->where('codeTime', 'two')->first();
        $ct2 = $this->code->todayGame()->where('VIPCategory', 'over35')->where('codeTime', 'two')->first();
        $ctm2 = $this->code->today1Game()->where('VIPCategory', 'over35')->where('codeTime', 'two')->first();

        $title = 'Over 3.5 Goals';
        $keys = 'ov3';
        return view('portal.store.index', compact('title', 'keys', 'yy', 'tt', 'tm', 'yy2', 'tt2', 'tm2', 'cy', 'ct', 'ctm', 'cy2', 'ct2', 'ctm2'));
    }

    public function getSuperSingles()
    {
        $yy = $this->prediction->yesterdayGame()->where('superSingle', 'one')->get();
        $tt = $this->prediction->todayGame()->where('superSingle', 'one')->get();
        $tm = $this->prediction->today1Game()->where('superSingle', 'one')->get();

        $yy2 = $this->prediction->yesterdayGame()->where('superSingle', 'two')->get();
        $tt2 = $this->prediction->todayGame()->where('superSingle', 'two')->get();
        $tm2 = $this->prediction->today1Game()->where('superSingle', 'two')->get();

        $cy = $this->code->yesterdayGame()->where('VIPCategory', 'superSingle')->where('codeTime', 'one')->first();
        $ct = $this->code->todayGame()->where('VIPCategory', 'superSingle')->where('codeTime', 'one')->first();
        $ctm = $this->code->today1Game()->where('VIPCategory', 'superSingle')->where('codeTime', 'one')->first();

        $cy2 = $this->code->yesterdayGame()->where('VIPCategory', 'superSingle')->where('codeTime', 'two')->first();
        $ct2 = $this->code->todayGame()->where('VIPCategory', 'superSingle')->where('codeTime', 'two')->first();
        $ctm2 = $this->code->today1Game()->where('VIPCategory', 'superSingle')->where('codeTime', 'two')->first();

        $title = 'Super Singles';
        $keys = 'ssingles';
        return view('portal.store.index', compact('title', 'keys', 'yy', 'tt', 'tm', 'yy2', 'tt2', 'tm2', 'cy', 'ct', 'ctm', 'cy2', 'ct2', 'ctm2'));
    }

    public function getSureFiveOdds()
    {
        $yy = $this->prediction->yesterdayGame()->where('sure5Odds', 'one')->get();
        $tt = $this->prediction->todayGame()->where('sure5Odds', 'one')->get();
        $tm = $this->prediction->today1Game()->where('sure5Odds', 'one')->get();

        $yy2 = $this->prediction->yesterdayGame()->where('sure5Odds', 'two')->get();
        $tt2 = $this->prediction->todayGame()->where('sure5Odds', 'two')->get();
        $tm2 = $this->prediction->today1Game()->where('sure5Odds', 'two')->get();

        $cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure5')->where('codeTime', 'one')->first();
        $ct = $this->code->todayGame()->where('VIPCategory', 'sure5')->where('codeTime', 'one')->first();
        $ctm = $this->code->today1Game()->where('VIPCategory', 'sure5')->where('codeTime', 'one')->first();

        $cy2 = $this->code->yesterdayGame()->where('VIPCategory', 'sure5')->where('codeTime', 'two')->first();
        $ct2 = $this->code->todayGame()->where('VIPCategory', 'sure5')->where('codeTime', 'two')->first();
        $ctm2 = $this->code->today1Game()->where('VIPCategory', 'sure5')->where('codeTime', 'two')->first();

        $title = 'Sure 5+ Odds';
        $keys = 'sure5';
        return view('portal.store.index', compact('title', 'keys', 'yy', 'tt', 'tm', 'yy2', 'tt2', 'tm2', 'cy', 'ct', 'ctm', 'cy2', 'ct2', 'ctm2'));
    }

    public function getFiftyOdds()
    {
        $yy = $this->prediction->yesterdayGame()->where('fiftyPlus', 'one')->get();
        $tt = $this->prediction->todayGame()->where('fiftyPlus', 'one')->get();
        $tm = $this->prediction->today1Game()->where('fiftyPlus', 'one')->get();

        $yy2 = $this->prediction->yesterdayGame()->where('fiftyPlus', 'two')->get();
        $tt2 = $this->prediction->todayGame()->where('fiftyPlus', 'two')->get();
        $tm2 = $this->prediction->today1Game()->where('fiftyPlus', 'two')->get();

        $cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure50')->where('codeTime', 'one')->first();
        $ct = $this->code->todayGame()->where('VIPCategory', 'sure50')->where('codeTime', 'one')->first();
        $ctm = $this->code->today1Game()->where('VIPCategory', 'sure50')->where('codeTime', 'one')->first();

        $cy2 = $this->code->yesterdayGame()->where('VIPCategory', 'sure50')->where('codeTime', 'two')->first();
        $ct2 = $this->code->todayGame()->where('VIPCategory', 'sure50')->where('codeTime', 'two')->first();
        $ctm2 = $this->code->today1Game()->where('VIPCategory', 'sure50')->where('codeTime', 'two')->first();

        $title = '50+ Odds';
        $keys = 'fifty';
        return view('portal.store.index', compact('title', 'keys', 'yy', 'tt', 'tm', 'yy2', 'tt2', 'tm2', 'cy', 'ct', 'ctm', 'cy2', 'ct2', 'ctm2'));
    }

    public function getWeekendTips()
    {
        $yy = $this->prediction->yesterdayGame()->where('weekend', 'one')->get();
        $tt = $this->prediction->todayGame()->where('weekend', 'one')->get();
        $tm = $this->prediction->today1Game()->where('weekend', 'one')->get();

        $yy2 = $this->prediction->yesterdayGame()->where('weekend', 'two')->get();
        $tt2 = $this->prediction->todayGame()->where('weekend', 'two')->get();
        $tm2 = $this->prediction->today1Game()->where('weekend', 'two')->get();

        $cy = $this->code->yesterdayGame()->where('VIPCategory', 'weekend')->where('codeTime', 'one')->first();
        $ct = $this->code->todayGame()->where('VIPCategory', 'weekend')->where('codeTime', 'one')->first();
        $ctm = $this->code->today1Game()->where('VIPCategory', 'weekend')->where('codeTime', 'one')->first();

        $cy2 = $this->code->yesterdayGame()->where('VIPCategory', 'weekend')->where('codeTime', 'two')->first();
        $ct2 = $this->code->todayGame()->where('VIPCategory', 'weekend')->where('codeTime', 'two')->first();
        $ctm2 = $this->code->today1Game()->where('VIPCategory', 'weekend')->where('codeTime', 'two')->first();

        $title = 'Weekend Tips';
        $keys = 'wt';
        return view('portal.store.index', compact('title', 'keys', 'yy', 'tt', 'tm', 'yy2', 'tt2', 'tm2', 'cy', 'ct', 'ctm', 'cy2', 'ct2', 'ctm2'));
    }

    public function getHTFT()
    {
        $yy = $this->prediction->yesterdayGame()->where('HTFT', '!=', '')->get();
        $tt = $this->prediction->todayGame()->where('HTFT', '!=', '')->get();
        $tm = $this->prediction->today1Game()->where('HTFT', '!=', '')->get();

        $yy2 = [];
        $tt2 = [];
        $tm2 = [];

        $cy = $this->code->yesterdayGame()->where('VIPCategory', 'htft')->first();
        $ct = $this->code->todayGame()->where('VIPCategory', 'htft')->first();
        $ctm = $this->code->today1Game()->where('VIPCategory', 'htft')->first();

        $cy2 = null;
        $ct2 =  null;
        $ctm2 =  null;

        $title = 'HT/FT Tips';
        $keys = 'ht';
        return view('portal.store.index', compact('title', 'keys', 'yy', 'tt', 'tm', 'yy2', 'tt2', 'tm2', 'cy', 'ct', 'ctm', 'cy2', 'ct2', 'ctm2'));
    }

    public function getInvestmentTips()
    {
        $yy = $this->prediction->yesterdayGame()->where('superInvestment', 'Yes')->get();
        $tt = $this->prediction->todayGame()->where('superInvestment', 'Yes')->get();
        $tm = $this->prediction->today1Game()->where('superInvestment', 'Yes')->get();

        $cy = $this->code->yesterdayGame()->where('VIPCategory', 'investment')->first();
        $ct = $this->code->todayGame()->where('VIPCategory', 'investment')->first();
        $ctm = $this->code->today1Game()->where('VIPCategory', 'investment')->first();

        $title = 'Super Investment Tips';
        $keys = 'suInTip';
        return view('portal.store.super', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
    }
}
