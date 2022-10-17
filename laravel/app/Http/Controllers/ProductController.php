<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    //
    public function index(){
        // $products = DB::select('SELECT * FROM products ORDER BY id DESC');
        $products = DB::table('products')->orderBy('id','DESC')->get();
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        // return view('admin/product/create');
        return view('admin.product.create');
    }
    public function store(Request $request){
        // DB::insert('INSERT INTO products(title,description,price,special_price,publish_at,unpublish_at,published)VALUES(?,?,?,?,?,?,?)',[
        //     $request->title,
        //     $request->description,
        //     $request->price,
        //     $request->special_price,
        //     $request->publish_at,
        //     $request->unpublish_at,
        //     $request->published
        // ]);
        DB::table('products')->insert([
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'special_price' => $request->special_price,
            'publish_at'    => $request->publish_at,
            'unpublish_at'  => $request->unpublish_at,
            'published'     => $request->published
        ]);
        return redirect('/admin/product');
    }
    public function edit(){
        return view('admin.product.edit');
    }
    public function destroy($id){
        // DB::delete('DELETE FROM products WHERE id = ?',[$id]);
        DB::table('products')->delete($id);
        return redirect('/admin/product');
    }
}
