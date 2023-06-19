<?php

namespace App\Http\Controllers\fashi;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Clothing;
use App\Models\Clothing2;
use App\Models\Contactus;
use App\Models\offer;
use App\Models\Product;
use App\Models\Propertly_likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Slider;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmissionMail;
use App\Models\Addtocart;
use App\Models\Lookups;
use App\Models\Product_colors;
use Illuminate\Pagination\PaginationServiceProvider;
use PHPUnit\Event\TestRunner\BootstrapFinished;
use PHPUnit\Framework\Constraint\Count;

class UserController extends Controller

{

    public function formshow()
    {
        return view('emails.form_submission');
    }
    public function home()
    {
        $category = Category::all();
        $slider = Slider::all();
        $clothing = Clothing::all();
        $offer = offer::all();
        $blog = Blog::all();
        $clothing2 = Clothing2::all();
        return view('index', compact('slider', 'category', 'clothing', 'offer', 'blog', 'clothing2'));
    }



    public function viewshop(Request $request)
    {

        $products   =                      Product::query();




        $lookups_color =                 Lookups::where('type', 'color')->pluck('id', 'id');



        $pricerange =       DB::table('products')
            ->select(DB::raw('MIN(price) as min_price, MAX(price) as max_price'))
            ->first();

        $minAmount =        $request->input('minamount');
        $minAmount =        ltrim($minAmount, '$');
        $maxAmount =        $request->input('maxamount');
        $maxAmount =        ltrim($maxAmount, '$');
        if ($minAmount && $maxAmount) {
            if ($minAmount > 0 && $maxAmount > 0) {
                $products = $products->whereBetween('price', [$minAmount, $maxAmount]);
            }
        }
        $search =          $request->input('brand');
        $searchcolor =                     $request->input('searchcolor');

        // dd($searchcolor);
        $status =            $request->input('category');
        $sorttype =          $request->input('sortType');
        $property =           Propertly_likes::all();
        $query =               Product::query()->with('like', 'productcolors');
        if ($search) {
            $products   =     $products->where('brand_id', 'LIKE', '%' . $search . '%');
        }
        if ($searchcolor) {
            $products =                   Product_colors::where('color_id', '%' . $searchcolor . '%');
        }

        $products = $products->paginate(10);


        $colors = Lookups::all();
        $category = Category::all();
        $brand = Brand::all();
        $user = $query->get();


        return view('user.frontend.shop', compact('products', 'pricerange',  'colors', 'brand', 'category', 'user', 'search', 'status', 'sorttype', 'property'));
    }


    public function blogpage()
    {

        $blog = Blog::all();
        $category = Category::all();
        return view('user.frontend.blog', compact('blog', 'category'));
    }
    public function contactpage()
    {
        $contact = Contactus::all();
        return view('user.frontend.contact', compact('contact'));
    }




    public function storeLike(Request $request)
    {
        $productId = $request->input('product_id');
        $userId = Auth::user()->id;
        $like = Propertly_likes::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
        if ($like) {
            $like->is_likes = $like->is_likes == 1 ? 0 : 1;
            $like->save();
        } else {
            $like = new Propertly_likes;
            // customlike($productId);
            $like->user_id = $userId;
            $like->product_id =   $productId;
            $like->is_likes = 1;
            $like->save();
        }
        return response()->json(['status' => true, 'is_likes' => $like->is_likes]);
    }
    public function addtocart($id)
    {

        $user    = Auth::check();

        if (!$user) {

            return back()->with('error', 'you are not login');
        } else {

            $add        = Addtocart::where('user_id', Auth::id())->where('product_id', $id)->get();
            if (Count($add) == 0) {

                $add        = new Addtocart();
                $add->product_id      = $id;
                $add->user_id      = Auth::id();
                $add->save();

                return back()->with('success', 'Added In Cart ');
            } else {

                return back()->with('error', ' Your Product already in cart');
            }
        }
    }


    public function viewshopcartpage()
    {

        $products    = DB::table('products')->join('addtocarts', 'products.id', '=', 'addtocarts.product_id')
            ->select('name', 'price', 'addtocarts.*', 'image')->get();
        // $products   = Product::all();

        $subtotal    =  $products->sum('price');




        return view('user.frontend.shoppingcart', compact('products', 'subtotal'));
    }

    public function deletecart($id)
    {

        $delete = Addtocart::where('id', $id)->delete();

        return back()->with('success', ' Successfully Deleted');
    }
}