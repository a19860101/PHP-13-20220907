<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    //
    public function index(){
        return view('admin.product.index');
    }
    public function create(){
        // return view('admin/product/create');
        return view('admin.product.create');
    }
    public function store(Request $request){
        DB::insert('INSERT INTO products(title,description,price,special_price,publish_at,unpublish_at,published)VALUES(?,?,?,?,?,?,?)',[
            $request->title,
            $request->description,
            $request->price,
            $request->special_price,
            $request->publish_at,
            $request->unpublish_at,
            $request->published
        ]);
        return redirect('/admin/product');
    }
}
