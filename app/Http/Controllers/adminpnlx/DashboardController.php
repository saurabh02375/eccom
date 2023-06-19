<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Clothing;
use App\Models\Clothing2;
use App\Models\Contactus;
use App\Models\coupon;
use App\Models\Lookups;
use App\Models\offer;
use App\Models\Product;
use App\Models\Product_colors;
use App\Models\User;
use App\Models\user\auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function user()
    {
        $users = user::all();

        return view('adminpnlx.dashboard.user', compact('users'));
    }
    public function dashboard()
    {

        return view('dashboard');
    }


    public function slider()
    {
        $slider = Slider::all();

        return view('adminpnlx.dashboard.slider', compact('slider'));
    }
    public function category()
    {
        $category = Category::all();

        return view('adminpnlx.dashboard.category', compact('category'));
    }
    public function clothing()
    {
        $clothing = Clothing::all();

        return view('adminpnlx.dashboard.clothing', compact('clothing'));
    }
    public function viewslider()
    {

        return view('adminpnlx.users.addslider');
    }

    public function categoryaddpage()
    {
        return view('adminpnlx.users.addcategory');
    }
    public function clothingpage()
    {

        return view('adminpnlx.users.addclothing');
    }
    public function viewoffertable()
    {
        $offer = offer::all();

        return view('adminpnlx.dashboard.offer', compact('offer'));
    }

    public function viewooferpage()
    {
        $offer = offer::all();

        return view('adminpnlx.users.addofferdeal', compact('offer'));
    }
    public function viewblogtable()
    {
        $Blog = Blog::all();

        return view('adminpnlx.dashboard.blog', compact('Blog'));
    }
    public function addblog()
    {
        $Blog = Blog::all();

        return view('adminpnlx.users.addblog', compact('Blog'));
    }

    public function clothing2table()
    {
        $clothing = Clothing2::all();

        return view('adminpnlx.dashboard.clothing2', compact('clothing'));
    }
    public function clothing2page()
    {

        return view('adminpnlx.users.addclothing2');
    }
    public function brandtable()
    {
        $brand = Brand::all();

        return view('adminpnlx.dashboard.brand', compact('brand'));
    }

    public function brandadd()
    {
        $brand = Brand::all();

        return view('adminpnlx.users.addbrand', compact('brand'));
    }
    public function viewCouponpage()
    {
        $coupon = coupon::all();

        return view('adminpnlx.dashboard.coupon', compact('coupon'));
    }
    public function updateCouponpage($id)
    {
        $user = coupon::where('id', $id)->first();


        return view('adminpnlx.update.couponupdate', compact('user'));
    }
    public function addeuserpage()
    {

        $user  = user::all();

        return view('adminpnlx.users.adduser', compact('user'));
    }
    public function addcoupon()
    {
        $user   =   User::all();

        $products = Product::all();
        return view('adminpnlx.users.addcoupon', compact('user', 'products'));
    }
    public function couponstatus($id)
    {
        $user = coupon::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back();
        } else {
            return 'User not found.';
        }
    }

    public function deletecoupon(Request $request, $id)
    {

        $coupon      = coupon::where('id', $id)->delete();
        return redirect()->back();
    }
    public function producttable()
    {
        // $product= Product::all();

        $products   = Product::all();
        $products = DB::table('products')->leftjoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftjoin('product_colors', 'products.id', '=', 'product_colors.product_id')
            ->leftjoin('lookups', 'product_colors.color_id', '=', 'lookups.id')
            ->select('brands.name AS brandname', 'products.*', 'lookups.type AS color_type')
            ->get();
        return view('adminpnlx.dashboard.Product', compact('products'));
    }
    public function userstatus($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back();
        } else {
            return 'User not found.';
        }
    }

    public function productpage()
    {
        $product = Product::all();
        $brand = Brand::all();
        $colors = Lookups::all();

        return view('adminpnlx.users.addproduct', compact('product', 'brand', 'colors'));
    }
    public function contactustable()
    {
        $contactus = Contactus::all();

        return view('adminpnlx.dashboard.contactus', compact('contactus'));
    }
    public function contacttablepage()
    {
        $contactus = Contactus::all();

        return view('adminpnlx.users.addcontactus', compact('contactus'));
    }
    // functions here after views pages
    public function addslider(Request $request)
    {

        $formData = $request->all();
        $validation = $request->validate([
            'title' => ['required'],
            'subtitle' => 'required',
            'description' => 'required:6',

        ]);

        $slider = new Slider();
        $slider->title = $request->input('title');
        $slider->subtitle = $request->input('subtitle');
        $slider->description = $request->input('description');
        $slider->button_text = $request->input('button_text');
        $slider->button_link = $request->input('button_link');

        if ($request->hasFile('sliderimage')) {
            $extension = $request->file('sliderimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.slider_IMAGE_ROOT_PATH') . $folderName;



            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('sliderimage')->move($folderPath, $fileName)) {
                $slider->sliderimage = $folderName . $fileName;
            }
            $slider->save();
            return  redirect()->route('viewslider');
        }
    }
    public function deleteData($id)
    {
        $user = Slider::where('id', $id)->delete(['is_deleted' => 1]);

        return redirect()->back();
    }
    public function deleteuser($id)
    {
        $user = user::where('id', $id)->delete(['is_deleted' => 1]);

        return redirect()->back();
    }
    public function Status($id)
    {
        $user = Slider::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back();
        } else {
            return 'User not found.';
        }
    }

    public function categoryStatus($id)
    {
        $user = Category::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back();
        } else {
            return 'User not found.';
        }
    }


    public function deletecategorydata($id)
    {
        $user = Category::where('id', $id)->delete(['is_deleted' => 1]);

        return redirect()->back();
    }

    public function addcategory(Request $request)
    {

        $formData = $request->all();
        $validation = $request->validate([
            'name' => 'required|unique:categories',

        ]);

        $Category = new Category();
        $Category->name = $request->input('name');
        if ($request->hasFile('catimage')) {
            $extension = $request->file('catimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.catimage_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('catimage')->move($folderPath, $fileName)) {
                $Category->catimage = $folderName . $fileName;
            }
            $Category->save();
            return  redirect()->route('viewcategory');
        }
    }
    public function addcloth(Request $request)
    {

        $formData = $request->all();
        $validation = $request->validate([
            'title' => ['required', 'unique:clothing'],

        ]);

        $Clothing = new Clothing();
        $Clothing->title = $request->input('title');
        $Clothing->clothtype = $request->input('clothtype');
        $Clothing->price = $request->input('price');
        if ($request->hasFile('clothimage')) {
            $extension = $request->file('clothimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.catimage_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('clothimage')->move($folderPath, $fileName)) {
                $Clothing->clothimage = $folderName . $fileName;
            }
            $Clothing->save();
            return  redirect()->route('clothing');
        }
    }
    public function deleteclothing($id)
    {
        $user = Clothing::where('id', $id)->delete(['is_deleted' => 1]);

        return redirect()->back();
    }
    public function clothstatus($id)
    {
        $user = Clothing::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back();
        } else {
            return 'User not found.';
        }
    }

    public function offerstatus($id)
    {
        $user = offer::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back();
        } else {
            return 'User not found.';
        }
    }

    public function deleteoffer($id)
    {
        $user = offer::where('id', $id)->delete(['is_deleted' => 1]);

        return redirect()->back();
    }

    public function addoffer(Request $request)
    {

        $formData = $request->all();
        $validation = $request->validate([
            'title' => ['required'],

        ]);

        $offer = new Offer();
        $offer->title = $request->input('title');
        $offer->subtitle = $request->input('subtitle');
        $offer->description = $request->input('description');
        $offer->price = $request->input('price');
        if ($request->hasFile('offerimage')) {
            $extension = $request->file('offerimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.catimage_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('offerimage')->move($folderPath, $fileName)) {
                $offer->offerimage = $folderName . $fileName;
            }
            $offer->save();
            return  redirect()->route('viewoffertable');
        }
    }
    public function deleteblog($id)
    {
        $user = Blog::where('id', $id)->delete(['is_deleted' => 1]);

        return redirect()->back();
    }

    public function blogstatus($id)
    {
        $user = Blog::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back();
        } else {
            return 'User not found.';
        }
    }


    public function postblog(Request $request)
    {

        $formData = $request->all();
        $validation = $request->validate([
            'title' => ['required'],

        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->subtitle = $request->input('subtitle');
        $blog->description = $request->input('description');
        if ($request->hasFile('blogimage')) {
            $extension = $request->file('blogimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.catimage_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('blogimage')->move($folderPath, $fileName)) {
                $blog->blogimage = $folderName . $fileName;
            }
            $blog->save();
            return  redirect()->route('viewblogtable');
        }
    }
    public function cloth2status($id)
    {
        $user = Clothing2::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back();
        } else {
            return 'User not found.';
        }
    }
    public function deletecloth2g($id)
    {
        $user = Clothing2::where('id', $id)->delete(['is_deleted' => 1]);

        return redirect()->back();
    }
    public function addcloth2(Request $request)
    {

        $formData = $request->all();
        $validation = $request->validate([
            'title' => ['required'],

        ]);

        $Clothing2 = new Clothing2();
        $Clothing2->title = $request->input('title');
        $Clothing2->clothtype = $request->input('clothtype');
        $Clothing2->price = $request->input('price');
        if ($request->hasFile('clothimage')) {
            $extension = $request->file('clothimage')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.catimage_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('clothimage')->move($folderPath, $fileName)) {
                $Clothing2->clothimage = $folderName . $fileName;
            }
            $Clothing2->save();
            return  redirect()->route('clothing2table');
        }
    }

    public function deletebrand($id)
    {
        $user = Brand::where('id', $id)->delete(['is_deleted' => 1]);

        return redirect()->back();
    }

    public function brandstatus($id)
    {
        $user = Brand::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back();
        } else {
            return 'User not found.';
        }
    }

    public function addbrand(Request $request)
    {

        $formData = $request->all();
        $validation = $request->validate([
            'name' => ['required', 'unique:brands'],

        ]);

        $Brand = new Brand();
        $Brand->name = $request->input('name');
        $Brand->description = $request->input('description');
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.brand_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('image')->move($folderPath, $fileName)) {
                $Brand->image = $folderName . $fileName;
            }
            $Brand->save();
            return  redirect()->route('brandtable');
        }
    }
    public function productdelete($id)
    {
        $user = Product::where('id', $id)->delete(['is_deleted' => 1]);

        return redirect()->back();
    }

    public function productstatus($id)
    {
        $user = Product::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back();
        } else {
            return 'User not found.';
        }
    }
    public function addproduct(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'unique:products'],
        ]);
        $product = new Product();
        $product->name = $request->input('name');
        $product->brand_id = $request->input('brand_id');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.catimage_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('image')->move($folderPath, $fileName)) {
                $product->image = $folderName . $fileName;
            }
        }
        $product->save();
        $colorId = $request->input('color');
        $productColor = new Product_colors();
        $productColor->product_id = $product->id;
        $productColor->color_id = $colorId;
        $productColor->save();
        return redirect()->route('producttable')->with('success', 'Product added successfully');
    }

    public function deletecontactus($id)
    {
        $user = Contactus::where('id', $id)->delete(['is_deleted' => 1]);

        return redirect()->back();
    }

    public function contactstatus($id)
    {
        $user = Contactus::where('id', $id)->first();
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            return redirect()->back()->with('success', ' Deactivated');
        } else {
            return 'User not found';
        }
    }


    public function addcontactus(Request $request)
    {


        $formData = $request->all();
        $validation = $request->validate([
            'address' => ['required'],

        ]);

        $Contactus = new Contactus();
        $Contactus->address = $request->input('address');
        $Contactus->phone = $request->input('phone');
        $Contactus->description = $request->input('description');
        $Contactus->email = $request->input('email');
        $Contactus->save();
        return  redirect()->route('contactustable');
    }


    public function updates(Request $request, $id)
    {
        $brand = Brand::find($id);

        $brand->name = $request->input('name');

        if ($request->hasFile('brand_image')) {
            $extension = $request->file('brand_image')->getClientOriginalExtension();
            $fileName = time() . '-image.' . $extension;
            $folderName = strtoupper(date('M') . date('Y')) . "/";
            $folderPath = config('constants.slider_IMAGE_ROOT_PATH') . $folderName;
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, $mode = 0777, true);
            }
            if ($request->file('brand_image')->move($folderPath, $fileName)) {
                $brand->brand_image = $folderName . $fileName;
            }
        }
        $brand->save();
        return redirect()->route('brandtable');
    }


    public function savecoupon(Request $request)
    {

        $coupon = new Coupon();

        $coupon->code = $request->input('code');
        $coupon->title = $request->input('title');
        $coupon->discount_amount = $request->input('discount_amount');
        $coupon->quantity     = $request->input('quantity');
        $coupon->type     = $request->input('type');
        $coupon->user_id      =  $request->input('user_id');
        $coupon->product_id      =  $request->input('product_id');
        $coupon->start_at = $request->input('start_at');
        $coupon->expire_at = $request->input('expire_at');

        // Save the coupon in the database
        $coupon->save();

        return redirect()->route('coupon');
    }

    public function updatecoupon(Request $request, $id)
    {

        $coupon = coupon::find($id);
        $coupon->code = $request->input('code');
        $coupon->title = $request->input('title');
        $coupon->discount_amount = $request->input('discount_amount');
        $coupon->quantity     = $request->input('quantity');
        $coupon->type     = $request->input('type');
        $coupon->user_id       =  $request->input('user_id');
        $coupon->product_id      =  $request->input('product_id');
        $coupon->start_at = $request->input('start_at');
        $coupon->expire_at = $request->input('expire_at');
        $coupon->user_id = $coupon->id;

        // Save the coupon in the database
        $coupon->save();

        return redirect()->route('coupon');
    }
    public function applyCoupon(Request $request)
    {
        // dd($request);
        $couponCode = $request->input('coupon_code');
        $subtotal = $request->input('subtotal');

        $coupon = Coupon::where('code', $couponCode)->first();

        if ($coupon) {
            if ($coupon->type === 'amount') {
                $discount = $coupon->discount_amount;
            } elseif ($coupon->type === 'percent') {
                $discount = ($subtotal * $coupon->discount_amount) / 100;
            } else {
                $discount = 0;
            }


            $finalAmount = $subtotal - $discount;

            return response()->json([
                'status' => true,
                'discount' => $discount,
                'final_amount' => $finalAmount,
                'message' => 'Coupon applied successfully.',
            ]);
        }

        // return response()->json([
        //     'status' => false,
        //     'message' => 'Invalid coupon code or expired.',
        // ]);

        // return response()->json(response(), 200);
    }
}
