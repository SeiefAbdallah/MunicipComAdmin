<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function mail(Request $request)
    {

        $data = [
            'Name'  => $request->input('myUsername'),
            'Email' => $request->input('myEmail'),
            'Query' => $request->input('textquery')
        ];

        //Mail Function
        Mail::send('email.name', ['data1' => $data], function ($m) {

            $m->to('saifeddineabdallah2000@gmail.com')->subject('Contact Form Mail!');
        });
        //Json Response For Angular frontend
        return response()->json(["message" => "Email sent successfully."]);
    }
}
