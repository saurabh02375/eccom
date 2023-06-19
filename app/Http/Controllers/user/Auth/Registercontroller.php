<?php

namespace App\Http\Controllers\user\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\user\auth\Register;
use App\Models\user;

class Registercontroller extends Controller
{
    public function register(){

        return view('user.Auth.register');
    }

    public function store(Request $request)
    {
        $formData = $request->all();
        $validation = $request->validate([
            'name' => ['required', 'alpha'], 
            'email' => 'required', 
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);


        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
    
        $user->save();


        return redirect('index');
    }
}