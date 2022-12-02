<?php

namespace App\Http\Controllers;

use App\Solos\Modules\Prediction\Model\Prediction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HandballController extends Controller
{
    public function getIndex(Prediction $prediction){
        $freeYesterday = $prediction->yesterdayGame()->where('handball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
        $freeToday = $prediction->todayGame()->where('handball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
        $freeTomorrow = $prediction->today1Game()->where('handball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();

        return view('handball.index', compact('freeYesterday','freeToday', 'freeTomorrow'));
    }
}
