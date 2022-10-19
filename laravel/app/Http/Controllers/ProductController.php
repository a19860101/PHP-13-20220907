<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        return view('admin.product.create');
    }
    public function store(){}
    public function edit(){}
    public function update(){}
    public function destroy(){}
}
