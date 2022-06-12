<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class changePassword extends Controller
{


    public  function change(Request $request){
        $validator = Validator::make($request->all(),[
                'old_password' => 'required|min:6',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:new_password'
            ]);
        if ($validator->fails()){
            return response()->json([
               'message' => 'Invalid Credentials',
                'errors' => $validator-errors()
            ],422);
        }
        $user = $request->user();
        if(Hash::check($request->old_password,$user->password)){
            $user->update([
               'password' => Hash::make($request->password)
            ]);
            return  response()->json([
               'message' => 'password successfully updated'
            ],200);
        }else{
            return  response()->json([
               'message' => 'Old password does not matched'
            ],400);
        }
    }
}
