<?php

namespace App\Http\Controllers;

use App\Archive;
use App\BookingCode;
use App\League;
use App\Prediction;
use App\ResponseFacade;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PredictionController extends Controller
{

    public function getNewPrediction(League $league)
    {
        $allLeagues = $league->getLeagues();
        return view('newgame', compact('allLeagues'));
    }

    public function getNewBookingCode()
    {
        return view('newBookingCode');
    }

    public function getNewVIPPrediction(League $league)
    {
        $allLeagues = $league->getLeagues();
        return view('newVIPgame', compact('allLeagues'));
    }

    public function getPredictions()
    {
        $category = Auth::user()->category;
        $id = Auth::user()->id;

        if($category=='Super'){
                 $predict = Prediction::where('gameType','0')
             //   ->whereTennis('')
              //  ->whereBasketball('')
              //  ->whereHandball('')
              //  ->whereIceHockey('')
                ->latest('created_at')
                ->paginate(200);
        }
        else {
            $predict = Prediction::where('gameType','0')
                // ->whereTennis('')
                // ->whereBasketball('')
                // ->whereHandball('')
                // ->whereIceHockey('')
                ->latest('created_at')->paginate(200);
        }
        return view('/predictions', ['allprediction' => $predict, 'rel'=>'Football']);
    }

    public function getTennis()
    {
        $category = Auth::user()->category;
        $id = Auth::user()->id;

        if($category=='Super'){
           $predict = Prediction::where('gameType','0')
                ->where('tennis', '!=', '')
                ->latest('created_at')
                ->paginate(200);
        }
        else {
                $predict = Prediction::where('gameType','0')
                ->where('tennis', '!=', '')
                ->latest('created_at')->paginate(200);
        }
        return view('/predictions', ['allprediction' => $predict, 'rel'=>'Tennis']);
    }

    public function getBasketball()
    {
        $category = Auth::user()->category;
        $id = Auth::user()->id;

        if($category=='Super'){
              $predict = Prediction::where('gameType','0')
                ->where('basketball', '!=', '')
                ->latest('created_at')
                ->paginate(200);
        }
        else {
           $predict = Prediction::where('gameType','0')
                ->where('basketball', '!=', '')
                ->latest('created_at')->paginate(200);
        }
        return view('/predictions', ['allprediction' => $predict, 'rel'=>'Basketball']);
    }

    public function getHandball()
    {
        $category = Auth::user()->category;
        $id = Auth::user()->id;

        if($category=='Super'){
                $predict = Prediction::where('gameType','0')
                ->where('handball', '!=', '')
                ->latest('created_at')
                ->paginate(200);
        }
        else {
                $predict = Prediction::where('gameType','0')
                ->where('handball', '!=', '')
                ->latest('created_at')->paginate(200);
        }
        return view('/predictions', ['allprediction' => $predict, 'rel'=>'Handball']);
    }

    public function getIceHockey()
    {
        $category = Auth::user()->category;
        $id = Auth::user()->id;

        if($category=='Super'){
              $predict = Prediction::where('gameType','0')
                ->where('ice_hockey', '!=', '')
                ->latest('created_at')
                ->paginate(200);
        }
        else {
                $predict = Prediction::where('gameType','0')
                ->where('ice_hockey', '!=', '')
                ->latest('created_at')->paginate(200);
        }
        return view('/predictions', ['allprediction' => $predict, 'rel'=>'Ice Hockey']);
    }

    public function getVIPPredictions($key=null)
    {
        $allprediction = Prediction::where('gameType',1)->latest('created_at')->paginate(200);
//        $theDates = Prediction::where('gameType',1)->where($key, 'Yes')->latest('gameDate')->distinct()->get(['gameDate']);

        return view('/VIPpredictions', compact('allprediction'));
    }

    public function getBookingCode($key=null)
    {
        $theDates = BookingCode::latest('codeDate')->distinct()->get(['codeDate']);
//        dd($theDates);
        return view('/bookingCode', compact('theDates'));
    }

    public function ajaxGameUpdate($gid, $datain)
    {
        if($datain=='Prediction')
        {
            $game = Prediction::where('id', $gid)->first();
            return view('ajaxfiles.settings', ['game' => $game, 'datain'=>$datain]);
        }
        else{
            $game = Archive::where('id', $gid)->first();
            return view('ajaxfiles.settings', ['game' => $game, 'datain'=>$datain]);
        }
    }

    public function ajaxVIPGameUpdate($gid, $datain)
    {
        if($datain=='Prediction')
        {
            $game = Prediction::where('id', $gid)->first();
            return view('ajaxfiles.settingVIP', ['game' => $game, 'datain'=>$datain]);
        }
        else{
            $game = Archive::where('id', $gid)->first();
            return view('ajaxfiles.settingVIP', ['game' => $game, 'datain'=>$datain]);
        }
    }

    public function ajaxGameDetail($gamecode, $datain)
    {
        if($datain=='Prediction'){
            $game = Prediction::where('id', $gamecode)->first();
        }
        else{
            $game = Archive::where('id', $gamecode)->first();
        }
        return view('ajaxfiles.gamedetail', ['game' => $game]);
    }

    public function archives()
    {
        $category = Auth::user()->category;
        $id = Auth::user()->id;

        if($category=='Super'){
            $predict = Archive::orderBy('id', 'DESC')->paginate(200);
            return view('/archive', ['allprediction' => $predict]);
        }
        else {
            $predict = Archive::orderBy('id', 'DESC')->paginate(200);
            return view('/archive', ['allprediction' => $predict]);
        }
    }

    public function allTestimonials()
    {
        $testi = Prediction::where('testimonial', '1')->latest('created_at')->paginate(400);
        return view('/testimonials', ['alltestimonials' => $testi]);
    }

    public function postNewPrediction(Request $request, Prediction $prediction)
    {
        $data = $request->except('_token');
        $validate = Validator::make($data, [
            'teamOne' => 'string|required',
            'gameDate' => 'string|required',
            'gameTime' => 'string|required',
            'teamTwo' => 'string|required',
            'league' => 'string|required',
        ]);
        if ($validate->fails()) ResponseFacade::validationMessage('All * Fields are required');
//        $prediction->validateInput($request);

        $prediction->checkValidate($request);
        $game = \Arr::add($data, 'creator', Auth::user()->id);
        $prediction->create($game);

        ResponseFacade::validationMessage('Ok', '0');
    }

    public function postNewBookingCode(Request $request, BookingCode $code)
    {
        $data = $request->except('_token');
        $validate = Validator::make($data, [
            'codeDate' => 'string|required',
            'codeTime' => 'string|required',
            'VIPCategory' => 'string|required',
            'bookMaker' => 'string|required',
            'bookingCode' => 'string|required'

        ]);
        if ($validate->fails()) ResponseFacade::validationMessage('All * Fields are required');

        $check = $code->where('codeDate', $data['codeDate'])->where('VIPCategory', $data['VIPCategory'])->where('bookingCode', $data['bookingCode'])->where('codeTime', $data['codeTime'])->first();
        if (isset($check)) {ResponseFacade::validationMessage('CODE ALREADY ADDED FOR THIS CATEGORY'); }

        $create=$code->create($data);

        if ($create) {
            # code...
            ResponseFacade::validationMessage('Ok', '0');
        }

    }

    public function postGameUpdate(Request $request, $id, $dataIn, Prediction $prediction, Archive $archive)
    {
        $data = $request->except('_token');
        $prediction->validateInput($request);
        $prediction->checkValidateUpdate($request, $id);

        if($dataIn=='Prediction')
        {
            $prediction->where('id', $id)->update($data);
        }
        else{
            $archive->where('id', $id)->update($data);
        }
        ResponseFacade::validationMessage('PREDICTION UPDATED SUCCESSFULLY', '0');
    }

    public function postVIPGameUpdate(Request $request, $id, $dataIn, Prediction $prediction, Archive $archive)
    {
        $data = $request->except('_token');

        $prediction->validateInput($request);
        $prediction->checkValidateUpdate($request, $id);

        if($dataIn=='Prediction')
        {
            $prediction->where('id', $id)->update($data);
        }
        else{
            $archive->where('id', $id)->update($data);
        }
        ResponseFacade::validationMessage('VIP PREDICTION UPDATED SUCCESSFULLY', '0');
    }

    public function archiveGame(Request $request, $id, Archive $archive)
    {
        return $archive->archiveGames($request, $id);
    }

    public function unarchiveGame($id, Prediction $prediction)
    {
        return $prediction->unarchiveGames($id);
    }

    public function ajaxAddResult($id, Prediction $prediction)
    {
        $game = $prediction->getPrediction($id);
        return view('ajaxfiles.addresult', ['game' => $game]);
    }

    public function postAddResult(Request $request, Prediction $prediction)
    {
        $prediction->addResult($request->all());
        ResponseFacade::validationMessage('OPERATION SUCCESSFUL', '0');
    }

    public function ajaxTestimonial(Request $request, Prediction $prediction)
    {
        $id = trim($request['id']);
        $value = trim($request['potential']);
        $inv = trim($request['investment']);

        $prediction->find($id)
            ->update(['testimonial' => '1', 'testimonialValue' => $value, 'moreOption'=>$inv]);

        ResponseFacade::validationMessage('GAME MARKED SUCCESSFULLY', '0');
    }

    public function ajaxGameDelete($id, $finder)
    {
        if($finder=='Prediction')
        {
            Prediction::destroy($id);
        }
        else{
            Archive::destroy($id);
        }
        echo 'Ok';
    }

    public function getTrashBookingCode($id)
    {
        BookingCode::destroy($id);
        echo 'Ok';
    }
}
