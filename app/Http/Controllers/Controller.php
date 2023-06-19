<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function submitForm(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ];

        Mail::send(['html' => 'emailsend.mailsend'], $data, function ($message) use ($email) {
            $message->to('saurabhmathur2323@gmail.com', 'owner')->subject('Laravel HTML Testing Mail');
            $message->from('saurabhmathur2398@gmail.com', 'saurabh mathur');
        });

        return "Thank you for your submission!";
    }
}
