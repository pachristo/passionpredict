<?php

namespace App\Http\Controllers;

use App\Solos\Modules\Prediction\Model\Prediction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BasketBallController extends Controller
{
    public function getIndex(Prediction $prediction){
        $yy = $prediction->yesterdayGame()->where('basketball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
        $tt = $prediction->todayGame()->where('basketball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
        $tm = $prediction->today1Game()->where('basketball', '!=', '')->orderBy('id', 'DESC')->take(40)->get();

        return view('basketball.index', compact('yy','tt', 'tm'));
    }
}
