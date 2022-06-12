<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'cin' => 'required|min:8|unique:users',
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'tel' => 'required|min:8',
            'adresse' => 'required|max:150',
            'password' => 'required|string|min:6|confirmed'


        ]);
        $user = User::create([
            'cin' => $fields['cin'],
            'name' => $fields['name'],
            'email' => $fields['email'],
            'tel' =>$fields['tel'],
            'adresse'=>$fields['adresse'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('token')->plainTextToken;


        return $response = [
            'user' => $user,
            'token' => $token,
            'status'=> 200,
            'message' => 'User Registered Successfully'
        ];


    }
    public function login(Request $request)
    {
        $fields = $request->validate([

            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);

        //Check email

        $user= User::where('email', $fields['email'])->first();

        //Check Password
        if(!$user || !Hash::check($fields['password'], $user->password) ){
            return response([
                'message'=>'Invalid Credentials',

            ], 401);
        }

        $token = $user->createToken('token')->plainTextToken;

        $response= [
            'user' => $user,
            'token'=> $token,
            'status' => 201,
            'message' => 'Conncté(e) avec succées'
        ];

        return response($response, 201);
    }
    public function logout(Request $request)
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    public function profile(){

        return response()->json(auth('sanctum')->user());

    }
    public function update_profile(Request $request){
        $validator = Validator::make($request->all(),[
            'cin' => 'nullable|min:8|unique:users',
            'name' => 'nullable|string',
            'email' => 'nullable|string|unique:users,email',
            'tel' => 'nullable|min:8',
            'adresse' => 'nullable|max:150',
            'avatar' => 'nullable|image|mimes:png,bmp,jpg'
        ]);
        if ($validator->fails()){
            return response()->json([
                'message' => 'Invalid Credentials',

            ],422);
        }
        $user = $request->user();


        $user->update([
            'cin' => $request->cin,
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'adresse' => $request->adresse,
            'avatar' => $request->avatar,
        ]);
        return  response()->json([
            'message' => 'Profile updated successfully'
        ],200);
    }
    /*public function profile_edit($id, Request $request){

        //validator place

        $users = user::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->thumbnail = $request->avatar->store('avatars','public');
        $users->save();

        $data[] = [
            'id'=>$users->uid,
            'name'=>$users->name,
            'email'=>$users->email,
            'avatar'=>Storage::url($users->thumbnail),
            'status'=>200,
        ];
        return response()->json($data);

    }*/


}


