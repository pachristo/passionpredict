<?php

namespace App\Http\Controllers;

use App\Solos\Modules\Prediction\Model\Prediction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HockeyController extends Controller
{
    public function getIndex(Prediction $prediction){

        $freeYesterday = $prediction->yesterdayGame()->where('ice_hockey', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('ice_hockey', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('ice_hockey', '!=', '')->orderBy('id', 'DESC')->take(40)->get();

        return view('hockey.index', compact('freeYesterday','freeToday', 'freeTomorrow'));
    }
}
