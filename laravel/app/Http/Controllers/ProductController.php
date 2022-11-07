<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Str;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        $categories = Category::get();
        return view('admin.product.create',compact('categories'));
    }
    public function store(Request $request){

        if($request->file('cover')){
            $ext =$request->file('cover')->getClientOriginalExtension();
            $img_name = Str::uuid().'.'.$ext;
            $request->file('cover')->storeAs('images',$img_name,'public');
        }else{
            $img_name = null;
        }

        // 方法一
        // $product = new Product;
        // $product->title         = $request->title;
        // $product->cover         = $img_name;
        // $product->description   = $request->description;
        // $product->price         = $request->price;
        // $product->special_price = $request->special_price;
        // $product->publish_at    = $request->publish_at;
        // $product->unpublish_at  = $request->unpublish_at;
        // $product->published     = $request->published;
        // $product->save();

        // 方法二
        $product = new Product;
        $product->fill($request->all());
        $product->cover = $img_name;
        $product->save();

        // 方法三
        // Product::create($request->all());

        return redirect('/admin/product');
    }
    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }
    public function update(Request $request,$id){
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();
        return redirect('/admin/product/'.$id.'/edit');
    }
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/product');

    }
    public function front_index(){
        // $products = Product::orderBy('id','DESC')->get();
        $products = Product::showAll()
        ->orderBy('id','DESC')
        ->get();
        return view('product.index',compact('products'));
    }
    public function front_show(Product $product){
        // $product = Product::find($id);
        return view('product.show',compact('product'));
    }

    public function front_product_category($slug){
        $category_slug = Category::where('slug',$slug)->first();

        $products = Product::showAll()->where('category_id',$category_slug->id)->get();

        return view('product.product_category',compact('products'));
    }
}
