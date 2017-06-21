<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Mail;
use App\Mail\UserRegisterVerify;


class EmailController extends Controller
{
    public function verifyEmail($token)
    {
        $user = User::where('confirmation_token',$token)->first();
        if(is_null($user))
        {
            return redirect(route('invalid.verify.link'));
        }
        $user->confirmation_token = str_random(40);
        $user->is_active = 'T';
        $user->save();
        Auth::login($user);
        return redirect('/');
    }

    public function showVerify()
    {
        return view('verify_required');
    }

    public function showInvalidVerify()
    {
        return view('verify_invalid');
    }

    public function resendVerifyEmail(User $user)
    {
        Mail::queue(new UserRegisterVerify($user));
        redirect('show.verify.required')->with(['userId' => $this->user->id]);
    }
}
