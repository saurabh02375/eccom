<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->get('query');

        $results = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

        return response()->json($results);
    }


    public function showloginpage()
    {

        return view('auth.adminlogin');
    }

    public function adminlogin(Request $request)
    {
        $formData = $request->all();
        dd(Auth::admins());
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);



        if ($validator) {
            $credentials = [
                'email' => $request['email'],
                'password' => $request['password'],
            ];
            if (Auth::attempt($credentials)) {


                return redirect()->route('home')->with('success', 'your login success');
            }
        }
        return redirect()->back()->with('error', 'your login failed');
    }
}
