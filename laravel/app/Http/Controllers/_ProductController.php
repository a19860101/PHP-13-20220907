<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
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

        // return $request->file('cover')->store('test','public');
        // return $request->file('cover')->storeAs('qqq123','test','public');


        // DB::insert('INSERT INTO products(title,description,price,special_price,publish_at,unpublish_at,published)VALUES(?,?,?,?,?,?,?)',[
        //     $request->title,
        //     $request->description,
        //     $request->price,
        //     $request->special_price,
        //     $request->publish_at,
        //     $request->unpublish_at,
        //     $request->published
        // ]);
        if($request->file('cover')){
            $ext =$request->file('cover')->getClientOriginalExtension();
            $img_name = Str::uuid().'.'.$ext;
            $request->file('cover')->storeAs('images',$img_name,'public');
        }else{
            $img_name = null;
        }

        DB::table('products')->insert([
            'title'         => $request->title,
            'cover'         => $img_name,
            'description'   => $request->description,
            'price'         => $request->price,
            'special_price' => $request->special_price,
            'publish_at'    => $request->publish_at,
            'unpublish_at'  => $request->unpublish_at,
            'published'     => $request->published
        ]);
        return redirect('/admin/product');
    }
    public function edit($id){
        // $product = DB::select('SELECT * FROM products WHERE id = ?',[$id]);
        $product = DB::table('products')->find($id);
        return view('admin.product.edit',compact('product'));
    }
    public function destroy($id){
        // DB::delete('DELETE FROM products WHERE id = ?',[$id]);
        DB::table('products')->delete($id);
        return redirect('/admin/product');
    }
    public function update(Request $request,$id){
        // DB::update('UPDATE products SET title=?,description=?,price=?,special_price=?,publish_at=?,unpublish_at=?,published=? WHERE id = ?',[
        //     $request->title,
        //     $request->description,
        //     $request->price,
        //     $request->special_price,
        //     $request->publish_at,
        //     $request->unpublish_at,
        //     $request->published,
        //     $id
        // ]);
        DB::table('products')->where('id',$id)->update([
            'title'         =>$request->title,
            'description'   =>$request->description,
            'price'         =>$request->price,
            'special_price' =>$request->special_price,
            'publish_at'    =>$request->publish_at,
            'unpublish_at'  =>$request->unpublish_at,
            'published'     =>$request->published,
        ]);
        return redirect('/admin/product/'.$id.'/edit');
    }
}
