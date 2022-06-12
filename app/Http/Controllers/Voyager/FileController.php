<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public  function  file(Request $request){

        // check if image has been received from form
        if($request->file('avatar')){

            // check if user has an existing avatar
            if($this->guard()->user()->avatar != NULL){
                // delete existing image file
                Storage::disk('user_avatars')->delete($this->guard()->user()->avatar);
            }

            // processing the uploaded image
            $avatar_name = $this->random_char_gen(20).'.'.$request->file('avatar')->getClientOriginalExtension();
            $avatar_path = $request->file('avatar')->storeAs('',$avatar_name, 'user_avatars');

            // Update user's avatar column on 'users' table
            $profile = User::find($request->user()->id);
            $profile->avatar = $avatar_path;

            if($profile->save()){
                return response()->json([
                    'status'    =>  'success',
                    'message'   =>  'Profile Photo Updated!',
                    'avatar_url'=>  url('storage/user-avatar/'.$avatar_path)
                ]);
            }else{
                return response()->json([
                    'status'    => 'failure',
                    'message'   => 'failed to update profile photo!',
                    'avatar_url'=> NULL
                ]);
            }

        }

        return response()->json([
            'status'    => 'failure',
            'message'   => 'No image file uploaded!',
            'avatar_url'=> NULL
        ]);
             }

}
