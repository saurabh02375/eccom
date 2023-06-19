<?php

namespace App\Http\Controllers;

use App\Models\Addtocart;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function tocheckout(Request $request)
    {
        // $products    = DB::table('products')->join('addtocarts', 'products.id', '=', 'addtocarts.product_id')
        //     ->select('name', 'price', 'addtocarts.*', 'image')->get();


        $checkouts = Checkout::all();
        $subtotal = $checkouts->sum('finalprice');
        $gst = ($subtotal * 18) / 100;
        $finalamount = $subtotal + $gst;
        return view('user.frontend.tocheckout', compact('checkouts', 'subtotal', 'finalamount', 'gst'));


        // $subtotal    =  $request->x;
        // return response()->json([
        //     'subtotal' => $subtotal
        // ]);
        // dd($subtotal);
        // $subtotal    =  $products->sum('price');
        // return view('user.frontend.tocheckout', compact('checkouts'));
    }

    public function proceed(Request $request)
    {
        if (!empty($request->quantity)) {
            foreach ($request->quantity as $product_id => $quantity) {
                $product = Product::where('id', $product_id)->first();
                // $user_id = Checkout::where('user_id', Auth::id())->first();
                $user_id        =   Auth::user()->id;
                $final_price = $product->price * $quantity;
                $checksave = new Checkout();
                $checksave->finalprice  = $final_price;
                $checksave->product_id  = $product_id;
                $checksave->quantity    = $quantity;
                $checksave->user_id    =    $user_id;
                // dd($request);
                $checksave->save();
            }
            return redirect()->route('tocheckout');
        }
        $products = $request->input('product_id');
        $product = Addtocart::where('id', $products)->first();
    }
}
