<?php

namespace App\Http\Controllers\fashi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function viewotp($validate_string)
    {
        // dd($validate_string);
        return view('auth.otp', compact('validate_string'));
    }

    public function verifyotp(Request $request, $validate_string)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'otp' => 'required',
            ]);

            $otp    =   User::where('validate_string', $validate_string)->where('verification_code', $request->input('otp'))->first();



            if (empty($otp)) {
                session()->flash('error', 'Otp is not correct');
                return redirect()->back();
            } else {
                $otp->save();
                return redirect()->route('home', compact('otp'))->with('success', 'your account has been registered');
            }
        }
    }

    public function register()
    {

        return view('user.Auth.register');
    }

    public function store(Request $request)
    {
        $formData = $request->all();
        $validation = $request->validate([
            'name' => ['required'],
            'email' => 'required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);


        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $code = rand(100000, 123456);
        $user->password = Hash::make($request->input('password'));
        $user->verification_code            =  $code;
        $user->validate_string       = md5($request->input('email') . time() . time());

        $user->save();
        // $data = ['name' =>  $request->name, 'otp' => $code];

        // Mail::send(['html' => 'emailsend.mailsend'], $data, function ($message) {
        //     $message->to($_POST['email'], 'owner')->subject('Laravel HTML Testing Mail');
        //     $message->from('saurabhmathur2398@gmail.com', 'saurabh mathur');
        // });

        return redirect()->route('viewotp', $user->validate_string);
    }

    public function login()
    {
        if (Auth::user()) {
            return  redirect()->route('home');
        }
        return view('user.Auth.login');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect()->back()->with('success', 'logout success');
    }


    public function postlogin(Request $request)
    {

        $formData = $request->all();

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        // if ($validator->fails()) {
        //     dd($validator);
        // // return redirect()->back()->withErrors($validator)->withInput();
        // return redirect()->route('login')->with('error','your login failed');
        // } else{
        //     $credentials = [
        //         'email' => $request['email'],
        //         'password' => $request['password'],
        //     ];
        //     if(Auth::attempt($credentials)) {
        //         // return  redirect()->route('home');
        //         return redirect()->route('home')->with('success','your login success');
        //     }


        //   }



        if ($validator) {
            $credentials = [
                'email' => $request['email'],
                'password' => $request['password'],
            ];
            if (Auth::attempt($credentials)) {
                // return  redirect()->route('home');

                return redirect()->route('home')->with('success', 'your login success');
            }
        }
        return redirect()->back()->with('error', 'your login failed');
    }
}