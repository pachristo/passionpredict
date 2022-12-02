<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use App\User;
use App\Sms_subscription;
use App\ResponseFacade;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
// use Validator;
use App\sms_recovery;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\EmailValidator;
use Illuminate\Support\Facades\Mail;
class SMScontroller extends Controller
{
    //

    public function allsms(){
    	$sms=Sms_subscription::all();
    	return view('sms.sms_all',compact('sms'));
    }

    public function smsmembers(Request $request,User $user)
    {

    	$request=$request->all();
    	//die(var_dump($request));
    	$user_types=$request['user_types'];
    	$user_plans=$request['user_plans'];
    	$country_code=$request['country_code'];
    


    	$user =	$user->where(function($query_country) use ($country_code){
    				if($country_code!='all'){
    					return $query_country->where('country_code','=',$country_code);
    				}else{
    					return $query_country->where('country_code','!=','');
    				}
					})
    			->where(function($sub) use ($user_plans){
    				if($user_plans!='all'){
    					return $sub->where('sms_subs_id','=',$user_plans);
    				}else{
    					return $sub->where('sms_subs_id','!=','');
    				}
    			})
    			->where(function($query) use ($user_types){
    				if($user_types=='active'){
    					return $query->where('sms_due_date','>',date('Y-m-d H:i:s'));
    				}elseif ($user_types=='expired') {
    					# code...
    					return $query->where('sms_due_date','<',date('Y-m-d H:i:s'));
    				}else{
    					return $query->where('sms_due_date','<>',date('Y-m-d H:i:s'));
    				}
    			})
    			
    			
    			->where('phone_status','1')
    			
    			->where('sms_status','1')
    			->get();


    			$a=0;
    			$numbers='';
    			foreach($user as $value)
    			{            

    			if ($a==0) {
    				$numbers='+'.$value->country_code.substr($value->phone,1);
    				
    			}else{
                  $numbers=$numbers.','.'+'.$value->country_code.substr($value->phone,1);
    			}
               $a++;
         
    			}
    			 return $numbers;
    			//return response($numbers,200)->header('Content-Type','text/plain');


    			//ResponseFacade::validationMessage($numbers)



    	



    }





         public function sendSms( Request $request )
    {
       // Your Account SID and Auth Token from twilio.com/console
       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_AUTH_TOKEN' );
       $client = new Client( $sid, $token );

       $validator = Validator::make($request->all(), [
           'numbers' => 'required',
           'message' => 'required'
       ]);

       if ( $validator->passes() ) {
       	$request=$request->all();
           $numbers_in_arrays = explode( ',' , $request['numbers' ] );

           $message = $request[ 'message' ];
           $count = 0;
           $data='';
           $dead=0;

           foreach( $numbers_in_arrays as $number )
           {
           	   try {

               	$client->messages->create(
                   $number,
                   [
                       'from' => env( 'TWILIO_NUMBER' ),
                       'body' => $message,
                   ]
               );
               		$count++;
               } catch (\Exception $e) {
               	$data=$data.','.$number;
               	$dead++;
               }
           }

           return  $count . " messages sent!,".$dead."  failed messeges" ;
              
       } else {
           return 'error';
       }
   }




   public function getSmsMembers(){


   	    $user = User::latest('created_at')->paginate(200);
        return view('sms.members', ['members' => $user, 'title'=>'All SMS Members']);

   }


   public function getExpiredSmsMembers(){


   	    $user = User::latest('created_at')
                ->where('sms_status','1')
   	    				->where('sms_subscription_status',null)
   	    				
   	    				->paginate(200);
        return view('sms.sms_user_pan', ['members' => $user, 'title'=>'Expired SMS Members']);

   }

   public function getActiveSmsMembers(){


   	    $user = User::latest('created_at')
                ->where('sms_status','1')
   	    				->where('sms_subscription_status','1')
   	    				
   	    				->paginate(200);
        return view('sms.sms_user_pan', ['members' => $user, 'title'=>'Active SMS Members']);

   }


   public function smsajaxUserInfo($uid,User $user){

   	     $user = $user->where('id', $uid)->first();

   	     $message_sub=$user->message_sub($user->sms_subs_id);

        return view('ajaxfiles.smsuserinfo', ['user' => $user,'message_sub'=>$message_sub]);

   }
       public function upgradeAccount($uid, User $user)
    {
        $user = $user->where('id',$uid)->first();
        //
        $subs = Sms_subscription::all();
        //die(print_r($subs));
        return view('ajaxfiles.smsupgrade', ['user' => $user, 'subs'=>$subs]);
    }
    public function accountUpgrade(Request $request, User $user, Sms_subscription $plan ,sms_recovery $recovery)
    {
    	//$request=$request->all();
        $id = trim($request['userid']);
        $datesub = trim($request['datesub']);
        $sub = $plan->where('id',$request['type'])->first();

        $user = $user->userSelect($id);

        if ($user->subscription_status=='1') {
            $next = strtotime('+'.$sub->accessTime, strtotime($user->sms_due_date));
        } else {
            $next = strtotime('+'.$sub->accessTime, strtotime($datesub));
        }
        $nextDue = date("Y-m-d H:i:s", $next);

        $user->sms_subs_id = $sub->id;
        $user->sms_subscription_status ='1';
        $user->sms_status = '1';
        $user->sms_subscribed_date = $datesub;
        $user->sms_due_date = $nextDue;
        $user->save();

        $recovery->create(['user_id'=>$user->id, 'sub_id'=>$sub->id, 'date_subscribed'=>date('Y-m-d H:i:s'), 'due_date'=>$nextDue]);
//        $user->update(['subscription_type'=>$sub->planName, 'subscription_status'=>'1', 'date_subscribed'=>$datesub, 'next_due_date'=>$nextDue]);

        //$user->increment('sub_count');

        $email = filter_var($user->email, FILTER_SANITIZE_EMAIL);

        try {

		        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		            if (EmailValidator::validator($email))
		            {
		                $name = $user->full_name;

		                Mail::send('mailtemplate.SmsActivation', ['name' => $name, 'sub' => $sub], function ($message) use ($email) {
		                    $message->to($email, 'JOEODDS')
		                        ->subject('YOUR SMS PLAN HAS BEEN ACTIVATED');
		                });
		            }
		        }        	
        } catch (\Exception $e) {
        	
        }



        ResponseFacade::validationMessage('USER ACCOUNT UPGRADED', '2');
    }



    public function ajaxUserUpdate($uid)
    {
    	// usersettings
        $user = User::where('id', $uid)->first();
        return view('ajaxfiles.addphonenumber', ['user' => $user]);
    }


    public function ajaxUserInfoUpdate(Request $request)
    {   $request=$request->all();
        $id = trim($request['userid']);
        $phone = trim($request['phone']);
        $country_code = trim($request['country_code']);
        $name = trim($request['name']);

        User::where('id', $id)
            ->update(['phone' => $phone, 'phone_status' => '1', 'country_code' => $country_code]);

              // Your Account SID and Auth Token from twilio.com/console
	       $sid    = env( 'TWILIO_SID' );
	       $token  = env( 'TWILIO_AUTH_TOKEN' );
	       $client = new Client( $sid, $token );


           	   try {

               	$client->messages->create(
                   $country_code.substr($phone,1),
                   [
                       'from' => env( 'TWILIO_NUMBER' ),
                       'body' => 'Hello '
                       			.$name.',We are glad to inform you 
                       			that your Phone Number 
                       			has been Activated..
                       			
                       			Thanks

                       			JOEODDS.COM

                       ',
                   ]
               );
               		//$count++;
               } catch (\Exception $e) {
               	//$data=$data.','.$number;
               	//$dead++;
               }
           

        ResponseFacade::validationMessage('USER DETAILS UPDATED', '2');
    }

    public function getDeactivate($id=null, User $user,Sms_subscription $subscription,sms_recovery $recovery)
    {
        $mem = $user->find($id);
        if ($mem->sms_status=='1')
        {
            // $user->where('id', $id)->update(['subscription_status'=>'0']);
            // $user->where('id', $id)->decrement('sub_count');
            $ids=$recovery->select('id')->where('user_id',$mem->id)->orderBy('id','ASC')->get();

            $array=[];

            foreach ( $ids as $val){
            	array_push($array, $val->id);

            }

            $length=count($array);
            if($length>1)
            {
	            $pop_last=$recovery->where('id',$array[$length-1])->delete();
	            $update=$recovery->where('id',$array[$length-2])->first(); 
	            $user->where('id',$id)->update(['sms_subs_id'=>$update->sub_id,'sms_subscribed_date'=>$update->date_subscribed,'sms_due_date'=>$update->due_date]);
            }else{

            	$user->where('id',$id)->update(['sms_subs_id'=>NULL,'sms_subscribed_date'=>NULL,'sms_due_date'=>NULL,'sms_status'=>NULL,'sms_subscription_status'=>NULL]);
            }

           
          





            echo "Ok";
        }
    }


    public function postSearchMember(Request $request)
    {
            $term = trim($request['term']);

            if ($term)
            {
                $users = User::where( function($query) use ($term)
                {
                    $query->where('id', $term)->orWhere('full_name', 'like', '%'.$term.'%')->orWhere('email', $term)->orWhere('username', 'like', '%'.$term.'%')->orWhere('country', $term);
                })->paginate(200);

                return view('sms.members', ['members'=>$users, 'title'=>'All Members']);
            }
    }

        public function getSearchMember()
    {
        $user = User::latest('created_at')->paginate(200);
        return view('sms.members', ['members' => $user, 'title'=>'All Members']);
    }



    public function planManager()
    {
        $data = Sms_subscription::all();
        return view('sms.PlanManager', ['data'=>$data]);
    }

     public function addsmsplans(Request $request,Sms_subscription $subscription)
    {
        
        $do=$subscription->create($request->all());

        ResponseFacade::validationMessage('', '2');
    }

      public function deleteplan($id,Sms_subscription $subscription)
    {
        //$request=$request->all();
        $do=$subscription->where('id',$id)->delete();

        ResponseFacade::validationMessage('', '2');
    }

    public function planUpdater(Request $request)
    {
        $id = trim($request['id']);
        $plan = trim($request['plan']);
        $accessTime = trim($request['accessTime']);
        $keshPrice = trim($request['keshPrice']);
        $nairaPrice = trim($request['nairaPrice']);
        $dollarPrice = trim($request['dollarPrice']);
        $ugxPrice = trim($request['ugxPrice']);
        $tzsPrice = trim($request['tzsPrice']);
        $cedPrice = trim($request['cedPrice']);
        $zarPrice = trim($request['zarPrice']);
        $zmwPrice = trim($request['zmwPrice']);
        $planBenefits=$request['planBenefits'];

            Sms_subscription::where('id', $id)
                    ->update(['planName' => $plan, 'accessTime' => $accessTime, 'nairaPrice'=>$nairaPrice, 'keshPrice'=>$keshPrice, 'dollarPrice'=>$dollarPrice, 'ugxPrice'=>$ugxPrice, 'tzsPrice'=>$tzsPrice, 'cedPrice'=>$cedPrice,'zarPrice'=>$zarPrice,'zmwPrice'=>$zmwPrice,'planBenefits'=>$planBenefits]);

                $error = "SUBSCRIPTION UPDATED";
                $status = 2;
                echo json_encode(array('encounters' => $error, 'status' => $status), JSON_PRETTY_PRINT);
    }


}
