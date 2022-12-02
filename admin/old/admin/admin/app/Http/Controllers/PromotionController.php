<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\ResponseFacade;
use App\ValidationMessage;
use Illuminate\Http\Request;

use App\Http\Requests;

class PromotionController extends Controller
{
    public function getPromotion(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $title = trim($request['title']);
            $details = trim($request['details']);
            $publishOn = trim($request['publishOn']);
            $publishStatus = trim($request['publishStatus']);
            $accessible = trim($request['accessible']);

            if ($title==NULL || $details==NULL || $publishOn==NULL || $publishStatus==NULL || $accessible==NULL)
            {
                ResponseFacade::validationMessage('All fields are required', '1');
            }
            else{
                $publishOn = date('Y-m-d H:i:s', strtotime($publishOn));
                $promotion = new Promotion();

                if (isset($request['id']))
                {
                    $id = $request['id'];
                    Promotion::where('id', $id)->update(['title'=>$title, 'details'=>$details, 'publishOn'=>$publishOn, 'publishStatus'=>$publishStatus, 'accessible'=>$accessible]);
                }
                else{
                    $promotion->title = $title;
                    $promotion->details = $details;
                    $promotion->publishOn = $publishOn;
                    $promotion->publishStatus = $publishStatus;
                    $promotion->accessible = $accessible;
                    $promotion->save();
                }

                ResponseFacade::validationMessage('Ok', '0');
            }
        }
        else{
            $promotions = Promotion::get();
            return view('promotions', ['promotions'=>$promotions]);
        }
    }

    public function editPromotion($id)
    {
        $prom = Promotion::find($id);
        return view('ajaxfiles.promotion', ['prom'=>$prom, 'edit'=>1]);
    }

    public function viewProm($id)
    {
        $prom = Promotion::find($id);
        return view('ajaxfiles.promotion', ['prom'=>$prom]);
    }

    public function trashPromotion($id)
    {
        Promotion::find($id)->delete();
        echo 'Ok';
    }
}
