<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\JSONResponder;
use Twilio\Rest\Client;
use App\Solos\Modules\User\Model\User;
use Authy\AuthyApi;
use App\sms_subscriptions;
class SMScontroller extends Controller
{
    //
   protected $authy;
   protected $sid;
   protected $authToken;
   protected $twilioFrom;


  public function __construct() {
      // Initialize the Authy API and the Twilio Client
      $this->authy = new AuthyApi(env('AUTHY_API_KEY'));
      // Twilio credentials
      $this->sid = env('TWILIO_ACCOUNT_SID');
      $this->authToken = env('TWILIO_AUTH_TOKEN');
      $this->twilioFrom = env('TWILIO_PHONE');
  }



    public function GetActivation()
    {
    	if(currentUser()->sms_status==''){
    		session()->flash('warning','Please You are not eligible to Use the Phone Number Activation page, Please Choose an SMS package plans to continue. Thanks');
    	return redirect()->route('/pricing');
    }else{


    	return view('sms.sms_activation');
    }
    	

    }

    public function GetVerify()
    {


    	 if(currentUser()->sms_status!=''){

    	 	if(!empty(currentUser()->phone)&& !empty(currentUser()->country_code)){

    			return view('sms.sms_verify');
    	 	}else{
    	 		return  redirect()->route('/SmsActivation');
    	 	}

    		}else{
    			return  redirect()->route('/SmsActivation');
    		}
    	
    
    }

    public function GetHome()
    {
    	// die(print_r(currentUser()->message_sub()));
    	// $sms_details=[];
     //    if(currentUser()->sms_subs_id!='')
     //    {
     //    	$sms_details=currentUser()->
     //    }

    	return view('sms.sms_home');
    }


    public function postVerify(Request $request)
    {
    	//die(print_r($request->all()));
    	$validator=Validator::make($request->all(),[

    		'country_code'=>'required',
    		'tel'=>'required|max:11'




    	],
    	[
    		'tel.required'=>'Your Phone Number is required',
    		'tel.max'=>'Your Phone Number should not be more than 11 characters'


    	]
    );



    	if($validator->fails())
    	{
    	
        JSONResponder::validationMessage('wrong details! Please follow the guidelines below the page');
        // $activate = Activation::where('user_id', $user->id)->first();
        // $mailer->to($request['email'])->send(new ConfirmEmail($user, $activate));
        // JSONResponder::validationMessage('Ok', '0');
    		 	
    	}else{

    		$request=$request->all();
		      $response = $this->authy->phoneVerificationStart($request['tel'], $request['country_code'], 'sms');

		      
		     
		      if ($response->ok()) {
		      		$user_update=User::where('id',currentUser()->id)->update(['phone'=>$request['tel'],'country_code'=>$request['country_code']]);
		      		if($user_update){
		      			 JSONResponder::validationMessage('Ok', '0');
		      		}else{
		      			JSONResponder::validationMessage('Some thing Went Wrong, Please Try Again');

		      		}
		          
		      } else  {
		          JSONResponder::validationMessage('Something Went Wrong with your Number, Please follow guidelines below the page');
		      }

    	}
    }

    // public function verifyee(Request )
    
		  public function verifyCode(Request $request) {
		      // Call the method responsible for checking the verification code sent.
		  	$request=$request->all();
		  	try {
		  		 $response = $this->authy->phoneVerificationCheck($request['tel'], $request['country_code'], $request['code']);
		  	} catch (Exception $e) {
		  		JSONResponder::validationMessage('SOMETHING WENT WRONG,TRY AGAIN');
		  	}
		     
		      if($response->ok()) {
		         
		      	$phone_enable=User::where('id',currentUser()->id)->update(['phone_status'=>'1']);
		         JSONResponder::validationMessage('Ok', '0');

		      } else {
		          JSONResponder::validationMessage('INVALID CODE');
		      }
		  }


	 public function getPricing(sms_subscriptions $sms) {
//        if (!currentUser() && $country==null) return redirect('/select_country');
        // return redirect('/');
        $sms=$sms->all();
        
        return view('sms.sms_phone', compact('sms'));
    }
}
