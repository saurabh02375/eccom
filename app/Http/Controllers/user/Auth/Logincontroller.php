<?php

namespace App\Http\Controllers\user\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Logincontroller extends Controller
{
    public function login(){
        if(Auth::user()){
            return  redirect()->route('viewindex');
        }
        return view('user.Auth.login');
    }




    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('index');
    }


    public function postlogin(Request $request)
{
   
    $formData = $request->all();

    $validator = Validator::make(
        $request->all(),
        array(
       'email' => 'required',
       'password'=> 'required'
        ),
        array(
        "email.required" => "The image field is required.",
        "password.required" => "The title field is required.",
        )
        
        );
        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        } else{
            $credentials = [
                'email' => $request['email'],
                'password' => $request['password'],
            ];
            if(Auth::attempt($credentials)) {
                return redirect()->route('viewindex');       
            }

}
}
}