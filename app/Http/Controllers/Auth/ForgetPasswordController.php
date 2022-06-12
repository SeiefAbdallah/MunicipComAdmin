<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Testing\Fluent\Concerns\Has;
use Psy\Util\Str;

class ForgetPasswordController extends Controller
{
    public  function forgot(Request $request){
        $this->validate($request,[
           'email' => 'required|email'
        ]);
        $email = $request->email;
        if(User::where('email',$email)->doesntExist()){
            return response(['message' => 'Email does not exist'],400);
        }
        $token = \Illuminate\Support\Str::random(10);
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now()->addHours(6)
        ]);
        //send mail
        Mail::send('mail.password_reset',['token' => $token],function ($message) use($email){
            $message->to($email);
            $message->subject('Reset Your Password');
        });
        return  response(['message'=>'check your email'],200);
    }

    public function  reset(Request $request){
        $this->validate($request,[
           'token' => 'required|string',
           'password' => 'required|string|confirmed'
        ]);
        $token =$request-> token;
        $passwordReset = DB::table('password_resets')->where('token',$token)->first();
        if(!$passwordReset){
            return response (['message' => 'Token not found'],200);
        }
        if(!$passwordReset->created_at >= now()){
            return response (['message' => 'Token has expired'],200);
        }

        $user = User::where('email',$passwordReset->email)->first();
        if (!$user){
            return response (['message' => 'User does not exists'],200);
        }

        $user->password = Hash::make($request->password);
        $user->save();
        DB::table('password_resets')->where('token',$token)->delete();
        return response (['message' => 'password successfully updated'],200);

    }
}
