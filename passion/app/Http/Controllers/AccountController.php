<?php

namespace App\Http\Controllers;

use App\Helpers\JSONResponder;
use App\Mail\ConfirmEmail;
use App\Mail\RegistrationEmail;
use App\Solos\Modules\User\Model\User;
use Carbon\Carbon;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function postRegister(Request $request, Sentinel $sentinel, Mailer $mailer)
    {
        $data = $request->except('_token');
        $validate = Validator::make($data, [
            'full_name' => 'required|string',
            'email' => 'required|email',

            'country' => 'required|string',
            'password' => 'required|string'
        ]);
        if ($validate->fails()) JSONResponder::validationMessage('ALL * FIELDS ARE REQUIRED');
        $valEmail = Validator::make($data, [
            'email' => 'unique:users'
        ]);
        if ($valEmail->fails()) JSONResponder::validationMessage('EMAIL ALREADY USED FOR AN ACCOUNT');

        $valPassword = Validator::make($data, [
            'password' => 'required|confirmed'
        ]);
        if ($valPassword->fails()) JSONResponder::validationMessage('PASSWORD MISMATCH');

        $user = $sentinel->registerAndActivate($data);
//        $activate = Activation::create($user);
//        $mailer->to($request['email'])->send(new ConfirmEmail($user, $activate));
//        $email = $data['email'];
//        JSONResponder::validationMessage($email, '0');

        // $mailer->to($request['email'])->send(new RegistrationEmail($user));
        JSONResponder::validationMessage('Ok', '0');
    }


    public function postResendActivation(Request $request, Mailer $mailer)
    {
        $email = $request->email;

        $user = User::where('email', $email)->first();
        if (!isset($user)) JSONResponder::validationMessage('INVALID EMAIL ADDRESS!');
        $activate = Activation::where('user_id', $user->id)->first();
        $mailer->to($request['email'])->send(new ConfirmEmail($user, $activate));
        JSONResponder::validationMessage('Ok', '0');
    }


    public function getVerify($email=null, $code=null, User $user, Request $request, Mailer $mailer)
    {
        $usr = $user->where('email', $email)->first();
        if ($usr) {
            if (Activation::complete($usr, $code)){
                $mailer->to($email)->send(new RegistrationEmail($usr));
                $request->session()->flash('success', 'YOU ARE DONE, YOUR ACCOUNT IS NOW ACTIVATED! YOU CAN LOGIN NOW');
                return redirect('/login');
            }
        }
        $request->session()->flash('err', 'THE ACTIVATION LINK IS BROKEN OR EXPIRED!');
        return redirect('/login');
    }



    public function postLogin(Request $request, Sentinel $sentinel, User $user)
    {
        $rememberme = false;
        //die('authenticate');
        if (isset($request->rememberme)) $rememberme = true;
        $email = trim($request['email']);
        $password = trim($request['password']);
        try {
            $auth=$sentinel->authenticate(['login' => $email, 'password' => $password], $rememberme);
            if ($auth)
            {


                $user = currentUser();
                if ($user->next_due_date<=Carbon::now()->format('Y-m-d H:i:s')) {
                    User::where('id', $user->id)->update(['subscription_status' => '0']);
                }
                if ($user->sms_due_date<=Carbon::now()->format('Y-m-d H:i:s')) {
                    User::where('id', $user->id)->update(['sms_subscription_status' => NULL]);
                }
                if ($user->status=='1'){
                    $sentinel->logout();
                    $request->session()->flash('err', 'YOUR ACCOUNT IS CURRENTLY DISABLED');
                    return redirect('/login');
                }
                $redirect = Session::get('loginRedirect', '/dashboard');
                Session::forget('loginRedirect');
                return redirect($redirect);
//                return redirect()->intended('/account/index');
            }
            return redirect()->back()->with(['err'=>'INVALID LOGIN DETAILS']);

        }  catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->with(['err'=>"YOU ARE FLAGGED! TRY LOGIN IN $delay SECONDS."]);
        } catch (NotActivatedException $e) {
            $user = $e->getUser();
            return redirect()->back()->with(['err'=>"Hello $user->firstName, your account has not been activated. An email was sent to $user->email. Kindly check your email to proceed!"]);
        }
    }


    public function getActivation($email=null)
    {
        return view('activation', compact('email'));
    }

    public function getLogout(Sentinel $sentinel)
    {
        $sentinel->logout();
        return redirect()->back();
    }
    public function updatecountryfailed(){
        User::where('country',null)->update(['country'=>'United States']);
    }
}
