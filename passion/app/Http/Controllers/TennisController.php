<?php

namespace App\Http\Controllers;

use App\Solos\Modules\Prediction\Model\Prediction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TennisController extends Controller
{
    public function getIndex(Prediction $prediction){
        $yy = $prediction->yesterdayGame()->where('tennis', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
        $tt = $prediction->todayGame()->where('tennis', '!=', '')->orderBy('id', 'DESC')->take(40)->get();
        $tm = $prediction->today1Game()->where('tennis', '!=', '')->orderBy('id', 'DESC')->take(40)->get();

        return view('tennis.index', compact('yy','tt', 'tm'));
    }
}
