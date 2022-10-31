<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    //
    public function index(){
        $products = Product::where('is_feature',true)->limit(4)->get();
        $new_products = Product::orderBy('id','DESC')->limit(4)->get();
        return view('index',compact('products','new_products'));
    }
}
