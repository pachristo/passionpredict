<?php

namespace App\Http\Controllers;

use App\EmailValidator;
use App\ResponseFacade;
use App\Subscription;
use App\System;
use App\User;
use App\ValidationMessage;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function getDeactivate($id=null, User $user)
    {
        $mem = $user->find($id);
        if ($mem->subscription_status=='1')
        {
            $user->where('id', $id)->update(['subscription_status'=>'0']);
            $user->where('id', $id)->decrement('sub_count');
            echo "Ok";
        }
    }

    public function getNewMember(Subscription $subscription)
    {
        $subs = Subscription::where('status','0')->get();
        return view('/newMember', compact('subs'));
    }

    public function allUsers()
    {
        $user = User::latest('created_at')->paginate(200);
        return view('/members', ['members' => $user, 'title'=>'All Members']);
    }

    public function subscribedUsers()
    {
        $expiry = new User();
        $expiry->queryExpired();

        $silver = User::where('subscription_status', '1')
        ->where(function ($query)
        {
            $query->where('subscription_id', 1)->orWhere('subscription_id', 2);
        })
        ->orderBy('date_subscribed', 'DESC')->paginate(1000);

        $gold = User::where('subscription_status', '1')
            ->where(function ($query)
            {
                $query->where('subscription_id', 3)->orWhere('subscription_id', 4);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);

            $investment = User::where('subscription_status', '1')
            ->where(function ($query)
            {
                $query->where('subscription_id', 5)->orWhere('subscription_id', 6)->orWhere('subscription_id', 7);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);

            $jackpot = User::where('subscription_status', '1')
            ->where(function ($query)
            {
                $query->where('subscription_id', 8)->orWhere('subscription_id', 9);
            })
            ->orderBy('date_subscribed', 'DESC')->paginate(1000);

        return view('/activeSubscribers', compact( 'gold','investment','silver'));
    }

    public function expiredUsers()
    {
        $expiry = new User();
        $expiry->queryExpired();


        $gold = User::where('sub_count', '>', '0')
            ->where(function ($query)
            {
                $query->where('subscription_id', 3)->orWhere('subscription_id', 4);
            })
            ->where('subscription_status', '0')->orderBy('date_subscribed', 'DESC')->paginate(1000);


        $silver = User::where('sub_count', '>', '0')
        ->where(function ($query)
        {
            $query->where('subscription_id', 1)->orWhere('subscription_id', 2);
        })
        ->where('subscription_status', '0')->orderBy('date_subscribed', 'DESC')->paginate(1000);
        $investment = User::where('sub_count', '>', '0')
            ->where(function ($query)
            {
                $query->where('subscription_id', 5)->orWhere('subscription_id', 6)->orWhere('subscription_id', 7);
            })
            ->where('subscription_status', '0')->orderBy('date_subscribed', 'DESC')->paginate(1000);
            $jackpot = User::where('sub_count', '>', '0')
            ->where(function ($query)
            {
                $query->where('subscription_id', 8)->orWhere('subscription_id', 9);
            })
            ->where('subscription_status', '0')->orderBy('date_subscribed', 'DESC')->paginate(1000);

        return view('/expiredSubscribers', compact('investment', 'gold','silver'));
    }

    public function ajaxUserInfoUpdate(Request $request)
    {
        $id = trim($request['userid']);
        $name = trim($request['name']);
        $username = trim($request['username']);
        $email = trim($request['email']);

        User::where('id', $id)
            ->update(['full_name' => $name, 'username' => $username, 'email' => $email]);

        ResponseFacade::validationMessage('USER DETAILS UPDATED', '2');
    }

    public function postNewMember(Request $request, User $user, Subscription $plan)
    {
        $data = $request->except('_token');

        $validate = Validator::make($request->all(), [
           'fullName' => 'string|required',
           'email' => 'email|required',
           'phone' => 'string|required',
           'username' => 'string|required',
           'password' => 'string|required',
           'type' => 'string|required',
           'datesub' => 'string|required',
        ]);

        if ($validate->fails()) {
            ResponseFacade::validationMessage('ALL * FIELDS ARE REQUIRED');
        }

        $phoneVal = Validator::make($request->all(), [
            'phone' => 'unique:users'
        ]);

        if ($phoneVal->fails())
        {
            ResponseFacade::validationMessage('PHONE NUMBER ALREADY REGISTERED');
        }

        $datesub = trim($request['datesub']);
        $sub = $plan->getSub($request['type']);

        $next = strtotime('+'.$sub->accessTime, strtotime($datesub));
        $nextDue = date("Y-m-d H:i:s", $next);

        $user->create([
            'full_name' => $data['fullName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'country' => 'Kenya',
            'subscription_type' => $sub->planName,
            'subscription_status' => '1',
            'date_subscribed' => $datesub,
            'next_due_date' => $nextDue,
            'sub_count' => '1'
        ]);
        ResponseFacade::validationMessage('USER ACCOUNT SUCCESSFULLY CREATED', '2');
    }

    public function accountUpgrade(Request $request, User $user, Subscription $plan)
    {
        $id = trim($request['userid']);
        $datesub = trim($request['datesub']);
        $sub = $plan->getSub($request['type']);

        $user = $user->userSelect($id);

        if ($user->subscription_status=='1') {
            $next = strtotime('+'.$sub->accessTime, strtotime($user->next_due_date));
        } else {
            $next = strtotime('+'.$sub->accessTime, strtotime($datesub));
        }
        $nextDue = date("Y-m-d H:i:s", $next);

        $user->subscription_id = $sub->id;
        $user->subscription_type = $sub->planName;
        $user->subscription_status = '1';
        $user->date_subscribed = $datesub;
        $user->next_due_date = $nextDue;
        $user->save();
//        $user->update(['subscription_type'=>$sub->planName, 'subscription_status'=>'1', 'date_subscribed'=>$datesub, 'next_due_date'=>$nextDue]);

        $user->increment('sub_count');

        $email = filter_var($user->email, FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            if (EmailValidator::validator($email))
            {
                $name = $user->full_name;
                try {
                    //code...
                      Mail::send('mailtemplate.activation', ['name' => $name, 'sub' => $sub], function ($message) use ($email) {
                    $message->to($email, 'Passion Predict')
                        ->subject('YOUR ACCOUNT HAS BEEN ACTIVATED');
                });
                } catch (\Throwable $th) {
                    //throw $th;
                }

            }
        }

        ResponseFacade::validationMessage('USER ACCOUNT UPGRADED', '2');
    }

    public function ajaxUserPasswordUpdate(Request $request)
    {
        $id = trim($request['userid']);
        $newpass = trim($request['newpass']);
        $newpass1 = trim($request['confirmpass']);

        if($newpass!=$newpass1){
            ResponseFacade::validationMessage('PASSWORD MISMATCH', '1');
        }
        else{
            $password = bcrypt($newpass);

            $user = new User();
            $user->userSelect($id)->update(['password' => $password]);

            ResponseFacade::validationMessage('USER PASSWORD CHANGED', '2');
        }
    }

    public function ajaxUserDelete(Request $request)
    {
        $userid = trim($request['usid']);
        $password = $request['password'];

        $admin =   count(System::where('operation_key', $password)->first());
        if($admin==1) {

            $user = new User();
            $user->userSelect($userid)->delete();

            $status = 'd'.$userid;
            ResponseFacade::validationMessage("USER DELETED", $status);
        }
        else{
            ResponseFacade::validationMessage('INCORRECT OPERATION KEY', '1');
        }
    }

    public function sendBulk (Request $request)
    {
        $content = $request['content'];
        $date = Carbon::now()->format('d-m-Y');

        $users = User::where('email', '!=', NULL)->where('mailDate', '!=', $date)->get();
//        dd($users);
        foreach ($users->all() as $user) {
            $mail = $user->email;
            $email = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                if (EmailValidator::validator($email)){
                    $name = $user->full_name;

                    $all = $request->all();
                    Mail::send('mailtemplate.bc', ['name' => $name, 'content' => $content], function ($message) use ($all, $email) {
                        $message->to($email, 'PASSIONPREDICT')
                            ->subject($all['mailtitle']);
                    });
                    User::where('id', $user->id)->update(['mailDate'=>$date]);
                }
            }
        }
        $request->session()->flash('success', 'BROADCAST SENT SUCCESSFULLY');
        return redirect()->back();
    }

    public function bulkmailActive (Request $request)
    {
        $content = $request['content'];
        $date = Carbon::now()->format('d-m-Y');

        $users = User::where('email', '!=', NULL)->where('subscription_status', '1')->where('mailDate', '!=', $date)->get();
        foreach ($users->all() as $user) {
            $mail = $user->email;
            $email = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                if (EmailValidator::validator($email))
                {
                    $name = $user->full_name;

                    $all = $request->all();
                    Mail::send('mailtemplate.bc', ['name' => $name, 'content' => $content], function ($message) use ($all, $email) {
                        $message->to($email, 'PASSIONPREDICT')
                            ->subject($all['mailtitle']);
                    });
                    User::where('id', $user->id)->update(['mailDate'=>$date]);
                }
            }
        }
        $request->session()->flash('success', 'BROADCAST SENT SUCCESSFULLY');
        return redirect()->back();
    }

    public function bulkmailExpired (Request $request)
    {
        $content = $request['content'];
        $date = Carbon::now()->format('d-m-Y');

        $users = User::where('email', '!=', NULL)->where('sub_count', '>', '0')->where('subscription_status', '0')->where('mailDate', '!=', $date)->get();
        foreach ($users->all() as $user) {
            $mail = $user->email;
            $email = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                if (EmailValidator::validator($email))
                {
                    $name = $user->full_name;

                    $all = $request->all();
                    Mail::send('mailtemplate.bc', ['name' => $name, 'content' => $content], function ($message) use ($all, $email) {
                        $message->to($email, 'PASSIONPREDICT')
                            ->subject($all['mailtitle']);
                    });
                    User::where('id', $user->id)->update(['mailDate'=>$date]);
                }
            }
        }
        $request->session()->flash('success', 'BROADCAST SENT SUCCESSFULLY');
        return redirect()->back();
    }

    public function bulkmailNone (Request $request)
    {
        $content = $request['content'];
        $date = Carbon::now()->format('d-m-Y');

        $users = User::where('email', '!=', NULL)->where('sub_count', '0')->where('mailDate', '!=', $date)->get();
        foreach ($users->all() as $user) {
            $mail = $user->email;
            $email = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                if (EmailValidator::validator($email))
                {
                    $name = $user->full_name;

                    $all = $request->all();
                    Mail::send('mailtemplate.bc', ['name' => $name, 'content' => $content], function ($message) use ($all, $email) {
                        $message->to($email, 'PASSIONPREDICT')
                            ->subject($all['mailtitle']);
                    });
                    User::where('id', $user->id)->update(['mailDate'=>$date]);
                }
            }
        }
        $request->session()->flash('success', 'BROADCAST SENT SUCCESSFULLY');
        return redirect()->back();
    }

    public function individualMailer (Request $request)
    {

        $content = $request['content'];
        $emails = $request['emails'];
        $mails = explode(' ', $emails);

        foreach ($mails as $mail) {
            $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
                if (EmailValidator::validator($mail))
                {
                    $all = $request->all();
                    Mail::send('mailtemplate.individual', ['name' => '', 'content' => $content], function ($message) use ($all, $mail) {
                        $message->to($mail, 'PASSIONPREDICT')
                            ->subject($all['mailtitle']);
                    });
                }
            }
        }
        $request->session()->flash('success', 'BROADCAST SENT SUCCESSFULLY');
        return redirect()->back();
    }

    public function postBonusSubscribed(Request $request)
    {
        $days = trim($request['days']);
        $date = date('Y-m-d');

        $users = User::where('subscription_status', '1')->where('dateGift', '!=', $date)->get();
        foreach ($users as $user)
        {
            $next = strtotime('+'.$days.' Days', strtotime($user->next_due_date));
            $nextdue = date("Y-m-d H:i:s", $next);

            User::where('id', $user->id)->update(['subscription_status'=>'1', 'date_subscribed'=>$date, 'next_due_date'=>$nextdue, 'dateGift'=>$date]);

            $mail = $user->email;

            Mail::send('mailtemplate.subGift', ['user' => $user, 'period'=>$days], function ($message) use ($mail, $days) {
                $message->to($mail, 'PASSIONPREDICT')
                    ->subject("YOU HAVE BEEN GIVEN ADDITIONAL $days DAYS VIP ACCESS");
            });
        }

        $error = count($users);
        ResponseFacade::validationMessage($error, '0');
    }

    public function postBonusLapsed(Request $request)
    {
        $days = trim($request['days']);
        $date = date('Y-m-d');

        $users = User::where('sub_count', '!=', '0')->where('subscription_status', '0')->where('dateGift', '!=', $date)->get();
        foreach ($users as $user)
        {
            $nextdue = date('Y-m-d H:i:s', strtotime('+'.$days.' days'));
            User::where('id', $user->id)->update(['subscription_status'=>'1', 'date_subscribed'=>$date, 'next_due_date'=>$nextdue, 'dateGift'=>$date]);

            $mail = $user->email;

            Mail::send('mailtemplate.subGift', ['user' => $user, 'period'=>$days], function ($message) use ($mail, $days) {
                $message->to($mail, 'PASSIONPREDICT')
                    ->subject("YOU HAVE BEEN GIVEN ADDITIONAL $days DAYS VIP ACCESS");
            });
        }
        $error = count($users);
        ResponseFacade::validationMessage($error, '0');
    }

    public function systemRefresh()
    {
        $expire = new User();
        $affected = $expire->queryExpired();
        $destroy=$expire->querySmsExpired();
        echo $affected." EXPIRED USER ACCOUNT(S) DEACTIVATED! <br>".$destroy." EXPIRED SMS USER ACCOUNT(S) DEACTIVATED!";
    }

    public function bulkMail()
    {
        $date = Carbon::today()->format('d-m-Y');
        $user = User::where('email', '!=', NULL)->where('mailDate', '!=', $date)->get(['email']);
        $mail = $user->implode('email', ', ');
        return view('/mails', ['mails' => $mail]);
    }

    public function bulkActive()
    {
        $date = Carbon::today()->format('d-m-Y');
        $user = User::where('email', '!=', NULL)->where('mailDate', '!=', $date)->where('subscription_status', '1')->get(['email']);
        $mail = $user->implode('email', ', ');
        return view('/activeMails', ['mails' => $mail]);
    }

    public function bulkExpired()
    {
        $date = Carbon::today()->format('d-m-Y');
        $user = User::where('email', '!=', NULL)->where('mailDate', '!=', $date)->where('sub_count', '>', '0')->where('subscription_status', '0')->get(['email']);
        $mail = $user->implode('email', ', ');
        return view('/bulkExpired', ['mails' => $mail]);
    }

    public function individualMail()
    {
        return view('/individualMail');
    }

    public function disabledUsers()
    {
        $user = User::where('status', '1')->get();
        return view('/dmembers', ['members' => $user]);
    }

    public function flaggedUsers()
    {
        $user = User::where('flag', '1')->get();
        return view('/fmembers', ['members' => $user]);
    }

    public function ajaxUserInfo($uid)
    {
        $user = User::where('id', $uid)->first();
        return view('ajaxfiles.userinfo', ['user' => $user]);
    }

    public function ajaxUserUpdate($uid)
    {
        $user = User::where('id', $uid)->first();
        return view('ajaxfiles.usersettings', ['user' => $user]);
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

                return view('/members', ['members'=>$users, 'title'=>'All Members']);
            }
    }

    public function getSearchMember()
    {
        $user = User::latest('created_at')->paginate(200);
        return view('/members', ['members' => $user, 'title'=>'All Members']);
    }

    public function upgradeAccount($uid, User $user)
    {
        $user = $user->userSelect($uid);
        $subs = Subscription::where('status','0')->get();
        return view('ajaxfiles.upgrade', ['user' => $user, 'subs'=>$subs]);
    }
}
