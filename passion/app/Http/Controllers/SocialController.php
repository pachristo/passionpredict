<?php

namespace App\Http\Controllers;

use App\Activation;
use App\Solos\Modules\User\Model\User;
use Carbon\Carbon;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function facebookRedirectToProvider()
    {
        return Socialite::driver('facebook')->scopes(['public_profile','email'])->redirect();
    }

    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleFacebookProviderCallback(Request $request, Sentinel $sentinel)
    {
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/login');
        }

        $user = Socialite::driver('facebook')->user();

        try{

            $get = User::where('provider', 'facebook')->where('provider_id', $user->id)->first();
            $mail = User::where('email', $user->email)->first();
            if (isset($get)) {
                $sentinel->loginAndRemember($get);
            }
            elseif (isset($mail)) $sentinel->loginAndRemember($mail);
            else {
                $new = new User();
                $new->full_name = $user->name;
                $new->username = $user->name;
                $new->email = $user->email;
                $new->provider = 'facebook';
                $new->provider_id = $user->id;
                $new->avatar = $user->avatar;
                $new->country='United States';
                $new->save();

                $code = bcrypt($user->id);
                Activation::create([
                    'user_id' => $new->id,
                    'code' => $code,
                    'completed' => '1',
                    'completed_at' => Carbon::now()
                ]);
                $sentinel->loginAndRemember($new);
            }
            $redirect = Session::get('loginRedirect', '/dashboard');
            Session::forget('loginRedirect');
            return redirect($redirect);

        }
        catch (\Exception $e)
        {
            return redirect('/login')->with(['err'=>'THERE WAS AN ISSUE. PLEASE TRY AGAIN OR USE ANOTHER METHOD']);
        }

    }

    public function handleGoogleProviderCallback(Request $request, Sentinel $sentinel)
    {
        $user = Socialite::driver('google')->user();

        $get = User::where('provider', 'google')->where('provider_id', $user->id)->first();
        $mail = User::where('email', $user->email)->first();
        if (isset($get)) {
            $sentinel->loginAndRemember($get);
        }
        elseif (isset($mail)) $sentinel->loginAndRemember($mail);
        else {
            $new = new User();
            $new->full_name = $user->name;
            $new->username = $user->name;
            $new->email = $user->email;
            $new->provider = 'google';
            $new->provider_id = $user->id;
            $new->avatar = $user->avatar;
            $new->country='United States';
            $new->save();

            $code = bcrypt($user->id);
            Activation::create([
                'user_id' => $new->id,
                'code' => $code,
                'completed' => '1',
                'completed_at' => Carbon::now()
            ]);
            $sentinel->loginAndRemember($new);
        }
        $redirect = Session::get('loginRedirect', '/dashboard');
        Session::forget('loginRedirect');
        return redirect($redirect);
    }
}
