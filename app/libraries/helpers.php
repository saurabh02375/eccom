<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Propertly_likes;
use App\Models\User;
use GuzzleHttp\Psr7\MimeType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


function customlike($pid){

    if(Auth::user()){

    $likes = Propertly_likes::where('product_id', $pid)->where('user_id', Auth::user()->id)->first();
    }else{
        $likes = Propertly_likes::where('product_id', $pid)->first();
    }

    return $likes;


    function myfav($id){
        $favs = Propertly_likes::where('product_id' , $id )->where('user_id' , Auth::user()->id)->first();
        return $favs;

    }
}


