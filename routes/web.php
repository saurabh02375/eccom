<?php

use App\Http\Controllers\adminpnlx\AdminLoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\user\Indexcontroller;

use App\Http\Controllers\fashi\LoginController;
use App\Http\Controllers\fashi\UserController;
use App\Http\Controllers\adminpnlx\DashboardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UpdateControoler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//adminlogib

Route::get('admin', [AdminLoginController::class, 'showloginpage'])->name('showloginpage');
Route::post('adminlogin', [AdminLoginController::class, 'adminlogin'])->name('adminlogin');
//index
Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/formshow', [UserController::class, 'formshow'])->name('formshow');


//user
Route::get('deleteuser,{id}', [DashboardController::class, 'deleteuser'])->name('deleteuser');

Route::get('userstatus,{id}', [DashboardController::class, 'userstatus'])->name('userstatus');
Route::post('/submit-form', [UserController::class, 'submitForm'])->name('submit');
Route::get('user', [DashboardController::class, 'user'])->name('user');
Route::get('addeuserpage', [DashboardController::class, 'addeuserpage'])->name('addeuserpage');
Route::post('userupdate', [UpdateControoler::class, 'userupdate'])->name('userupdate');


//Register
Route::get('/register', [LoginController::class, 'register']);

Route::post('/storeregister', [LoginController::class, 'store'])->name('store.register');

//dashboard
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

//login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('post.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('post.logout');


//sluder
Route::get('slider', [DashboardController::class, 'slider'])->name('viewslider');
Route::get('viewreslider', [DashboardController::class, 'viewslider'])->name('slideraddpage');
Route::post('addslider', [DashboardController::class, 'addslider'])->name('addslider');
Route::get('deleteData,{id}', [DashboardController::class, 'deleteData'])->name('deleteData');
Route::get('Status,{id}', [DashboardController::class, 'Status'])->name('Status');


//category
Route::get('category', [DashboardController::class, 'category'])->name('viewcategory');
Route::get('categoryStatus,{id}', [DashboardController::class, 'categoryStatus'])->name('categoryStatus');
Route::get('deletecategorydata,{id}', [DashboardController::class, 'deletecategorydata'])->name('deletecategorydata');
Route::post('addcategory', [DashboardController::class, 'addcategory'])->name('addcategory');
Route::get('categoryaddpage', [DashboardController::class, 'categoryaddpage'])->name('categoryaddpage');


// clothing clothing
Route::get('clothing', [DashboardController::class, 'clothing'])->name('clothing');
Route::post('addcloth', [DashboardController::class, 'addcloth'])->name('addcloth');
Route::get('clothingpage', [DashboardController::class, 'clothingpage'])->name('clothingpage');
Route::get('deleteclothing,{id}', [DashboardController::class, 'deleteclothing'])->name('deleteclothing');
Route::get('clothstatus,{id}', [DashboardController::class, 'clothstatus'])->name('clothstatus');


//offer

Route::get('viewoffertable', [DashboardController::class, 'viewoffertable'])->name('viewoffertable');
Route::get('offerstatus,{id}', [DashboardController::class, 'offerstatus'])->name('offerstatus');
Route::get('deleteoffer,{id}', [DashboardController::class, 'deleteoffer'])->name('deleteoffer');
Route::post('addoffer', [DashboardController::class, 'addoffer'])->name('addoffer');
Route::get('viewooferpage', [DashboardController::class, 'viewooferpage'])->name('viewooferpage');



//blog

Route::post('postblog', [DashboardController::class, 'postblog'])->name('postblog');
Route::get('addblog', [DashboardController::class, 'addblog'])->name('addblog');
Route::get('viewblogtable', [DashboardController::class, 'viewblogtable'])->name('viewblogtable');
Route::get('deleteblog,{id}', [DashboardController::class, 'deleteblog'])->name('deleteblog');
Route::get('blogstatus,{id}', [DashboardController::class, 'blogstatus'])->name('blogstatus');


//clothing 2

Route::get('clothing2table', [DashboardController::class, 'clothing2table'])->name('clothing2table');
Route::get('cloth2status,{id}', [DashboardController::class, 'cloth2status'])->name('cloth2status');
Route::get('deletecloth2g,{id}', [DashboardController::class, 'deletecloth2g'])->name('deletecloth2g');
Route::post('addcloth2', [DashboardController::class, 'addcloth2'])->name('addcloth2');
Route::get('clothing2page', [DashboardController::class, 'clothing2page'])->name('clothing2page');

// SHOP

Route::get('/viewshop', [UserController::class, 'viewshop'])->name('viewshop');
Route::get('/searchshop', [UserController::class, 'searchshop'])->name('searchshop');


//brand

Route::get('brandtable', [DashboardController::class, 'brandtable'])->name('brandtable');
Route::get('brandstatus,{id}', [DashboardController::class, 'brandstatus'])->name('brandstatus');
Route::get('deletebrand,{id}', [DashboardController::class, 'deletebrand'])->name('deletebrand');
Route::post('addbrand', [DashboardController::class, 'addbrand'])->name('addbrand');
Route::get('brandadd', [DashboardController::class, 'brandadd'])->name('brandadd');


//PRODUCT


Route::get('producttable', [DashboardController::class, 'producttable'])->name('producttable');
Route::get('productpage', [DashboardController::class, 'productpage'])->name('productpage');
Route::post('addproduct', [DashboardController::class, 'addproduct'])->name('addproduct');
Route::get('productdelete,{id}', [DashboardController::class, 'productdelete'])->name('productdelete');
Route::get('productstatus,{id}', [DashboardController::class, 'productstatus'])->name('productstatus');



//nlogfrontpage

Route::get('blogpage', [UserController::class, 'blogpage'])->name('blogpage');


//contactpage

Route::get('contactpage', [UserController::class, 'contactpage'])->name('contactpage');


//contactus

Route::get('contactustable', [DashboardController::class, 'contactustable'])->name('contactustable');
Route::get('contacttablepage', [DashboardController::class, 'contacttablepage'])->name('contacttablepage');
Route::get('contactpage', [UserController::class, 'contactpage'])->name('contactpage');

Route::get('deletecontactus,{id}', [DashboardController::class, 'deletecontactus'])->name('deletecontactus');
Route::get('contactstatus,{id}', [DashboardController::class, 'contactstatus'])->name('contactstatus');
Route::post('\addcontactus}', [DashboardController::class, 'addcontactus'])->name('addcontactus');


//search
Route::get('/search', [AdminLoginController::class, 'search'])->name('search');


//update


Route::get('brandupdate/{id}', [UpdateControoler::class, 'brandupdate'])->name('brandupdate');
Route::post('updatebrand/{id}', [UpdateControoler::class, 'brandpostupdate'])->name('brandpostupdate');



Route::get('sliderupdate/{id}', [UpdateControoler::class, 'sliderupdate'])->name('sliderupdate');
Route::post('sliderpostupdate/{id}', [UpdateControoler::class, 'sliderpostupdate'])->name('sliderpostupdate');




Route::get('categoryupdate/{id}', [UpdateControoler::class, 'categoryupdate'])->name('categoryupdate');
Route::post('categorypostupdate/{id}', [UpdateControoler::class, 'categorypostupdate'])->name('categorypostupdate');




Route::get('clothingupdate/{id}', [UpdateControoler::class, 'clothingupdate'])->name('clothingupdate');
Route::post('clothingpostupdate/{id}', [UpdateControoler::class, 'clothingpostupdate'])->name('clothingpostupdate');




Route::get('offerupdate/{id}', [UpdateControoler::class, 'offerupdate'])->name('offerupdate');
Route::post('offerpostupdate/{id}', [UpdateControoler::class, 'offerpostupdate'])->name('offerpostupdate');




Route::get('blogupdate/{id}', [UpdateControoler::class, 'blogupdate'])->name('blogupdate');
Route::post('blogpostupdate/{id}', [UpdateControoler::class, 'blogpostupdate'])->name('blogpostupdate');


Route::get('clothing2update/{id}', [UpdateControoler::class, 'clothing2update'])->name('clothing2update');
Route::post('clothing2postupdate/{id}', [UpdateControoler::class, 'clothing2postupdate'])->name('clothing2postupdate');



Route::get('productupdate/{id}', [UpdateControoler::class, 'productupdate'])->name('productupdate');
Route::post('productpostupdate/{id}', [UpdateControoler::class, 'productpostupdate'])->name('productpostupdate');




Route::get('contactusupdate/{id}', [UpdateControoler::class, 'contactusupdate'])->name('contactusupdate');
Route::post('contactpostupdate/{id}', [UpdateControoler::class, 'contactpostupdate'])->name('contactpostupdate');






Route::post('propertylike', [UserController::class, 'propertylike'])->name('propertylike');
Route::get('searchbrand', [UserController::class, 'searchbrand'])->name('searchbrand');
Route::post('storelike', [UserController::class, 'storelike'])->name('storelike');


//shoppingcart

Route::get('addtocart/{id}', [UserController::class, 'addtocart'])->name('addtocart');
Route::get('deletecart/{id}', [UserController::class, 'deletecart'])->name('deletecart');
Route::get('viewshopcartpage', [UserController::class, 'viewshopcartpage'])->name('viewshopcartpage');



//Couponpage
Route::get('coupon', [DashboardController::class, 'viewCouponpage'])->name('coupon');




Route::get('addcoupon', [DashboardController::class, 'addcoupon'])->name('addcoupon');
Route::get('updatecoupon/{id}', [DashboardController::class, 'updateCouponpage'])->name('updateCouponpage');
Route::get('couponstatus,{id}', [DashboardController::class, 'couponstatus'])->name('couponstatus');
Route::get('deletecoupon/{id}', [DashboardController::class, 'deletecoupon'])->name('deletecoupon');
Route::post('updatecoupon/{id}', [DashboardController::class, 'updatecoupon'])->name('updatecoupon');
Route::post('savecoupon', [DashboardController::class, 'savecoupon'])->name('savecoupon');
Route::post('applyCoupon', [DashboardController::class, 'applyCoupon'])->name('applyCoupon');



Route::get('viewotp ,{id}', [LoginController::class, 'viewotp'])->name('viewotp');
Route::post('verifyotp ,{id}', [LoginController::class, 'verifyotp'])->name('verifyotp');


//tocheckout


Route::get('tocheckout', [CheckoutController::class, 'tocheckout'])->name('tocheckout');
Route::post('proceed', [CheckoutController::class, 'proceed'])->name('proceed');
