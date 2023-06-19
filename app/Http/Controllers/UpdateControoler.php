<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Clothing;
use App\Models\Clothing2;
use App\Models\Contactus;
use App\Models\offer;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;


class UpdateControoler extends Controller
{

    public function brandupdate(Request $request, $id)
    {

        $user = Brand::where('id', $id)->first();
        return view('adminpnlx.update.brandupdate', compact('user'));
    }

    public function brandpostupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        $brand = Brand::find($id);
        $brand->name = $request->input('name');
        $brand->description = $request->input('description');

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.brand_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('image')->move($folderPath, $fileName)) {
                $brand->image = $folderName . $fileName;
            }
        }
        $brand->save();

        return redirect()->route('brandtable');
    }

    public function sliderupdate(Request $request, $id)
    {

        $user = Slider::where('id', $id)->first();
        return view('adminpnlx.update.sliderupdate', compact('user'));
    }

    public function sliderpostupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',

        ]);

        $brand = Slider::find($id);
        $brand->title = $request->input('title');
        $brand->subtitle = $request->input('subtitle');
        $brand->description = $request->input('description');
        $brand->button_text = $request->input('button_text');
        $brand->button_link = $request->input('button_link');

        if ($request->hasFile('sliderimage')) {
            $extension = $request->file('sliderimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.slider_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('sliderimage')->move($folderPath, $fileName)) {
                $brand->sliderimage = $folderName . $fileName;
            }
        }
        $brand->save();

        return redirect()->route('viewslider');
    }

    public function categoryupdate(Request $request, $id)
    {

        $user = Category::where('id', $id)->first();
        return view('adminpnlx.update.categoryupdate', compact('user'));
    }

    public function categorypostupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        $cat = Category::find($id);
        $cat->name = $request->input('name');


        if ($request->hasFile('catimage')) {
            $extension = $request->file('catimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.catimage_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('catimage')->move($folderPath, $fileName)) {
                $cat->catimage = $folderName . $fileName;
            }
        }
        $cat->save();

        return redirect()->route('viewcategory');
    }

    public function clothingupdate(Request $request, $id)
    {

        $user = Clothing::where('id', $id)->first();
        return view('adminpnlx.update.clothingupdate', compact('user'));
    }

    public function clothingpostupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',

        ]);

        $cat = Clothing::find($id);
        $cat->title = $request->input('title');
        $cat->clothtype = $request->input('clothtype');
        $cat->price = $request->input('price');


        if ($request->hasFile('clothimage')) {
            $extension = $request->file('clothimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.clothimage_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('clothimage')->move($folderPath, $fileName)) {
                $cat->clothimage = $folderName . $fileName;
            }
        }
        $cat->save();

        return redirect()->route('clothing');
    }


    public function offerupdate(Request $request, $id)
    {

        $user = offer::where('id', $id)->first();
        return view('adminpnlx.update.offerupdate', compact('user'));
    }

    public function offerpostupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',

        ]);

        $cat = offer::find($id);
        $cat->title = $request->input('title');
        $cat->subtitle = $request->input('subtitle');
        $cat->description = $request->input('description');
        $cat->price = $request->input('price');


        if ($request->hasFile('offerimage')) {
            $extension = $request->file('offerimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.offer_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('offerimage')->move($folderPath, $fileName)) {
                $cat->offerimage = $folderName . $fileName;
            }
        }
        $cat->save();

        return redirect()->route('viewoffertable');
    }

    public function blogupdate(Request $request, $id)
    {

        $user = Blog::where('id', $id)->first();
        return view('adminpnlx.update.blogupdate', compact('user'));
    }

    public function blogpostupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',

        ]);

        $cat = Blog::find($id);
        $cat->title = $request->input('title');
        $cat->subtitle = $request->input('subtitle');
        $cat->description = $request->input('description');



        if ($request->hasFile('blogimage')) {
            $extension = $request->file('blogimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.blog_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('blogimage')->move($folderPath, $fileName)) {
                $cat->blogimage = $folderName . $fileName;
            }
        }
        $cat->save();

        return redirect()->route('viewblogtable');
    }

    public function clothing2update(Request $request, $id)
    {

        $user = Clothing2::where('id', $id)->first();
        return view('adminpnlx.update.clothing2', compact('user'));
    }

    public function clothing2postupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',

        ]);

        $cat = Clothing2::find($id);
        $cat->title = $request->input('title');
        $cat->clothtype = $request->input('clothtype');
        $cat->description = $request->input('description');
        $cat->price = $request->input('price');



        if ($request->hasFile('clothimage')) {
            $extension = $request->file('clothimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.Clothing2_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('clothimage')->move($folderPath, $fileName)) {
                $cat->clothimage = $folderName . $fileName;
            }
        }
        $cat->save();

        return redirect()->route('clothing2table');
    }
    public function productupdate(Request $request, $id)
    {


        $brand = Brand::all();
        $user = Product::where('id', $id)->first();

        return view('adminpnlx.update.productupdate', compact('user', 'brand'));
    }

    public function productpostupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        $Product = Product::find($id);
        $Product->name = $request->input('name');
        $Product->description = $request->input('description');
        $Product->brand_id = $request->input('brand_id');
        $Product->price = $request->input('price');



        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.Product_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('image')->move($folderPath, $fileName)) {
                $Product->image = $folderName . $fileName;
            }
        }
        $Product->save();

        return redirect()->route('producttable');
    }



    public function contactusupdate(Request $request, $id)
    {

        $user = Contactus::where('id', $id)->first();
        return view('adminpnlx.update.contactupdate', compact('user'));
    }

    public function contactpostupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',

        ]);

        $Contactus = Contactus::find($id);
        $Contactus->phone = $request->input('phone');
        $Contactus->address = $request->input('address');
        $Contactus->description = $request->input('description');
        $Contactus->email  = $request->input('email');
        $Contactus->save();

        return redirect()->route('contactustable');
    }

    public function userupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',

        ]);

        $Contactus = User::find($id);
        $Contactus->phone = $request->input('phone');
        $Contactus->address = $request->input('address');
        $Contactus->description = $request->input('description');
        $Contactus->email  = $request->input('email');
        $Contactus->save();

        return redirect()->route('contactustable');
    }
}
