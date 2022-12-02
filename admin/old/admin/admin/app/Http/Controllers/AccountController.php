<?php

namespace App\Http\Controllers;

use App\Activation;
use App\System;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function adminSignIn(Request $request, Activation $activation, User $u)
    {
        $email = trim($request['email']);
        $password = trim($request['password']);

        if($email == NULL){$this->validationMessage("PROVIDE LOGIN EMAIL");}
        elseif($password == NULL){$this->validationMessage("KEY-IN YOUR PASSWORD PLEASE");}
        else{
            if(Auth::attempt(['email'=>$email, 'password'=>$password]))
            {
                $user = System::where('email', $email)->first();
                if ($user->status==1)
                {
                    $this->validationMessage("ACCOUNT UNDER LOCK");
                }
                else
                {
                    //DELETE ALL UN-ACTIVATED USERS
                    $allTrash = $activation->where('completed', '0')->whereDate('created_at', '!=', Carbon::today())->get();
                    foreach ($allTrash as $key => $t){
                        $u->where('id', $t->user_id)->delete();
                    }

                    $id = $user->id;
                    $this->validationMessage("$id", 2);
                }
            }
            $this->validationMessage("INVALID LOGIN DETAILS");
        }
    }

    public function loginOperationOk($id)
    {
        Auth::loginUsingId($id);
        return redirect()->intended('dashboard');
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    private function validationMessage($msg, $status = 1)
    {
        echo json_encode( array('post'=>$msg, 'status'=>$status), JSON_PRETTY_PRINT );
        exit();
    }
}
