<?php

namespace App\Http\Controllers;

use App\Helpers\JSONResponder;
use App\Mail\PasswordResetEmail;
use App\Solos\Modules\User\Model\User;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class ResetController extends Controller
{
    public function postReset(Request $request, User $user, Mailer $mailer){
        $data = $user->whereEmail(trim($request->email))->first();
        if (isset($data)) {
            $reminder = Reminder::exists($data) ?: Reminder::create($data);
            $mailer->to($request->email)->send(new PasswordResetEmail($data, $reminder->code));
            JSONResponder::validationMessage('Ok', 0);
        }
        JSONResponder::validationMessage('Email Does Not Exist!');
    }

    public function getReset($email = null, $code = null, User $user, Request $request){
        $data = $user->whereEmail(trim($email))->first();
        if ($data) {
            if ($reminder = Reminder::exists($data)) {
                if ($code == $reminder->code) {
                    return view('reset', compact('email', 'code'));
                }
            }
        }
        $request->session()->flash('err', 'RESET LINK EXPIRED!');
        return redirect('/login');
    }

    public function postResetPassword(Request $request, User $user) {
        $this->validate($request, [
            'password' => 'required|string|confirmed'
        ]);
        $data = $user->whereEmail(trim($request->email))->first();
        if ($data) {
            if ($reminder = Reminder::exists($data)) {
                if ($request->code == $reminder->code) {
                    Reminder::complete($data, $request->code, $request->password);
                    $request->session()->flash('success', 'PASSWORD SUCCESSFULLY RESET!');
                    return redirect('/login');
                }
            }
        }
        $request->session()->flash('err', 'RESET LINK EXPIRED!');
        return redirect('/login');
    }
}
